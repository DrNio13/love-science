<?php

require_once '../../../../config.php';
require_once SYSTEM . '/classes/database_class.php';

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

		$articles = $statement->fetchAll(PDO::FETCH_ASSOC);

		$transformed = array();

		foreach ($articles as $key => $article) {
			// Remove html from content
			$replaced = strip_tags($article['content']);
			$article['content'] = $replaced;

			// Add short version of article content
			$article['content_short'] = substr($article['content'], 0, 40);

			array_push($transformed, $article);
		}

		Database::disconnect();
		echo json_encode($transformed);
	}
}