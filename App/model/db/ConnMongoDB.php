<?php

namespace App\model\db;

use App\controller\ErrorController;
use MongoDB\Client;
use MongoDB\Collection;
use Exception;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class ConnMongoDB {
    
    
    public static function getConnection() {
        
        $config = parse_ini_file('App'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'config.ini');
        
        $mongodb_client = null;
        
        try {
            #Without authentication:
            // $mongodb_client = new Client("mongodb://".$config['mdb_host'].":".$config['mdb_port']);
            
            #With authentication:
            $mongodb_client = new Client("mongodb://".$config['mdb_user'].":".$config['mdb_pass']."@".$config['mdb_host'].":".$config['mdb_port']);
        } catch(Exception $e) {
            // new ErrorController("MongoDB Connection Failed:\n".$e->getMessage()); ###Uncomment this line.
        }
        return $mongodb_client;
    }
    
    
    public static function getCollection($databaseName, $collectionName) {
        
        return new Collection(self::getConnection()->getManager(), $databaseName, $collectionName);
    }
    
    
    public static function list($databaseName, $collectionName, $filter = [], $options = []) {
        
        $collection = self::getCollection($databaseName, $collectionName);
        
        return $collection->find($filter, $options);
    }
    
    
    public static function remove($databaseName, $collectionName, $filter = [], $options = []) {
        
        $collection = self::getCollection($databaseName, $collectionName);
        
        $returnDel = $collection->deleteMany($filter, $options);
        
        return $returnDel->getDeletedCount();
    }
    
    
    public static function saveOne($databaseName, $collectionName, $array = []) {
        
        $collection = self::getCollection($databaseName, $collectionName);
        
        $returnAdd = $collection->insertOne($array);
        
        return $returnAdd->getInsertedCount();
    }

}
