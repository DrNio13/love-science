<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define("ASSETS", end(explode('/', $_SERVER['DOCUMENT_ROOT'] . '/assets')));
define("SYSTEM", $_SERVER['DOCUMENT_ROOT'] . '/system');
define("CONFIG", $_SERVER['DOCUMENT_ROOT'] . '/configuration');