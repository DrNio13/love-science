<?php

include 'errors-info.php';

class Validate {
	public static function username($username) {

		// for english chars + numbers only
		// valid username, alphanumeric & longer than or equals 5 chars
		if (preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
			return true;
		} else {
			echo "english chars and numbers only. total password length >= 5 chars <br>";
			return false;
		}
	}

	public static function password($password) {
		if (strlen($_POST["password"]) <= '8') {
			echo "Your Password Must Contain At Least 8 Characters!";
			return false;
		} elseif (!preg_match("#[0-9]+#", $password)) {
			echo "Your Password Must Contain At Least 1 Number!";
			return false;
		} elseif (!preg_match("#[A-Z]+#", $password)) {
			echo "Your Password Must Contain At Least 1 Capital Letter!";
			return false;
		} elseif (!preg_match("#[a-z]+#", $password)) {
			echo "Your Password Must Contain At Least 1 Lowercase Letter!";
			return false;
		} else {
			return true;
		}
	}
}