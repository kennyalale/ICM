<?php
$servername ="localhost";
$username ="u365243599_root";
$password ="j@7A]:QY*PJ";
$dbname ="u365243599_db";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>