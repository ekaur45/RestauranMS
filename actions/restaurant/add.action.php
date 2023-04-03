<?php
include_once "../../inc/db/connection.php";
include_once "../../inc/shared/cookie-init.php";

$_name = __escape($_POST["name"]);
$_location = __escape($_POST["location"]);
$_cuisine = __escape($_POST["cuisine"]);
$_price_range = __escape($_POST["price_range"]);

$sql = "INSERT INTO `restaurants`(`name`,`location`,`cuisine`,`price_range`)VALUES('$_name','$_location','$_cuisine','$_price_range');";

__execute($sql);
header("Location: ../../restaurants.php");