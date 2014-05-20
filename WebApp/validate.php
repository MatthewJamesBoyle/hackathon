<?php
include('config.php');
$user = $_POST["user"];
$pwd = $_POST["password"];

$result = mysql_query("SELECT driverid, forename FROM driver WHERE driverid='".$user."' AND password='".$pwd."'")
or die(mysql_error());
$row = mysql_fetch_array($result);
$id = (int)$row['driverid'];
$uid = $row['driverid'];
$name = $row['forename'];
if($id > 0) {
	session_start();
	$_SESSION['driverid'] = $uid;
	$_SESSION['forename'] = $name;
	header("Location: track.php");
	exit();
}
else {
	$message = "Login details incorrect, please try again";
	echo "<script> alert('$message'); <script>"; 
	header("Location: index.php");
	exit();
	}
?>