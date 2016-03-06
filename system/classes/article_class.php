<?php

require_once 'database_class.php';

class Article {
	private $title;
	private $category;
	private $content;
	private $metaTitle;
	private $metaDescription;
	private $metaKeywords;

	public function __construct($title, $category, $content, $metaTitle, $metaDescription, $metaKeywords) {
		$this->title = $title;
		$this->category = $category;
		$this->content = $content;
		$this->metaTitle = $metaTitle;
		$this->metaDescription = $metaDescription;
		$this->metaKeywords = $metaKeywords;
	}

	public function getArticleProperties() {
		$title = $this->title;
		$category = $this->category;
		$content = $this->content;
		$metaTitle = $this->metaTitle;
		$metaDescription = $this->metaDescription;
		$metaKeywords = $this->metaKeywords;

		return array('title' => $title, 'category' => $category, 'content' => $content, $metaTitle, $metaDescription, $metaKeywords);
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
			header('400 NOT OK');
			return true;
			// return json_encode(array("error" => "article with that title already exists in the database. Please try again with unique title."));
		} else {
			Database::disconnect();
			header('200 OK');
			return false;
			// return json_encode(array("message" => "article doesn't exists in the database"));
		}
	}

	public function addNewArticle() {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			$statement = $pdo->prepare("INSERT INTO articles(title,category,content,meta_title,meta_description,meta_keywords) VALUES(:title,:category,:content,:metaTitle,:metaDescription,:metaKeywords)");
			$statement->execute(array(
				"title" => $this->title,
				"category" => $this->category,
				"content" => $this->content,
				"metaTitle" => $this->metaTitle,
				"metaDescription" => $this->metaDescription,
				"metaKeywords" => $this->metaKeywords,
			));
		} catch (Exception $e) {
			Database::disconnect();
			print $e->getMessage();
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
			$statement = $pdo->prepare("UPDATE articles SET title=:title, category=:category, content=:content, meta_title=:metaTitle, meta_description=:metaDescription, meta_keywords=:metaKeywords WHERE title=:title");
			$statement->execute(array(
				'title' => $this->title,
				'category' => $this->category,
				'content' => $this->content,
				'metaTitle' => $this->metaTitle,
				'metaDescription' => $this->metaDescription,
				'metaKeywords' => $this->metaKeywords,
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