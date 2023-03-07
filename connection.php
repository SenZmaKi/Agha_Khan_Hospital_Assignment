<?php
$hostname  = "localhost";
$username = "root";
$password = "";
$dbName = "agha_khan";

$conn = new mysqli($hostname, $username, $password, $dbName);
// Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>