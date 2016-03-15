<?php

require_once 'database_class.php';

class Article {
	private $title;
	private $category;
	private $content;
	private $url;
	private $meta_title;
	private $meta_description;
	private $meta_keywords;

	public function __construct($title, $category, $content, $url, $meta_title,
		$meta_description, $meta_keywords) {
		$this->title = $title;
		$this->category = $category;
		$this->content = $content;
		$this->url = $url;
		$this->meta_title = $meta_title;
		$this->meta_description = $meta_description;
		$this->meta_keywords = $meta_keywords;
	}

	public function getArticleProperties() {
		$title = $this->title;
		$category = $this->category;
		$content = $this->content;
		$url = $this->url;
		$meta_title = $this->meta_title;
		$meta_description = $this->meta_description;
		$meta_keywords = $this->meta_keywords;

		return array('title' => $title, 'category' => $category, 'content' => $content, 'url' => $url, 'meta_title' => $meta_title, 'meta_description' => $meta_description, 'meta_keywords' => $meta_keywords);
	}

	public function getArticleName() {
		$title = $this->title;
		return $title;
	}

	public function articleExists() {

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
			header('200');
			return true;
			// return json_encode(array("message" => "article with that title already exists in the database. Please try again with unique title."));
		} else {
			Database::disconnect();
			header('400');
			return false;
			// return json_encode(array("message" => "article doesn't exists in the database"));
		}
	}

	public function getArticleById($id) {

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("SELECT * FROM articles WHERE id=:id LIMIT 1");
			$statement->bindParam(":id", $id);
			$statement->execute();
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		$data = $statement->fetch(PDO::FETCH_ASSOC);

		if ($data) {
			Database::disconnect();
			header('200 OK');
			return $data;
		} else {
			Database::disconnect();
			header('400 OK');
			return false;
		}
	}

	public function addNewArticle() {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("INSERT INTO articles(title,category,content,url,meta_title,meta_description,meta_keywords) VALUES(:title,:category,:content,:url,:meta_title,:meta_description,:meta_keywords)");
			$statement->execute(array(
				"title" => $this->title,
				"category" => $this->category,
				"content" => $this->content,
				'url' => $this->url,
				'meta_title' => $this->meta_title,
				'meta_description' => $this->meta_description,
				'meta_keywords' => $this->meta_keywords,
			));
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		Database::disconnect();
	}

	public function deleteArticle($id) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("DELETE FROM articles WHERE id=:id");
			$statement->execute(array(
				'id' => $id,
			));
		} catch (Exception $e) {
			Database::disconnect();
			return $e->getMessage();
		}

		Database::disconnect();
		header("200 OK");
		return json_encode(array("message" => "article with title $this->title has been deleted."));

	}

	public function updateArticle() {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("UPDATE articles SET title=:title, category=:category, content=:content,url=:url, meta_title=:meta_title, meta_description=:meta_description, meta_keywords=:meta_keywords WHERE title=:title");
			$statement->execute(array(
				'title' => $this->title,
				'category' => $this->category,
				'content' => $this->content,
				'url' => $this->url,
				'meta_title' => $this->meta_title,
				'meta_description' => $this->meta_description,
				'meta_keywords' => $this->meta_keywords,
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