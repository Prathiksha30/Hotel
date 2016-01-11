<?php

$host = "localhost";
$db = "hotel";
$user = "root";

$conn = new mysqli($host, $user, "", $db);
global $conn;

if(mysqli_connect_errno()) {
	echo "connection failed:" . mysqli_connect_errno();
	exit();
}

?>