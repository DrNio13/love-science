<?php

session_start();

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
		// preg replace for pass ....

		// user credentials passed the validations
		$publicUser = new PublicUser($username, $password);

		// check the db if the user is registered
		if ($publicUser->isRegistered($username)) {
			echo 'yes2';

			// we have this user in the db
			$user = new User($username, $password);

			if ($user->isAdmin()) {
				//password_verify($password, $user[password])

				// echo 'username found and the pass is correct and is admin';

				// session_register("username");
				// session_register("password");
				header("location:login_success.php");

			} else {
				// echo 'username found and the pass is wrong';
				// simple user
				header("location:login_success.php");
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