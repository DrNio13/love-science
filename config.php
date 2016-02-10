<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT'] . '/love-science');

define("ASSETS", end(explode('/', $_SERVER['DOCUMENT_ROOT'] . '/assets')));
define("SYSTEM", DOCUMENT_ROOT . '/system');
define("CONFIG", DOCUMENT_ROOT . '/configuration');
define("ADMIN", DOCUMENT_ROOT . '/admin');