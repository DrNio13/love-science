<?php

require_once "../../classes/article_class.php";

$postdata = file_get_contents("php://input");
$data = json_decode($postdata);

if (!empty($data->title) && !empty($data->category) && !empty($data->content)) {

	$article = new Article($data->title, $data->category, $data->content, $data->url, $data->img_url,
		$data->meta_title, $data->meta_description, $data->meta_keywords);

	if ($article->articleExists()) {
		$article->updateArticle();
		http_response_code("200");
		echo json_encode(array("message" => "Article with title " . $article->getArticleName() . " as been updated."));
	} else {
		$article->addNewArticle();
		http_response_code("200");
		echo json_encode(array("message" => "Article with title " . $article->getArticleName() . " added to the database"));
	}

} else {
	// redirect to write the article
	http_response_code("400");
	echo json_encode(array("error" => "Title,Content and Category must be filled"));
}