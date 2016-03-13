<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// BASE FOLDER AND URL PATHS
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT'] . '/love-science');
define("BASE", '/love-science');

// FOLDER PATHS
define("ASSETS", end(explode('/', $_SERVER['DOCUMENT_ROOT'] . '/assets')));
define("SYSTEM", DOCUMENT_ROOT . '/system');
define("CONFIG", DOCUMENT_ROOT . '/configuration');
define("ADMIN", DOCUMENT_ROOT . '/admin');
define("ACTIONS", ADMIN . '/actions');
define("COMPONENTS", ADMIN . '/components');
define("FRONTEND_CMS", ADMIN . '/frontend');
define("PARTIALS_CMS", ADMIN . '/partials');

// URLs
define("ACTIONS_CMS_URL", BASE . '/admin/actions');
define("COMPONENTS_CMS_URL", BASE . '/admin/components');
define("FRONTEND_CMS_URL", BASE . '/admin/frontend');
define("PARTIALS_CMS_URL", BASE . '/admin/partials');
define("NODE_MODULES_CMS_URL", BASE . '/node_modules');