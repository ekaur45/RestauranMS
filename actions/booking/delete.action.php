<?php
include_once "../../inc/db/connection.php";
include_once "../../inc/shared/cookie-init.php";

$_id = $_GET["id"];
$sql = "delete from bookings where id = $_id";
__execute($sql);
$_SESSION["MSG"] = "Booking deleted successfuly.";
header("Location: ../../bookings.php");