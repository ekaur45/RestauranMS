<?php
//var_dump($_FILES);

$_files = $_FILES["file"];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"],"../../".$target_file);