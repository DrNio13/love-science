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
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

	public function getRealIpAddr() {
		//check ip from share internet
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		//to check ip is pass from proxy
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	public function isUserBlocked() {

	}

}