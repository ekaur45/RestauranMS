<?php
include_once "../../inc/db/connection.php";
$_name = __escape($_POST["name"]);
$_email = __escape($_POST["email"]);
$_password = __escape($_POST["password"]);
$_hashed = md5($_password);
$checkUser = "SELECT * FROM users where email='$_email'";
if(sizeof(__select($checkUser))>0){
    $_SESSION["ERROR"]  = "User already exists";

header("Location: ../../register.php");

}else{
    $query = "INSERT INTO users (`name`,email,`password`,`role`)values('$_name','$_email','$_hashed','user')";
    $result = __execute($query);
    $_users = __select($checkUser);
    $_SESSION["ID"] = $_users[0]["id"];
    $_SESSION["USER"] = $_users[0];
    $_SESSION["MSG"] = "User created successfuly";
    header("Location: ../../index.php");
}
