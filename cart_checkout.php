<?php 
	include('hoteldb.php');
	session_start();
	$totalAmount = $_GET['totalAmount'];
	$totalItems = $_GET['totalItems'];
	//Have to implode to make it csv
	
	$totalItems = implode(",", $totalItems);
	// if (isset($_GET['aa']))
	// 	echo "True";
	// else
	// 	echo "??";

	global $conn;
	//need dpt_id, rest session
	if ($stmt = $conn->prepare("INSERT INTO user_services(dept_id, user_id, room_no, status, message) VALUES ('2', ?, ?, 'pending', ?)")) 
  	{
    	$stmt->bind_param("iis", $_SESSION['user_id'], $_SESSION['room_no'], $totalItems);
    	$stmt->execute();
  	}
	//need dpt_id, rest session
	if ($stmt = $conn->prepare("UPDATE bill SET amount=amount+$totalAmount WHERE bill_item='Restaurant' AND user_id=?")) 
  	{
  		$stmt->bind_param("i", $_SESSION['user_id']);
    	$stmt->execute();
  	}
  	echo  $totalItems;
?>