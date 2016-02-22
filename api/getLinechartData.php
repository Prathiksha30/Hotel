<?php
session_start();
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

function getCheckinDate()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT checkin FROM user_guest WHERE user_id=1")) 
        {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($checkindate);
            $stmt->fetch();
            $stmt->close();
            return $checkindate;
        }
   else {
      printf("Error message: %s\n", $conn->error);
    }
}
    $date=getCheckinDate();
    $dates = array();
    $checkin = date('d-m-Y', strtotime($date));
    array_push($dates, $checkin);
    $today_Date=date('d-m-Y', time());
// echo 'Check In : '.$checkin;
// echo 'Today : '.$today_Date;
    // $breakPoint = 100;
    while (strtotime($checkin) < strtotime($today_Date) ) 
    {
        $checkin = date('d-m-Y', strtotime("+1 day", strtotime($checkin)));
        // $breakPoint--;
        array_push($dates, $checkin);
    }
    print_r($dates);
function getcount()
{
  global $conn;
  if ($stmt = $conn->prepare("SELECT count(*),created_at FROM `feeds` WHERE 1 group by DATE_FORMAT(created_at,'%d%') order by created_at ASC")) 
        {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($count, $createdatdate);
            // $colors = ['#ff0000','#ff4000','#ff8000','#ffbf00','#ffff00','#bfff00','#80ff00','#40ff00','#00ff00']; 
            //to set different colors for different items
            // $i = 0;
            // -----------------------------------------------------------
            while ($stmt->fetch()) {
                  // $pie_chart_data[] = array('value' => $count, 'label' => $createdatdate, 'color'=>$colors[$i],'hightlight'=>$colors[$i+1]);
                $line_chart_data[] = array('value' => $count, 'label' => $createdatdate);
                // $i++;
                }
            $stmt->close();
            //echo json_encode($line_chart_data);
         
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }  

        print_r($line_chart_data);
}
echo "<br>";
echo "<br>";

getcount();

$i = 0;
while(sizeof($dates) >= $i){
   
     echo 'Comparing : '.$dates[$i].'='.$line_chart_data[$i][1];
      echo "<br>";
      // if($dates[$i] == $line_chart_data[$i][1]){
      //    echo $dates[$i]; 
      //    echo "<br>";
      // }
         $i++;
}



?>