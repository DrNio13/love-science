<?php

require_once "../../../config.php";
require_once SYSTEM . "/classes/article_class.php";

$postdata = file_get_contents("php://input");
$data = json_decode($postdata);

if (!empty($data->id)) {

	$article = new Article($data->title, $data->category, $data->content,
		$data->url, $data->meta_title, $data->meta_description, $data->meta_keywords);

	if ($article->articleExists()) {
		$article->deleteArticle($data->id);
		http_response_code("200");
		echo json_encode(array("message" => "Article with title " . $article->getArticleName() . " as been deleted."));
	} else {
		http_response_code("500");
		echo json_encode(array("message" => "Article with title " . $article->getArticleName() . " hasn't been found"));
	}

} else {
	// redirect to write the article
	http_response_code("500");
	echo json_encode(array("error" => "error deleting article with id " . $data->id));
}