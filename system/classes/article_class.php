<?php

require_once 'database_class.php';

class Article {
	private $alias;
	private $title;
	private $category;
	private $content;
	private $url;
	private $img_url;
	private $meta_title;
	private $meta_description;
	private $meta_keywords;

	public function __construct($alias, $title, $category, $content, $url, $img_url, $meta_title,
		$meta_description, $meta_keywords) {
		$this->alias = $alias;
		$this->title = $title;
		$this->category = $category;
		$this->content = $content;
		$this->url = $url;
		$this->img_url = $img_url;
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
			$statement = $pdo->prepare("SELECT * FROM articles WHERE alias=:alias LIMIT 1");
			$statement->bindParam(":alias", $this->alias);
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
			$statement = $pdo->prepare("INSERT INTO articles(alias,title,category,content,url,meta_title,meta_description,meta_keywords) VALUES(:alias,:title,:category,:content,:url,:meta_title,:meta_description,:meta_keywords)");
			$statement->execute(array(
				"alias" => $this->alias,
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
			$statement = $pdo->prepare("UPDATE articles SET alias=:alias,title=:title, category=:category, content=:content,url=:url,img_url=:img_url, meta_title=:meta_title, meta_description=:meta_description, meta_keywords=:meta_keywords WHERE alias=:alias");
			$statement->execute(array(
				'alias' => $this->alias,
				'title' => $this->title,
				'category' => $this->category,
				'content' => $this->content,
				'url' => $this->url,
				'img_url' => $this->img_url,
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
			return $data;
		} else {
			Database::disconnect();
			header('400 OK');
			return false;
		}
	}
}