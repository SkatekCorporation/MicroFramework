<?php
/**
* Router.php
* @author Souvenance <skavunga@gmail.com>
* @version 1.1
* @importance Creer des routes puis aller sur le bon chemin [Controller, Action] puis extraire 
* les parametres
*/
namespace App\Router;

define('CTRL_NS', "App\\Controller\\");
define('CTRL_EXT', "Controller");

class Router {
    private $url;
    private $routes = [];
    private $namedRoutes = [];


    public function __construct($url = null){
        $url == null ? $url = $_GET['url'] : $url ;
        $this->url = $url;
    }
    /**
    * Create des routes pour la methode GET
    * @return object $this
    */
    public function get($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'GET');
    }

    /**
    * Creation des routes avec la methode post
    * @return object $this 
    */
    public function post($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'POST');
    }

    /**
    * Ajoute une route dans l'application
    */
    private function add($path, $callable, $name, $method){
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;

        if ($name){
            $this->namedRoutes[$name] = $route;
        }

        return $this;
    }
    /**
    * Demarre l'application avec les bonnes routes'
    */
    public function run(){
        if (! isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException("REQUEST METHOD does not exist", 405);
        }

        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $this->call($route->getCallable(), $route->getMatches());
            }
        } 
        if (($output = $this->parseUrl())) {
            return $this->call($output);
        }
        throw new RouterException("L'URL demandé n'existe pas ou a été mal taper.");
    }

    public function url($name, $params = []) {
        if (! isset($this->namedRoutes[$name])){
            throw new RouterException("No route matches this name");
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }
    /**
    * Decomposition de l'url pour en faire un controller, une action et extraire les parametres (args)
    * @return array|false On retourne un array s'il existe laction demander ou false si absent' 
    */
    protected function parseUrl() {
        $params = explode('/', $this->url);
        $url = ['controller' => ucfirst($params[0]), 'action' => ! empty($params[1]) ? $params[1] : null];
        array_shift($params); array_shift($params);
        $url['matches'] = $params;
        $url['class'] = CTRL_NS . $url['controller'] . CTRL_EXT;

        if (class_exists($url['class']) && method_exists($url['class'], $url['action'])) { return $url; }
        return false;

    }
    /**
    * Appel d'un controller, d'une action avec les parametres passees
    * @param $callable array|string|object Peut etre soit un string (Controller#action), soit un array (['controller' => 'value','action' => 'value', 'matches' => array]) ou un objet (function(){})
    * @param $matches array La liste des matches (Parametres a passer comme args dans la methode)
    */
    public function call($callable, $matches = []) {
        if (is_string($callable)){
            $params = explode("#", $callable);
            $controller = CTRL_NS . $params[0] . CTRL_EXT;
            $controller = new $controller();
            return call_user_func_array([$controller, $params[1]], $matches);
        } else if(is_array($callable)) {
            if(! empty($callable['matches']) && is_array($callable['matches'])) {
                $matches = $callable['matches'];
            }
            $controller = CTRL_NS . $callable['controller'] . CTRL_EXT;
            $controller = new $controller();
            return call_user_func_array([$controller, $callable['action']], $matches);
        } else { return call_user_func_array($callable, $matches); }
    }
}