<?php

include_once "inc/shared/cookie-init.php";
session_destroy();
header("Location: index.php");