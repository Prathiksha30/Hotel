<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
function getGuestArray()
{
	global $conn;
	$guests=array();
  	if ($stmt = $conn->prepare("SELECT user_id FROM user_guest WHERE 1")) 
    {
        $stmt->execute();
        $stmt->bind_result($user_id);
        while ($stmt->fetch()) {
         array_push($guests,"user ID =".$user_id);
        }
        $stmt->close();
        return $guests;
    }
   else 
   {
      printf("Error message: %s\n", $conn->error);
    }
}
function getNoOfVisitsCount()
{
	global $conn;
	$rows = [];
  	if ($stmt = $conn->prepare("SELECT numberOfVisits FROM user_guest WHERE 1")) 
    {
        $stmt->execute();
        $stmt->bind_result($numberOfVisits);
        while ($stmt->fetch()) {
          array_push($rows, $numberOfVisits);
        }
        $stmt->close();
        return $rows;
    }
   else 
   {
      printf("Error message: %s\n", $conn->error);
    }
}
$guests=getGuestArray();
$noofvisits=getNoOfVisitsCount();
$data=array();
$data['labels'] = $guests;
$data['datasets'][0]['label'] = "Number Of Visits";
$data['datasets'][0]['fillColor'] = "rgba(51, 255, 214,0.5)";
$data['datasets'][0]['strokeColor'] = "rgba(0, 255, 204,1)";
$data['datasets'][0]['pointColor'] = "rgba(220,220,220,1)";
$data['datasets'][0]['pointStrokeColor'] = "#00ffff";
$data['datasets'][0]['pointHighlightFill'] = "#00ff80";
$data['datasets'][0]['pointHighlightStroke'] = "rgba(220,220,220,1)";
$data['datasets'][0]['data'] = $noofvisits;
echo json_encode($data);



 