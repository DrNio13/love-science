<?php
session_start();

if (!($_SESSION['user'] === 'administrator' || $_SESSION['user'] === 'user')) {
	header("location:login.php");
}

echo "hello i should have a session";
print_r($_SESSION);

session_destroy();
?>