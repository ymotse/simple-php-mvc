<?php

namespace App\controller;

use App\core\View;
use App\model\db\ConnMySQL;
use App\model\db\ConnOracle;
use App\model\db\ConnMongoDB;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class TestsdbController {
    
    
    public function __construct() {
        
        $cn_oracle = (ConnOracle::getInstance() == null) ? false : true;
        $cn_mysql = (ConnMySQL::getInstance() == null) ? false : true;
        $cn_mongo = (ConnMongoDB::getConnection() == null) ? false : true;
        
        new View ( 'App'.DIRECTORY_SEPARATOR.'view', 'testsdb.twig', array(
	        'cn_mysql' => $cn_mysql,
	        'cn_oracle' => $cn_oracle,
	        'cn_mongo' => $cn_mongo,
	    ) );
    }
    
    
}