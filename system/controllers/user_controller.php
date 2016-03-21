<?php

require_once '../../../../config.php';
require_once SYSTEM . '/classes/database_class.php';

class UserController {

	public function __construct() {

	}

	public function showAllUsers() {

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("SELECT id,username,email,administrator,blocked FROM users");
			$statement->execute();
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		$data = $statement->fetchAll(PDO::FETCH_ASSOC);

		Database::disconnect();
		echo json_encode($data);
	}

}