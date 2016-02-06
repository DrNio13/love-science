<?php

// this include not working when initiliaze an object
include '../functions/db_connection.php';

class PublicUser {

	private $username;
	private $password;

	function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
	}

	public function getUserByUsername($username) {
		// include class
		include '../functions/db_connection.php';
		echo $mala;
		$pdo = Database::connect();

		$sth = $pdo->prepare('SELECT * FROM users WHERE username=:username');
		$sth->bindParam(':username', $username);
		$sth->execute();

		$data = $sth->fetch(PDO::FETCH_ASSOC);
		if ($data) {
			print "User $data[username] exists <br>";
			Database::disconnect();
			return $data;
		} else {
			Database::disconnect();
			print "given '$username' not a user <br>";
			return false;
		}

	}

	public function isRegistered($username) {
		if ($this->getUserByUsername($username)) {
			return true;
		}
	}
}