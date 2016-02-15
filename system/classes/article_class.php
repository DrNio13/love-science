<?php

require_once 'database_class.php';

class Article {
	private $title;
	private $url;
	private $content;

	public function __construct($title, $url, $content) {
		$this->title = $title;
		$this->url = $url;
		$this->content = $content;
	}

	public function getArticleProperties() {
		$title = $this->title;
		$url = $this->url;
		$content = $this->content;

		return array('title' => $title, 'url' => $url, 'content' => $content);
	}

	public function isArticleExisting() {

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("SELECT * FROM articles WHERE title=:title LIMIT 1");
			$statement->bindParam(":title", $this->title);
			$statement->execute();
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		$data = $statement->fetch(PDO::FETCH_ASSOC);

		if ($data) {
			Database::disconnect();
			header('400 NOT OK');
			return json_encode(array("error" => "article with that title already exists in the database. Please try again with unique title."));
		} else {
			Database::disconnect();
			header('200 OK');
			return json_encode(array("message" => "article doesn't exists in the database"));
		}
	}

	public function addNewArticle() {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("INSERT INTO articles(title,url,content) VALUES(:title,:url,:content)");
			$statement->execute(array(
				"title" => $this->title,
				"url" => $this->url,
				"content" => $this->content,
			));
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		Database::disconnect();
	}

	public function deleteArticle() {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("DELETE FROM articles WHERE title=:title");
			$statement->execute(array(
				'title' => $this->title,
			));
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		Database::disconnect();
		header("200 OK");
		return json_encode(array("message" => "article with title $this->title deleted."));

	}

	public function updateArticle() {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("UPDATE articles SET title=:title, url=:url, content=:content WHERE title=:title");
			$statement->execute(array(
				'title' => $this->title,
				'url' => $this->url,
				'content' => $this->content,
			));
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		Database::disconnect();
		header("200 OK");
		return json_encode(array("message" => "article with title $this->title has been updated."));

	}
}