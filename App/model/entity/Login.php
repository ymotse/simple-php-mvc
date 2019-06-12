<?php

namespace App\model\entity;

/**
 * 
 * @author yitshhaq.fukushima
 * 
 */
class Login {
    
	private $id;
	private $username;
	private $password;
	private $status;
	
	
	public function __construct() {}
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}

	
	public function getUsername() {
		return $this->username;
	}
	public function setUsername($username) {
		$this->username = $username;
	}

	
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
	}

	
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
	}

}

