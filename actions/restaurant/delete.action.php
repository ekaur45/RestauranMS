<?php
include_once "../../inc/db/connection.php";
include_once "../../inc/shared/cookie-init.php";

$_id = $_GET["id"];
$sql = "delete from restaurants where id = $_id";
__execute($sql);
$_SESSION["MSG"] = "Restaurant deleted successfuly.";
header("Location: ../../restaurants.php");