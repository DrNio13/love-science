<?php

session_start();

include '../configuration/psl-config.php';
include 'errors-info.php';
include_once '../system/functions/validation.php';
include_once '../system/classes/user.php';

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
					$_SESSION["user"] = "administrator";
					header("location:frontend/index.php");

				} else {
					// low privileges user
					$_SESSION["user"] = "registered";
					header("location:frontend/index.php");
				}

			} else {
				session_write_close();
				header("location:login.php");
			}
		} else {
			echo 'not registered - wrong credentials';
		}
	} else {
		// not valid username or password
		http_response_code(404);
		die("not valid username or password");
	}
} else {
	http_response_code(404);
	die("username or password not passed");

}