<?php
include_once "../../inc/db/connection.php";
include_once "../../inc/shared/cookie-init.php";

$_restaurant_id = __escape($_POST["restaurant_id"]);
$_date = __escape($_POST["date"]);
$_time = __escape($_POST["time"]);
$_party_size = __escape($_POST["party_size"]);
$userid = $_SESSION["ID"];
$sql = "INSERT INTO `bookings`(`restaurant_id`,`user_id`,`date`,`time`,`party_size`)VALUES('$_restaurant_id','$userid','$_date','$_time','$_party_size');";
__execute($sql);
$_SESSION["MSG"] = "Booking added.";
header("Location: ../../bookings.php");