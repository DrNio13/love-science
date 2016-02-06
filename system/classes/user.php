<?php

include 'public_user.php';

class User extends PublicUser {
	private $username;
	private $hashedPassword;

	function __construct($username, $password) {
		$this->username = $username;
		$this->hashedPassword = $password;
	}

	public function isAdmin() {
		if ($this->adminRight === 1) {
			return true;
		} else {
			return false;
		}
	}

}