<?php
require_once '../../../../config.php';
require_once SYSTEM . '/controllers/user_controller.php';

$controller = new UserController();
$listUsers = $controller->showAllUsers();
print_r($listUsers);