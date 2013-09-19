<?php
session_start();
if (isset($_SESSION["admin"])) {
	header("location: index.php");
}

if(isset($_SESSION["id"])){
	echo "Du har nu loggat ut";
	unset($_SESSION["id"]);
};
?>

<?php

if (isset($_POST["username"])&& isset($_POST["password"])) {
$admin = preg_replace('#^A-Za-z0-9#i', "", $_POST["username"]);
$password = preg_replace('#^A-Za-z0-9#i', "", $_POST["password"]);



include "../connect_to_mysql.php";
$sql = mysql_query("SELECT id FROM admin WHERE username='$admin' AND password='$password' LIMIT 1");
$existCount = mysql_num_rows($sql);
if ($existCount == 1) {
	while ($row=mysql_fetch_array($sql)) {
		$id = $row["id"];
	}
	$_SESSION["id"]="<p>DU har nu loggat in </p>";
	$_SESSION["admin"]=$admin;
	$_SESSION["password"]=$password;
	header("location: index.php");
}

	else if ($admin == "") {
	echo "Användarnamnet saknas";
}
 else {

	echo 'Inkorrekt användarnamn/lösenord';

}
}

$day = date("N");
$arrDays = Array("Måndag","Tisdag","Onsdag","Torsdag","Fredag","Lördag","Söndag",);
$printDay = $arrDays[$day-1];

$month = date("m");
$arrMonths= Array("januari","februari","mars","april","maj","juni","juli","augusti","september","oktober","november","december");
$printMonth = $arrMonths[($month-1)]; 

$date = date("d");
$year = date("Y");
$time = date("H:i:s");

echo "<br>$printDay den $date $printMonth $year Klockan är [$time]";
?>

<html>





<header>
<title>Admin</title>
	<link rel="Stylesheet" href="../CSS/styling.css" />
	<meta http-equiv="content-type" content="text/html"; charset="utf-8">
</header>

<body>
	<form id="LogIn" name="LogIn" method="post" action="admin_login.php">
		Användarnamn:
		<input name="username" type="text" id="username" size="40"/>
		Lösenord:
		<input name="password" type="password" id="password" size="40"/>
		<input type ="submit" name="button" id="button" value="Logga in">
		<label for='AutologinID' >Håll mig inloggad  :</label>
		<input type='checkbox' name='LoginView::Checked' id='AutologinID' />
		

	</form>
</body>
</html>