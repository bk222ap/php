<?php
session_start();
session_destroy();
session_start();
$_SESSION["id"] = "FlashigText";
header("location: admin_login.php");