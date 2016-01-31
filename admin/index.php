<?php

include '../system/validations.php';

$username = $_POST['username'];
$password = $_POST['password'];

// If non empty values
if (isset($username) && isset($password)) {
	// Run validations
	if (Validate::username($username) && Validate::password($password)) {
		// valid username and password
		echo "valid username and password";
	} else {
		// not valid username or password
		die("not valid username or password");
	}
} else {
	echo "username or password not passed";
}