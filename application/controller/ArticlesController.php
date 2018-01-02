<?php
/**
* ArticlesController.php
* @author Souvenance <skavunga@gmail.com>
* @version 1.1
* @importance Exemple d'un controller
*/
namespace App\Controller;

use App\Model\ArticlesModel;

class ArticlesController extends AppController {
	
	private $articles;

	public function __construct()
	{
		parent::__construct();
		$this->articles = new ArticlesModel();
	}

	public function home($varr = null, $rt = null)
	{
		$tout = $this->articles->findAll();
		
		$this->view->render('home', ['articles' => $tout, 'title' => 'Home des articles']);
	}
}