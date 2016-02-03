<?php

include 'db_connect.php';

function getUserByUsername($username) {
	$pdo = Database::connect();
	$sth = $pdo->prepare('SELECT * FROM users WHERE username=:username');
	$sth->bindParam(':username', $username);
	$sth->execute();
	$data = $sth->fetch();
	if ($data) {
		print "User '$username' exists <br>";
		return $username;
	} else {
		print "given '$username' not a user <br>";
		return false;
	}

}