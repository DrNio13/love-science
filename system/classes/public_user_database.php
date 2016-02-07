<?php

class Database {
	private static $cont = null;

	public function __construct() {
		die('Init function is not allowed');
	}

	public static function connect() {
		// One connection for the app
		if (self::$cont === null) {
			try {
				self::$cont = new PDO("mysql:host=" . HOST . ";" . "dbname=" . DATABASE, USER, PASSWORD);
			} catch (PDOException $e) {
				echo "Error with PDO " . Error::info();
				echo $e->message();
				die();
			}
		}
		return self::$cont;
	}

	public static function disconnect() {
		self::$cont = null;
	}

}

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

}