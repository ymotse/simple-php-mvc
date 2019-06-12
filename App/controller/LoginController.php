<?php

namespace App\controller;

use App\core\View;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class LoginController {
    
    
    public function __construct() {
        
        $err = (isset($_GET['err']) && $_GET['err'] == 1) ? 1 : null;
        
        new View('App'.DIRECTORY_SEPARATOR.'view', 'login.twig', array( 
            'err' => $err
        ) );
        
    }

}
