<?php
class Error {
	public static function info() {
		return "Something went wrong in file: " . $_SERVER['PHP_SELF'];
	}
}