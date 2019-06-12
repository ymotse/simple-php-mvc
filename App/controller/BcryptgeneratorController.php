<?php

namespace App\controller;

use App\core\View;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class BcryptgeneratorController {
    
    public function __construct() {
        
        if( isset($_POST['text_crypt']) && !empty($_POST['text_crypt']) ) {
            
            $crypted = password_hash($_POST['text_crypt'], PASSWORD_BCRYPT);
            
            new View ( 'App'.DIRECTORY_SEPARATOR.'view', 'bcryptgenerator.twig', array(
                'no_crypted' => $_POST['text_crypt'],
                'crypted' => $crypted,
            ) );
        }
        else {
            new View ( 'App'.DIRECTORY_SEPARATOR.'view', 'bcryptgenerator.twig', array() );
        }
        
    }
    
}
