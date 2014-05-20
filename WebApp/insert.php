<?php
include('config.php');

$email = $_POST["email"];
$text = $_POST["text"];
$push = $_POST["push"];
session_start();
$driver = $_SESSION["driverid"];
$order = $_SESSION["order"];

$deleteCmd = "DELETE FROM notification WHERE fleetid='".$order."'";
mysql_query($deleteCmd);
$update = "INSERT INTO notification VALUES('".$order."', '".$driver."', '".$text."', '".$email."', '".$push."')";
mysql_query($update);

header("Location: setting.php");
exit();
?>
