<?php

require_once '../classes/database_class.php';

class ArticleController {

	public function __construct() {

	}

	public function showAll() {

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("SELECT id,title,category,content FROM articles");
			$statement->execute();
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		$data = $statement->fetchAll(PDO::FETCH_ASSOC);

		if ($data) {
			Database::disconnect();
			print json_encode($data);
		} else {
			Database::disconnect();
			http_response_code(500);
			print json_encode($data);
		}
	}

}