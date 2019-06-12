<?php

namespace App\model\finder;

use App\controller\ErrorController;
use App\model\db\ConnMySQL;
use App\model\entity\Login;
use PDO;
use PDOException;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class LoginFinder extends ConnMySQL {


    public function find(Login $l) {
        
        $sql = "SELECT 
                    id 
                    , username 
                    , password 
                    , status 
                FROM 
                    users 
                WHERE 
                    username = :user 
                    AND status = 1 ";
        
        $login = new Login();
        
        try {
            $conn = self::getInstance();
            $ps = $conn->prepare($sql);
            $ps->bindValue(':user', $l->getUsername(), PDO::PARAM_STR);
            
            $ps->execute();
            $l = $ps->fetch(PDO::FETCH_ASSOC);
            
            if($l != null) {
                $login->setId( $l['id'] );
                $login->setUsername( $l['username'] );
                $login->setPassword( $l['password'] );
                $login->setStatus( $l['status'] );
            }
        } 
        catch (PDOException $e) {
            new ErrorController($e->getMessage());  
        } 
        return $login;
    }


}
