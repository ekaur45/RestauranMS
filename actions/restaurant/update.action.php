<?php
include_once "../../inc/db/connection.php";
include_once "../../inc/shared/cookie-init.php";

$_id = __escape($_POST["id"]);
$_name = __escape($_POST["name"]);
$_location = __escape($_POST["location"]);
$_cuisine = __escape($_POST["cuisine"]);
$_price_range = __escape($_POST["price_range"]);

$sql = "UPDATE `restaurants` SET `name`='$_name',`location`='$_location',`cuisine`='$_cuisine',`price_range`='$_price_range' where id=$_id ;";
__execute($sql);
// $sql1 = "select last_insert_id() as id;";
// $result = __select($sql1);
// $id = $result[0]["id"];
// foreach ($_POST["files"] as $value) {    
//     $sql1 = "insert into restaurant_images(restaurant_id,image)values('$id','$value')";
//     __execute($sql1);
// }
$_SESSION["MSG"] = "Restaurant updated successfully.";
header("Location: ../../restaurants.php");