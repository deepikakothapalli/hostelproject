<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
define("DB_SERVER", "localhost:3306");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "hostel");
$connect=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>