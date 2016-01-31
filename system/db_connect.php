<?php

include '../configuration/psl-config.php';

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
				echo "Error with PDO";
				echo $e->message();
				die();
			}
		}

		return $cont;
	}

	public static function disconnect() {
		self::$cont = null;
	}
}

Database::connect();