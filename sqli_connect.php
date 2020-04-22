<?php

define('DB_USER', 'brooklyn_2020');
define('DB_PASSWORD', 'dragonteacher');
define('DB_HOST', 'localhost');
define('DB_NAME', 'brooklyn_practice');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect: ' . mysqli_connect_error() ); //@ sympol suppresses errors, works without but not recommended

mysqli_set_charset($dbc, 'utf8');

?>