<?php
session_start();
echo "hello i should have a session";
print_r($_SESSION);

session_destroy();
?>
