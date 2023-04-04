<?php
include_once "../../inc/db/connection.php";
$_id = $_GET["id"];
$sql = "select t1.id, t1.user_id, t1.rating,t1.comments,t2.name,t2.email from reviews t1 join users t2 on t1.user_id = t2.id where t1.id=".$_id;

$result = __selectOne($sql);
header('Content-Type: application/json; charset=utf-8');
if($result){
    echo json_encode($result);
}
echo "";