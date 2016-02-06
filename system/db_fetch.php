<?php

include 'functions/db_connection.php';

function getUserByUsername($username) {
	$pdo = Database::connect();
	$sth = $pdo->prepare('SELECT * FROM users WHERE username=:username');
	$sth->bindParam(':username', $username);
	$sth->execute();
	$data = $sth->fetch(PDO::FETCH_ASSOC);
	if ($data) {
		// print "User $data[username] exists <br>";
		return $data;
	} else {
		// print "given '$username' not a user <br>";
		return false;
	}

}