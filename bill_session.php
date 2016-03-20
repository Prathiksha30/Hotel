<?php 
	session_start();
	$totalItems = [];
	$totalItems = $_POST['totalItems'];
	$totalItems = implode(",", $totalItems);
	//$totalItems = "z";
	$_SESSION['totalItems'] = $totalItems;
	echo $_SESSION['totalItems'];
?>