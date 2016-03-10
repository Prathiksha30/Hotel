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
    $userid=$_SESSION['user_id'];
  if ($stmt = $conn->prepare("SELECT checkin FROM user_guest WHERE user_id=$userid")) 
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
// echo 'Check In : '.$checkin;
// echo 'dates';
// print_r($dates);
function getcount()
{
  global $conn;
   $userid=$_SESSION['user_id'];
  if ($stmt = $conn->prepare("SELECT count(created_at),created_at FROM `feed_user` f_u LEFT JOIN `feeds` f ON f_u.f_id=f.feed_id WHERE f_u.u_id=$userid GROUP BY DATE_FORMAT(created_at,'%d%') ORDER BY created_at ASC")) 
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
            // echo json_encode($line_chart_data);
            return $line_chart_data;
         
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }  

        // print_r($line_chart_data[1]['label']);
}

// getcount();
$xaxis = array();
$line_chart_data = getcount();
// echo "line chart:";
// print_r($line_chart_data);
foreach ($dates as $key => $date)
{
  // echo "</br> first foreach key value:".$key."date:".$date;
  foreach ($line_chart_data as $chart_date)
  {
    // echo "</br> second foreach line_chart_data =".$chart_date['label'];
    if (date('d-m-Y', strtotime($chart_date['label'])) == $date)
    {
      // echo "</br>";
      // echo '</br> comparing:'.date('d-m-Y',strtotime($chart_date['label']))."and".$date;
      array_push($xaxis, $chart_date['value']);
      // echo "</br>".$chart_date['value']."got pushed at".$key."index";
    }
    if (!isset($xaxis[$key]))
    {
      // echo "0 got pushed at".$key." index";
      array_push($xaxis, 0);
    }
  }
}
// echo json_encode($xaxis);
// $dataset=array();
// $dataset['label'] = "feeds";
// $dataset['fillColor'] = "rgba(220,220,220,0.2)";
// $dataset['strokeColor'] = "rgba(220,220,220,1)";
// $dataset['pointColor'] = "rgba(220,220,220,1)";
// $dataset['pointStrokeColor'] = "#fff",
// $dataset['pointHighlightFill'] = "#fff",
// $dataset['pointHighlightStroke'] = "rgba(220,220,220,1)",
// $dataset['data'] = $xaxis,

// $dataset= array("Feeds","rgba(220,220,220,0.2)","rgba(220,220,220,1)","rgba(220,220,220,1)","#fff", "#fff","rgba(220,220,220,1)");
// array_push($dataset, $xaxis);
// echo json_encode($dataset);
// echo json_encode($dates);
$data=array();
//array_push($data, $dates);
//array_push($data, $dataset);

$data['labels'] = $dates;
$data['datasets'][0]['label'] = "feeds";
$data['datasets'][0]['fillColor'] = "rgba(220,220,220,0.2)";
$data['datasets'][0]['strokeColor'] = "rgba(220,220,220,1)";
$data['datasets'][0]['pointColor'] = "rgba(220,220,220,1)";
$data['datasets'][0]['pointStrokeColor'] = "#00ffff";
$data['datasets'][0]['pointHighlightFill'] = "#00ff80";
$data['datasets'][0]['pointHighlightStroke'] = "rgba(220,220,220,1)";
$data['datasets'][0]['data'] = $xaxis;


echo json_encode($data);

?>