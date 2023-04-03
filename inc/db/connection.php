<?php

$servername = "localhost";
$username = "root";
$password = "test123";
$dbname = "restaurantms";

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

function __execute($sql){
  global $conn;
  $result = $conn->query($sql);
  return $result === TRUE;
}
function __select($sql){
  global $conn;
  $result = $conn->query($sql);
  if($result&&$result->num_rows>0){
    $rows = [];
    while($row=$result->fetch_assoc()){
      $rows[]= $row;
    }
    return $rows;
  }
  return [];
}