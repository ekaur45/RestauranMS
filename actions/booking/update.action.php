<?php
include_once "../../inc/db/connection.php";
include_once "../../inc/shared/cookie-init.php";

$id = __escape($_POST["booking_id"]);
$_date = __escape($_POST["date"]);
$_time = __escape($_POST["time"]);
$_party_size = __escape($_POST["party_size"]);
$userid = $_SESSION["ID"];
$sql = "UPDATE `bookings` set `date`='$_date',`time`='$_time',`party_size`='$_party_size' WHERE id = $id  ;";
__execute($sql);
header("Location: ../../bookings.php");