<?php 
	include('hoteldb.php');
	session_start();
	$totalAmount = $_GET['totalAmount'];
	$totalItems = $_GET['totalItems'];
	//Have to implode to make it csv
	
	$totalItems = implode(",", $totalItems);
/*	if (isset($_GET['aa']))
		echo "True";
	else
		echo "??";
	echo  $totalItems;*/
	global $conn;
	//need dpt_id, rest session
	if ($stmt = $conn->prepare("INSERT INTO user_services (dept_id, user_id, room_no, status, message) VALUES ('2','1','101','pending',?)")) 
  	{
    	$stmt->bind_param("s",$totalItems);
    	$stmt->execute();
  	}
?>