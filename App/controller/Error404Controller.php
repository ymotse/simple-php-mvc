<?php

namespace App\controller;

use App\core\View;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class Error404Controller {
    
    
	public function __construct() {
	    
		new View ( 'App'.DIRECTORY_SEPARATOR.'view', '404.twig', array() );
	}
	
	
}
