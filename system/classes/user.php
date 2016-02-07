<?php

include 'public_user_database.php';

class User extends PublicUser {
	private $administrator;

	function __construct($username, $hashed, $admin) {
		parent::__construct($username, $hashed);
		$this->administrator = $admin;
	}

	public function isAdmin() {
		if ((int) $this->administrator === 1) {
			return true;
		} else {
			return false;
		}
	}

}