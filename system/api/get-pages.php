<?php
require_once '../controllers/pages_controller.php';

$controller = new PagesController();
$pages = $controller->showAll();
print_r($pages);