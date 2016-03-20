<?php 
	include('hoteldb.php');
	session_start();
	$totalAmount = $_GET['totalAmount'];
	$totalItems = $_GET['totalItems'];
	$totalItems = implode(",", $totalItems);
	$message=$totalItems."-".$totalAmount;
	global $conn;
	if ($totalItems!=NULL)
	{
		if ($stmt = $conn->prepare("INSERT INTO user_services(dept_id, user_id, room_no, status, message) VALUES (2, ?, ?, 'pending', ?)")) 
	  	{
	    	$stmt->bind_param("iis", $_SESSION['user_id'], $_SESSION['roomno'], $message);
	    	$stmt->execute();
	    	$stmt->close();
	  	}
	//need dpt_id, rest session
	if ($stmt = $conn->prepare("UPDATE bill SET amount=amount+$totalAmount WHERE bill_item='Restaurant' AND user_id=?")) 
	  	{	
	  		$stmt->bind_param("i", $_SESSION['user_id']);
	    	$stmt->execute();
	    	$stmt->close();
	  	}
  	//echo $_SESSION['totalItems'];
  		echo $totalItems;

	}
	
?>