<?php
include_once("../../inc/db/connection.php");
$id = $_GET["id"];
$sql = "select *,(select `name` from users where id = user_id) as userName,(select `name` from restaurants where id = restaurant_id) as restaurant from bookings where id=".$id ;

$result = __select($sql);
header('Content-Type: application/json; charset=utf-8');
if(sizeof($result)>0){
    echo json_encode($result[0]);
}else{
    echo "";
}