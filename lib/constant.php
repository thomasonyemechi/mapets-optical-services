<?php


define('LINK', 'http://localhost/livepetal/api/onlinecourse/api.php');


date_default_timezone_set('Africa/Lagos');
define("DB_SERVER", "localhost");
define("DB_USER", "root"); //enter your database username
define("DB_PASS", ""); //databse password
define("DB_NAME", "mapet"); //database name

$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);



define("DB_SERVER2", "localhost");
define("DB_USER2", "root"); //enter your database username
define("DB_PASS2", ""); //databse password
define("DB_NAME2", "uniexpress"); //database name

$db2 = new mysqli(DB_SERVER2, DB_USER2, DB_PASS2, DB_NAME2);

