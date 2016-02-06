<?php
class User {

	private $username;
	private $hashedPassword;
	private $adminRight;

	function __construct($username, $password, $admin) {
		$this->username = $username;
		$this->hashedPassword = $password;
		$this->adminRight = $admin;
	}

	public function isAdmin() {
		if ($this->adminRight === 1) {
			return true;
		} else {
			return false;
		}
	}
}