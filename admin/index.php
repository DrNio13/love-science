<?php

session_start();

require_once '../configuration/local-config.php';
require_once '../system/functions/validation.php';
require_once '../system/classes/user_class.php';

$username = $_POST['username'];
$password = $_POST['password'];

// If non empty values
if (isset($username) && isset($password)) {

	$username = stripcslashes($username);
	$passoword = stripcslashes($password);

	// Run validations
	if (Validate::username($username) && Validate::password($password)) {

		$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);

		// user credentials passed the validations
		$publicUser = new PublicUser($username, $password);
		$result = $publicUser->getUserByUsername($username);

		if ($result) {
			// username found
			if (password_verify($password, $result['password'])) {

				$user = new User($result['username'], $result['password'], $result['administrator']);

				$_SESSION["usertype"] = $user->getUserPrivilege();
				$_SESSION["username"] = $user->getUsername();
				$_SESSION["ip"] = $user->getRealIpAddr();

				header("location:frontend/index.php");
				exit();

			} else {
				session_write_close();
				http_response_code(401);
				header("location:login.php");
				exit();
			}
		} else {
			http_response_code(404);
			//'not registered - wrong credentials';
			header("location:login.php");
			exit();
		}
	} else {
		// not valid username or password
		http_response_code(404);
		header("location:login.php");
		die("not valid username or password");
	}
} else {
	http_response_code(404);
	header("location:login.php");
	die("username or password not passed");

}