<?php

include '../../configuration/psl-config.php';
include 'errors-info.php';
$mala = "malakas";

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
				echo "ok";
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
