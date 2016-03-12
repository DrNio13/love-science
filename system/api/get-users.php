<?php
require_once '../controllers/user_controller.php';

$controller = new UserController();
$listUsers = $controller->showAllUsers();
print_r($listUsers);