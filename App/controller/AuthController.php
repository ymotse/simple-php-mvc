<?php

namespace App\controller;

use App\core\Core;
use App\core\Sessions;
use App\model\entity\Login;
use App\model\finder\LoginFinder;
use App\controller\ErrorController;
use Throwable;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class AuthController {


    public function __construct() {
        
        $login = new Login();
        
        $paramUser = (isset($_POST['username']) || empty($_POST['username'])) ? null : $_POST['username'];
        $login->setUsername($paramUser);
        
        $paramPass = (isset($_POST['password']) || empty($_POST['password'])) ? null : $_POST['password'];
        $login->setPassword($paramPass);
        
        $lf = new LoginFinder();
        
        try {
            $returnAuth = $lf->find($login);
            
            if( empty($returnAuth) || !password_verify($login->getPassword(), $returnAuth->getPassword()) ){
    
                Core::redirect('?ref=login&err=1');
            }
            else{
                
                session_cache_expire(120);
                session_name('__vss');
                session_start();
                
                $_SESSION['id'] = $returnAuth->getId();
                $_SESSION['username'] = $returnAuth->getUsername();
                
                Core::redirect('?ref=home');
            }
        } catch (Throwable  $e) {
            new ErrorController('Database connection: '.$e->getMessage());
        }
        
        
    }
    
    
}
