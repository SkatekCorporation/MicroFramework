<?php

/**
* Appload.php
* @author Souvenance <skavunga@gmail.com>
* @version 1.1
* @importance Les fonctions globales de l'application ainsi que les importantes constantes
*/
    require "vendor/autoload.php";

    /**
    * Affichage des erreurs
    * 
    * Mettez E_ALL si vous etes en developpement
    * Mettez FALSE si c'est en production
    */
    error_reporting(E_ALL);

    /**
    * Separateur des dossiers par defaut, celui utiliser par le system d'exploitation
    */
    define("DS", DIRECTORY_SEPARATOR);

    /**
    * Nom du domaine de l'application
    * Si l'application se trouve dans un sous dossier, veuillez taper le chemin relatif vers le sous dossier 
    * contenant l'application avec tout ses fichiers
    */
    define('DOMAIN', '/apps2/');

    /**
    * Configuration base de données
    * Remplacer correctement les valeurs selon la configuration de votre BDD
    * HOST        => Hote de la BDD, laisser localhost par defaut, si vous etes en local
    * DATABASE    => Nom de la base de donnees
    * DB_USERNAME => Nom d'utilisateur de la BDD, root par defaut
    * DB_PASSWORD => Mot de passe de la base de donnees
    */
    define('HOST',          'localhost');
    define('DATABASE',      'apps2');
    define('DB_USERNAME',   'root');
    define('DB_PASSWORD',   '');

    /**
    * Les constantes des emplacements des fichiers de l'application
    * Il ne pas important de modifier les valeurs par defaut
    */
    define("APPS_DIR",      __DIR__ . DS . ".." . DS . "application");
    define("TEMPLATES_DIR", APPS_DIR . DS . "templates");
    define("CACHES_DIR",    APPS_DIR . DS . "caches");

    /**
    * Constantes des fichiers pour la vue
    */
    define('ASSETS_DIR',    DOMAIN . 'assets/');
    define('CSS_DIR',       ASSETS_DIR . 'css/');
    define('JS_DIR',        ASSETS_DIR . 'js/');
    define('IMAGES_DIR',    ASSETS_DIR . 'img/');
    define('FILES_DIR',     ASSETS_DIR . 'files/');
    define('FONTS_DIR',     ASSETS_DIR . 'fonts/');

     /**
     * Pour l'affichage des variables en mode debugger,
     * Accessible partout dans l'application
     */
    function debug($var = null){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }

    