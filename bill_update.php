
<?php 

	include('hoteldb.php');
	session_start();
	$totalAmount = $_GET['totalAmount'];
	?>
	
	<?php
	global $conn;
	//need dpt_id, rest session
	if ($stmt = $conn->prepare("UPDATE bill SET amount=amount+$totalAmount WHERE bill_item='Restaurant' AND user_id=$_SESSION['user_id'] ")) 
  	{
    	$stmt->execute();
  	}
?>