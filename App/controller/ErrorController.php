<?php

namespace App\controller;

use App\core\View;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class ErrorController {


    public function __construct($errorMsg) {
        
        $config = parse_ini_file('App'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'config.ini');
        
        new View ( 'App'.DIRECTORY_SEPARATOR.'view', 'error.twig', array(
            'msg' => $errorMsg,
            'cfg' => $config
        ) );
        
    }
    
    
}
