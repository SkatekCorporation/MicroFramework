<?php

    namespace App\View;

    use \Twig_Loader_Filesystem;
	use \Twig_Environment;

    class AppView
    {
        private $view;
        private $dir;

        public function __construct($dir = null, $build = true)
        {
            if($build)
                $this->setDir(substr($dir, 15, -10));
            else
                $this->setDir($dir); 

			$loader = new Twig_Loader_Filesystem(TEMPLATES_DIR . DS . $this->dir);
            
            $loader->addPath(TEMPLATES_DIR . DS . 'layouts');

			$this->setView(new Twig_Environment($loader, [
				'cache' => false//CACHES_DIR
			]));
            $this->globalVars();
        }
        
        /**
        * @uses $this->render('template', ['var1' => 'value1']); Sert a rendre une vue avec les variables
        * @param $template String La vue a rendre. Le template doit se trouver dans le dossier du controller. Sans l'extension html
        * @param $options Array Liste des variables qui doivent etre rendus au template
        */

        public function render($template = null, $options = [])
        {
            echo $this->getView()->render($template . '.html', $options);
        }

        public function getView(){
            return $this->view;
        }

        protected function setView($loader = null){
            $this->view = $loader;
        }

        public function setDir($dir)
        {
            $this->dir = strtolower($dir);
        }
        
        /**
        * Ajout des variables globales accessible aux fichiers de vues (templates)
        */
        private function globalVars() {
            $this->getView()->addGlobal('css', CSS_DIR);
            $this->getView()->addGlobal('js', JS_DIR);
            $this->getView()->addGlobal('img', IMAGES_DIR);
            $this->getView()->addGlobal('files', FILES_DIR);
            $this->getView()->addGlobal('rootLink', DOMAIN);
        }
    }