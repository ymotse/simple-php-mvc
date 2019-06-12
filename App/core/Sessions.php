<?php

namespace App\core;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class Sessions {
    
    
    public static function start() {
        
        session_name('__vss');
        
        session_start();

        
         if( !isset($_SESSION['id']) || $_SESSION['id'] == null ) {

            $_SESSION = null;
            unset($_SESSION);
            session_unset();
            session_destroy();
            
            Core::redirect('?ref=login');
        }
        
    }
    
    
    public static function disconnect() {
        session_name('__vss');
        session_start();
        
        $_SESSION = "";
        
        $_SESSION = null;
        unset($_SESSION);
        session_unset();
        session_destroy();
        
        Core::redirect('?ref=login');
    }
    

}