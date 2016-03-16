<?php
require_once '../../../../config.php';
require_once SYSTEM . '/controllers/article_controller.php';

$controller = new ArticleController();
$listArticles = $controller->showAll();
print_r($listArticles);