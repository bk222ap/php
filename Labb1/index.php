<?php
session_start();
if(!isset($_SESSION["admin"])){
	header("location: admin_login.php");
}
if(isset($_SESSION["id"])){
	echo "Du har nu loggat in";
	unset($_SESSION["id"]);
};

?>

<html>

<head>
	<h1>Admin
</h1>
	<title>Admin</title>
	<?php echo "Du är inloggad" ?>
	<link rel="Stylesheet" href="../CSS/styling.css" />
	<meta http-equiv="content-type" content="text/html"; charset="utf-8">
	<p><a href="logout.php">logga ut</a></p>
</head>

