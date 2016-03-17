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
		return json_encode($transformed);
	}

	public function getArticleByUrl($url) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("SELECT * FROM articles WHERE url=:url LIMIT 1");
			$statement->bindParam(":url", $url);
			$statement->execute();
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		$data = $statement->fetch(PDO::FETCH_ASSOC);

		if ($data) {
			Database::disconnect();
			header('200 OK');
			return json_encode($data);
		} else {
			Database::disconnect();
			header('400 OK');
			return json_encode(array("error" => "article with $url not found"));
		}
	}
}