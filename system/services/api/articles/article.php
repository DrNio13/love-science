<?php
require_once '../../../../config.php';
require_once SYSTEM . '/classes/article_class.php';

$postData = file_get_contents("php://input");

if ($postData) {
	$article = new Article(null, null, null, null, null, null, null, null, null);
	$article = $article->getArticleByUrl($postData);
	echo json_encode($article);
} else {
	echo json_encode(array("error" => "some error occured"));
}