<?php

include_once '../system/validations.php';
include_once '../system/db_fetch.php';

$username = $_POST['username'];
$password = $_POST['password'];

// If non empty values
if (isset($username) && isset($password)) {
	// Run validations
	if (Validate::username($username) && Validate::password($password)) {
		// valid username - username exists
		if(getUserByUsername($username)){
			$user = getUserByUsername($username);
			if ( password_verify( $password, $user[password]) ){
				echo 'username found and the pass is correct';
			}
			else {
				echo 'username found and the pass is wrong';	
			}
		}
		else {
			echo 'truthie and falsie not works';
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