<?php
require_once '../controllers/article_controller.php';

$controller = new ArticleController();
$listArticles = $controller->showAll();
print_r($listArticles);