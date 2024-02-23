<?php
// Debugging
ini_set('error_reporting', E_ALL);

// DATABASE INFORMATION
define('DATABASE_HOST', getenv('IP'));
define('DATABASE_NAME', 'db_project');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '');

define('COMPANY_LOGO', 'images/logo.png');
define('COMPANY_LOGO_WIDTH', '300');
define('COMPANY_LOGO_HEIGHT', '90');


define('DATE_FORMAT', 'DD/MM/YYYY'); // DD/MM/YYYY or MM/DD/YYYY
define('CURRENCY', '฿'); // Currency symbol


// CONNECT TO THE DATABASE
$mysqli = new mysqli("localhost", "root", "", "db_project");
