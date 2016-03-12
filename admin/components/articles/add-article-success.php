<?php

require_once "../../../config.php";
require_once SYSTEM . "/classes/article_class.php";

if (!empty($_POST["content"]) && !empty($_POST["title"]) && !empty($_POST["category"])) {

	$article = new Article($_POST["title"], $_POST["category"], $_POST["content"]);

	if ($article->articleExists()) {
		$article->updateArticle();
		http_response_code("200");
		echo json_encode(array("message" => "Article with title " . $article->getArticleName() . " has been updated."));
	} else {
		$article->addNewArticle();
		http_response_code("200");
		echo json_encode(array("message" => "Article added to the database"));
	}

} else {
	// redirect to write the article
	http_response_code("400");
	echo json_encode(array("error" => "Title,Content and Category must be filled"));
}