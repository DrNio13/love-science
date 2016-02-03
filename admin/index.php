<?php

include_once '../system/validations.php';
include_once '../system/db_fetch.php';

$username = $_POST['username'];
$password = $_POST['password'];

// If non empty values
if (isset($username) && isset($password)) {
	// Run validations
	if (Validate::username($username) && Validate::password($password)) {
		// valid username and password
		echo "valid username and password <br>";
		print getUserByUsername($username);
	} else {
		// not valid username or password
		http_response_code(404);
		die("not valid username or password");
	}
} else {
	http_response_code(404);
	die("username or password not passed");

}