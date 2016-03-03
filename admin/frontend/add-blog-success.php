<?php

require_once "../../config.php";
require_once SYSTEM . "/classes/article_class.php";

if (!empty($_POST["content"]) && !empty($_POST["title"]) && !empty($_POST["category"])) {

	$article = new Article($_POST["title"], $_POST["category"], $_POST["content"]);
	echo $article->isArticleExisting();

} else {
	// redirect to write the article
	echo json_encode(array("error" => "Title,Content and Category must be filled"));
}