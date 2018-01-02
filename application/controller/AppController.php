<?php
/**
* AppController.php
* @author Souvenance <skavunga@gmail.com>
* @version 1.1
* @importance Les fonctions communs des tout les controllers de l'application
* Tout les controllers doivent heriter cette Classe
*/

    namespace App\Controller;

	use App\View\AppView;

    class AppController {

		protected $view;

    	public function __construct()
    	{
			$this->view = new AppView(get_class($this));
    	}
		
		public function debut(){
			$application = 'Skatek Corporation';
			$this->view->render('debut', compact('application'));
		}
    }