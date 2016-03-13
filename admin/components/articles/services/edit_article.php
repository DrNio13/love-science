<?php

require_once '../../../../config.php';
require_once SYSTEM . "/classes/article_class.php";

$postdata = file_get_contents("php://input");
$id = json_decode($postdata);

if ($id) {
	$article = new Article(null, null, null);
	$article = $article->getArticleById($id);
	echo json_encode($article);
} else {
	echo json_encode(array("error" => "some error occured"));
}