<?php
include_once "../../inc/db/connection.php";
include_once "../../inc/shared/cookie-init.php";

$_review_id = __escape($_POST["review_id"]);
$_rating = __escape($_POST["rating"]);
$_comments = __escape($_POST["comments"]);
$sql = "UPDATE `reviews` SET `rating`='$_rating',`comments`='$_comments' WHERE id=$_review_id ;";
__execute($sql);
header("Location: ../../reviews.php");