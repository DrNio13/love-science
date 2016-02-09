<?php

session_start();

require_once '../configuration/psl-config.php';
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

				if ($user->isAdmin()) {

					$_SESSION["usertype"] = $user->getUserPrivilege();
					$_SESSION["username"] = $user->getUsername();
					header("location:frontend/index.php");

				} else {
					// low privileges user

					$_SESSION["usertype"] = $user->getUserPrivilege();
					$_SESSION["username"] = $user->getUsername();
					header("location:frontend/index.php");
				}

			} else {
				session_write_close();
				http_response_code(401);
				header("location:login.php");
			}
		} else {
			http_response_code(404);
			echo 'not registered - wrong credentials';
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