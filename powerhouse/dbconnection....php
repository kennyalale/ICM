<?php
define('DB_SERVER','localhost');
define('DB_USER','u575327465_root');
define('DB_PASS' ,'8T#lX[s@h~');
define('DB_NAME', 'u575327465_db');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>

