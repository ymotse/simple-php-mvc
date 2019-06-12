<?php

namespace App\model\db;

use App\controller\ErrorController;
use PDO;
use PDOException;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class ConnMySQL {

	private static $instance = null;
	
	
	public static function getInstance() {
		
		$config = parse_ini_file('App'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'config.ini');
		
		if ( !(self::$instance instanceof self) ) {
			try {
			    self::$instance = new PDO ( 'mysql:host='.$config['mysql_host'].';dbname='.$config['mysql_dbname'], $config['mysql_user'], $config['mysql_pass'], array ( 
			        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			        PDO::MYSQL_ATTR_FOUND_ROWS,
			        PDO::ATTR_DEFAULT_FETCH_MODE,
			        PDO::FETCH_CLASS,
			        PDO::ATTR_EMULATE_PREPARES => false,
			        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_STATEMENT_CLASS
				) );
			} catch ( PDOException $e ) {
				// new ErrorController($e->getMessage()); ###Uncomment this line.
			}
		}
		return self::$instance;
	}

}
