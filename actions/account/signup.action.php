<?php
include_once "../../inc/db/connection.php";
$_name = __escape($_POST["name"]);
$_email = __escape($_POST["email"]);
$_password = __escape($_POST["password"]);
$_hashed = md5($_password);
$checkUser = "SELECT * FROM users where email='$_email'";
if(sizeof(__select($checkUser))>0){
    echo "User already exists";
}else{
    $query = "INSERT INTO users (`name`,email,`password`,`role`)values('$_name','$_email','$_hashed','user')";
    $result = __execute($query);
}