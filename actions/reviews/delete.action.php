<?php
include_once "../../inc/db/connection.php";
include_once "../../inc/shared/cookie-init.php";

$_id = $_GET["id"];
$sql = "delete from reviews where id = $_id";
__execute($sql);
header("Location: ../../reviews.php");