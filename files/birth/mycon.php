<?php
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geronacodes";

// Create connection
$connx = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connx->connect_error) {
  die("Connection failed: " . $connx->connect_error);
}
?>