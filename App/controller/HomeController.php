<?php

namespace App\controller;

use App\core\Sessions;
use App\core\View;
use App\core\Utils;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class HomeController {


	public function __construct() {
	
	    # Restrict page
	    Sessions::start();
	    
	    new View ( 'App'.DIRECTORY_SEPARATOR.'view', 'home.twig', array(
	        'session_id' => $_SESSION['id'],
	        'session_username' => $_SESSION['username'],
	    ) );
	    
	}
	
}
