<?php

require_once 'database_class.php';

class PublicUser {

	private $username;
	private $password;

	function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
	}

	/**
	 * Returns Array user by username
	 */
	public function getUserByUsername($username) {
		$pdo = Database::connect();
		$sth = $pdo->prepare('SELECT * FROM users WHERE username=:username');
		$sth->bindParam(':username', $username);
		$sth->execute();

		$data = $sth->fetch(PDO::FETCH_ASSOC);
		if ($data) {
			// print "User $data[username] exists <br>";
			Database::disconnect();
			return $data;
		} else {
			Database::disconnect();
			// print "given '$username' not a user <br>";
			return false;
		}

	}

	public function getUsername() {
		return $this->username;
	}

}