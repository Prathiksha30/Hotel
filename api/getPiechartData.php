<?php
include('../hoteldb.php'); 
global $conn;	
  if ($stmt = $conn->prepare("SELECT `bill_item`,`amount` FROM `bill` WHERE user_id=1")) 
      	{
	        // $stmt->bind_param("s",$_SESSION['user_id']);
	      	$stmt->execute();
		    $stmt->bind_result($bill_item, $amount);
		    while ($stmt->fetch()) {
		          $pie_chart_data[] = array('label' => $bill_item, 'value' => $amount);
		        }
		    $stmt->close();
		    $pie_chart_data=json_encode($pie_chart_data);
		    print_r($pie_chart_data);
		    return $pie_chart_data;
		}
		else 
		{
		        printf("Error message: %s\n", $conn->error);
    	}
  	?>