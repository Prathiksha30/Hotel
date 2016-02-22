<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//

global $conn;	
  if ($stmt = $conn->prepare("SELECT `bill_item`,`amount` FROM `bill` WHERE user_id=1")) 
      	{
	        // $stmt->bind_param("s",$_SESSION['user_id']);
	      	$stmt->execute();
		    $stmt->bind_result($bill_item, $amount);
            
            // -----------------------------------------------------------
            /*
            OKK!! we also need colors for each item and we're not storing
            colors in DB, therefore we pick it we just hard it here. :D 
            */            
            $colors = ['#ffff00','#bfff00','#80ff00','#40ff00','#00ff00']; 
            //to set different colors for different items
            $i = 0;
            // -----------------------------------------------------------
      
		    while ($stmt->fetch()) {
		          $pie_chart_data[] = array('value' => $amount, 'label' => $bill_item, 'color'=>$colors[$i],'hightlight'=>$colors[$i+1]);
                $i++;
                
		        }
		    $stmt->close();
		    echo json_encode($pie_chart_data);
		 
		}
		else 
		{
		        printf("Error message: %s\n", $conn->error);
    	}
  	

?>