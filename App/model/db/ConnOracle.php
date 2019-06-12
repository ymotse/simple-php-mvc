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
class ConnOracle {
	
	private static $instance = null;
	
	
	public static function getInstance() {
		
		$config = parse_ini_file('App'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'config.ini');
		
		$tns = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = '.$config['ora_host'].')(PORT = '.$config['ora_port'].')) (CONNECT_DATA = (SERVICE_NAME = '.$config['ora_sid'].') (SID = '.$config['ora_sid'].')))';
		
		if ( !(self::$instance instanceof self) ) {
			try {
				self::$instance = new PDO ( 'oci:dbname=' . $tns . ';charset=UTF8', $config['ora_user'], $config['ora_pass'], array ( 
						PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				        PDO::ATTR_DEFAULT_FETCH_MODE, 
				        PDO::FETCH_CLASS,
						PDO::ATTR_EMULATE_PREPARES => false,
						PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
						PDO::ATTR_STATEMENT_CLASS
				) );
			} catch ( PDOException $e ) {
			    // new ErrorController("Oracle Connection Failed:\n".$e->getMessage()); ###Uncomment this line.
			}
		}
		return self::$instance;
	}

}
