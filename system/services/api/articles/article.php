<?php
require_once '../../../../config.php';
require_once SYSTEM . '/controllers/article_controller.php';

$postdata = file_get_contents("php://input");
$url = json_decode($postdata);

$controller = new ArticleController();
$article = $controller->getArticleByUrl('baconaki');
echo $article;