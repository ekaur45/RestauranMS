<?php

$servername = "localhost";
$username = "root";
$password = "test123";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
function __escape($param){
    global $conn;
    return mysqli_real_escape_string($conn,$param);
}
