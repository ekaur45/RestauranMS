<?php
include_once "../../inc/db/connection.php";
include_once "../../inc/shared/cookie-init.php";

$_id = $_GET["id"];
$_restuarant_id = $_GET["resid"];
$sql = "delete from reviews where id = $_id";
__execute($sql);
$_SESSION["MSG"]="Review deleted successfully.";
header("Location: ../../reviews.php?id=$_restuarant_id");