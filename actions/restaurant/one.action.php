<?php
include_once "../../inc/db/connection.php";
$_id = $_GET["id"];
$sql = "SELECT *,(select image from restaurant_images where restaurant_id = restaurants.id limit 1) as image from restaurants where id=".$_id;

$result = __selectOne($sql);
header('Content-Type: application/json; charset=utf-8');
if($result){
    echo json_encode($result);
}
echo "";