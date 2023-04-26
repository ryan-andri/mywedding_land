<?php
// block Cross Site Scripting attack, not really!
header("X-XSS-Protection: 1; mode=block");

// base path
define('BASE_PATH', dirname(dirname(__FILE__)));

// load required Dependencies
require_once BASE_PATH . '/configs/env/loadenv.php';
require_once BASE_PATH . '/configs/db/DBConnection.php';

// ssl ?
$ssl = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off';
$ssl_url = $ssl ? 'https://' : 'http://';

define('BASE_URL', $ssl_url . env('MAIN_HOST'));
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));
