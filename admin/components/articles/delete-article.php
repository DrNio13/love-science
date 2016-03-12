<?php
session_start();

require_once '../../config.php';

if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
	header("location:../login.php");
}
