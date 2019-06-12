<?php

namespace App\core;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class Core {
	
	
	protected $controller;

	public function __construct() {
		
		define('ROOT_APP', 'php-mvc');
		define('PAGE_WELCOME', '?ref=welcome');

		$url_compl = substr ( $_SERVER['REQUEST_URI'], 1 );
		$arr_url = explode ( '/', $url_compl );
		

		if ($arr_url[0] == ROOT_APP) {
			if (substr ( $arr_url[1], 0, 1 ) == null) {
				$this->redirect ( PAGE_WELCOME );
			} 
			else if (substr ( $arr_url [1], 0, 1 ) == '?') {
				if ((! isset ( $_GET['ref'] )) || (isset ( $_GET['ref'] ) && empty ( $_GET['ref'] ))) {
					$this->redirect ( PAGE_WELCOME );
				} 
				else if (! file_exists ( 'App'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.ucfirst( $_GET['ref'] ).'Controller.php' )) {
					$this->controller = 'App'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'Error404Controller';
					new $this->controller ();
				} 
				else {
					$controllerName = ucfirst ( $_GET['ref'] ) . 'Controller';
					$this->controller = 'App'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.$controllerName;
					new $this->controller ();
				}
			}
			else {
				$this->redirect ( DIRECTORY_SEPARATOR.$arr_url[0].DIRECTORY_SEPARATOR.PAGE_WELCOME );
			}
		}

	}
	
	
	public static function redirect($url) {
		header ( 'Location: ' . $url );
	}

	
}
