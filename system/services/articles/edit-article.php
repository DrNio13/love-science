<?php

require_once "../../classes/article_class.php";

$postdata = file_get_contents("php://input");
$id = json_decode($postdata);

if ($id) {
	$article = new Article(null, null, null, null, null, null, null, null, null);
	$article = $article->getArticleById($id);
	echo json_encode($article);
} else {
	echo json_encode(array("error" => "some error occured"));
}