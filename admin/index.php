<?php

session_start();

require_once '../config.php';
require_once CONFIG . '/local-config.php';
require_once SYSTEM . '/helpers/validation.php';
require_once SYSTEM . '/classes/user_class.php';
require_once SYSTEM . '/controllers/login_controller.php';

//********************************************************
// test for brute force attack - check login.php
//********************************************************

// require_once '../system/controllers/login_controller.php';

// $mainController = new LoginController();
// $ip = $mainController->getRealIpAddr();
// print $ip;

$username = $_POST['username'];
$password = $_POST['password'];

// If non empty values
if (isset($username) && isset($password)) {

	$username = stripcslashes($username);
	$passoword = stripcslashes($password);

	$mainController = new LoginController();
	$ip = $mainController->getRealIpAddr();
	$record = $mainController->getLoginRecordByIp($ip);

	// Run validations
	if (Validate::username($username) && Validate::password($password)) {

		$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);

		// user credentials passed the validations
		$publicUser = new PublicUser($username, $password);
		$result = $publicUser->getUserByUsername($username);

		if ($result) {
			// username found
			if (password_verify($password, $result['password']) && (int) $result['blocked'] !== 1) {
				print_r($result);
				$user = new User($result['username'], $result['password'], $result['administrator']);

				$_SESSION["usertype"] = $user->getUserPrivilege();
				$_SESSION["username"] = $user->getUsername();
				$_SESSION["ip"] = $user->getRealIpAddr();

				header("location: frontend/index.php");
				exit();

			} elseif ((int) $result['blocked'] === 1) {
				header("location: blocked.html");
				exit();
			} else {

				//******wrap it in a function********//
				if ($record) {
					$counter = (int) $record['login_counter'];
					$loginCounter = $mainController->updateLoginCounter($ip, $counter);
				} else {
					$mainController->setLoginRecord($ip);
				}
				if ($loginCounter >= 5) {
					header("location: blocked.html");
				}
				//************************************//

				session_write_close();
				http_response_code(401);
				header("location: actions/login.php");
				exit();
			}
		} else {

			//*********** wrap it in a function ********//
			if ($record) {
				$counter = (int) $record['login_counter'];
				$loginCounter = $mainController->updateLoginCounter($ip, $counter);
			} else {
				$mainController->setLoginRecord($ip);
			}
			if ($loginCounter >= 5) {
				header("location: blocked.html");
			}
			//************************************//

			http_response_code(404);
			//'not registered - wrong credentials';
			header("location: actions/login.php");
			exit();
		}
	} else {

		if ($record) {
			$counter = (int) $record['login_counter'];
			$loginCounter = $mainController->updateLoginCounter($ip, $counter);
		} else {
			$mainController->setLoginRecord($ip);
		}
		if ($loginCounter >= 5) {
			header("location: blocked.html");
		}

		// not valid username or password
		http_response_code(404);
		header("location: actions/login.php");
		die("not valid username or password");
	}
} else {
	http_response_code(404);
	header("location: actions/login.php");
	die("username or password not passed");

}