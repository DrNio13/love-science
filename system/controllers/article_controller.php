<?php

require_once '../classes/database_class.php';

class ArticleController {

	public function __construct() {

	}

	public function showAll() {

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("SELECT * FROM articles");
			$statement->execute();
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		$data = $statement->fetchAll(PDO::FETCH_ASSOC);
		$a = array();

		// Remove html from content
		foreach ($data as $key => $value) {
			$replaced = strip_tags($value['content']);
			$value['content'] = $replaced;
			array_push($a, $value);
		}

		Database::disconnect();
		echo json_encode($a);
	}

}