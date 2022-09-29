<?php

// Database Credentials
$db_credentials = parse_ini_file("credentials.ini", true);
$db_host = $db_credentials['postgresql']['host'];
$db_database = $db_credentials['postgresql']['database'];
$db_user = $db_credentials['postgresql']['user'];
$db_password = $db_credentials['postgresql']['password'];

// Database Connection
$conn_str = "host="  . $db_host . " dbname=" . $db_database . " user=" . $db_user . " password=" . $db_password; 
$db = pg_connect($conn_str);