<?php

require_once SYSTEM . '/classes/database_class.php';

class LoginController {
	private $ip;

	function __construct() {

	}

	public function getRealIpAddr() {
		//check ip from share internet
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			return $this->ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		//to check ip is pass from proxy
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			return $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			return $this->ip = $_SERVER['REMOTE_ADDR'];
		}

	}

	public function setLoginRecord($ip) {
		$pdo = Database::connect();
		$statement = $pdo->prepare("INSERT INTO login_attempts(ip,first_attempt) VALUES(:ip, CURRENT_TIMESTAMP() )");
		try {
			$statement->execute(array(
				"ip" => $ip,
			));
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
			die();
		}
		Database::disconnect();
	}

	public function getLoginRecordByIp($ip) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$statement = $pdo->prepare("SELECT * FROM login_attempts WHERE ip=:ip LIMIT 1");
		$statement->bindParam(':ip', $ip);

		$statement->execute();

		$data = $statement->fetch(PDO::FETCH_ASSOC);

		if ($data) {
			Database::disconnect();
			return $data;
		} else {
			Database::disconnect();
			return false;
		}

	}

	public function updateLoginCounter($ip, $counter) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$counter = (int) $counter + 1;

		$statement = $pdo->prepare("UPDATE login_attempts SET login_counter=:counter WHERE ip=:ip");
		try {
			$statement->execute(array(
				"ip" => $ip,
				"counter" => $counter,
			));
			//test
			Database::disconnect();
			return $counter;

		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		Database::disconnect();
	}

}