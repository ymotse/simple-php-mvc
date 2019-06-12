<?php

namespace App\controller;

use App\core\Sessions;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class LogoutController {


    public function __construct() {
        
        Sessions::disconnect();
    }
    
    
}
