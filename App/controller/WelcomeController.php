<?php

namespace App\controller;

use App\core\View;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class WelcomeController {


    public function __construct() {
        
        new View ( 'App'.DIRECTORY_SEPARATOR.'view', 'welcome.twig', array() );
    }
    
    
}
