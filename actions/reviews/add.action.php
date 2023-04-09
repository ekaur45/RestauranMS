<?php
include_once "../../inc/db/connection.php";
include_once "../../inc/shared/cookie-init.php";

$_id = __escape($_POST["id"]);
$_rating = __escape($_POST["rating"]);
$_comments = __escape($_POST["comments"]);
$userid = $_SESSION["ID"];
$sql = "INSERT INTO `reviews`(`restaurant_id`,`user_id`,`rating`,`comments`)VALUES('$_id','$userid','$_rating','$_comments');";
__execute($sql);
$_SESSION["MSG"] = "Review added successfully.";
header("Location: ../../reviews.php?id=$_id");
