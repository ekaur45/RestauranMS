<?php
include_once "../../inc/db/connection.php";
include_once "../../inc/shared/cookie-init.php";
$_email = __escape($_POST["email"]);
$_password = __escape($_POST["password"]);
$_hashed = md5($_password);
$checkUser = "SELECT * FROM users where email='$_email'";
$_users = __select($checkUser);
if(sizeof($_users)>0){
    if($_hashed==$_users[0]["password"]){
        $_SESSION["ID"] = $_users[0]["id"];
        $_SESSION["USER"] = $_users[0];
        header("Location: ../../index.php");
    }else{
        echo "Email or password is not correct.";
    }
}else{
    echo "User not exists";
}