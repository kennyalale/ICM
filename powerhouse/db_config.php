<?php
$servername ="localhost";
$username ="u575327465_root";
$password ="8T#lX[s@h~";
$dbname ="u575327465_db";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>

