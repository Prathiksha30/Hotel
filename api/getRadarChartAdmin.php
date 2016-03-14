<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";
session_start();

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function getCountofServicesCompletedInJanuary()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=01 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countinjan);
            while ($stmt->fetch()) {  
                  $row[] = array('countinjan' => $countinjan);
                }
            $stmt->close();
            // print_r($row);
            return $row;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountofServicesCompletedInFebruary()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=02 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countinfeb);
            while ($stmt->fetch()) {  
                  $row[] = array('countinfeb' => $countinfeb);                
                }
            $stmt->close();
            return $row;
             // print_r($row);
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountofServicesCompletedInMarch()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=03 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countinmar);
            while ($stmt->fetch()) {  
                  $row[] = array('countinmar' => $countinmar);                
                }
            $stmt->close();
            return $row;
             // print_r($row);
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountofServicesCompletedInApril()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=04 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countinapr);
            while ($stmt->fetch()) {  
                  $row[] = array('countinapr' => $countinapr);                
                }
            $stmt->close();
            return $row;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountofServicesCompletedInMay()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=05 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countinmay);
            while ($stmt->fetch()) {  
                  $row[] = array('countinmay' => $countinmay);                
                }
            $stmt->close();
            return $row;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountofServicesCompletedInJune()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=06 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countinjun);
            while ($stmt->fetch()) {  
                  $row[] = array('countinjun' => $countinjun);                
                }
            $stmt->close();
            return $row;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountofServicesCompletedInJuly()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=07 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countinjul);
            while ($stmt->fetch()) {  
                  $row[] = array('countinjul' => $countinjul);                
                }
            $stmt->close();
            return $row;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountofServicesCompletedInAugust()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=08 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countinaug);
            while ($stmt->fetch()) {  
                  $row[] = array('countinaug' => $countinaug);                
                }
            $stmt->close();
            return $row;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountofServicesCompletedInSeptember()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=09 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countinsep);
            while ($stmt->fetch()) {
                  $row[] = array('countinsep' => $countinsep);                
                }
            $stmt->close();
            return $row;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountofServicesCompletedInOctober()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=10 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countinoct);
            while ($stmt->fetch()) {  
                  $row[] = array('countinoct' => $countinoct);                
                }
            $stmt->close();
            return $row;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountofServicesCompletedInNovember()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=11 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countinnov);
            while ($stmt->fetch()) {  
                  $row[] = array('countinnov' => $countinnov);                
                }
            $stmt->close();
            return $row;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountofServicesCompletedInDecember()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=12 GROUP BY `dept_id` ORDER BY dept_id ")) 
        {
            $stmt->execute();
            $stmt->bind_result($countindec);
            while ($stmt->fetch()) {  
                  $row[] = array('countindec' => $countindec);                
                }
            $stmt->close();
            return $row;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
$countofjan=array();
$countoffeb=array();
$countofmar=array();
$countofapr=array();
$countofmay=array();
$countofjun=array();
$countofjul=array();
$countofaug=array();
$countofsep=array();
$countofoct=array();
$countofnov=array();
$countofdec=array();
$countofjan=getCountofServicesCompletedInJanuary();
$countoffeb=getCountofServicesCompletedInFebruary();
$countofmar=getCountofServicesCompletedInMarch();
$countofapr=getCountofServicesCompletedInApril();
$countofmay=getCountofServicesCompletedInMay();
$countofjun=getCountofServicesCompletedInJune();
$countofjul=getCountofServicesCompletedInJuly();
$countofaug=getCountofServicesCompletedInAugust();
$countofsep=getCountofServicesCompletedInSeptember();
$countofoct=getCountofServicesCompletedInOctober();
$countofnov=getCountofServicesCompletedInNovember();
$countofdec=getCountofServicesCompletedInDecember();

$roomservice_count=array();
array_push($roomservice_count,$countofjan[0]['countinjan']);
array_push($roomservice_count,$countoffeb[0]['countinfeb']);
array_push($roomservice_count,$countofmar[0]['countinmar']);
array_push($roomservice_count,$countofapr[0]['countinapr']);
array_push($roomservice_count,$countofmay[0]['countinmay']);
array_push($roomservice_count,$countofjun[0]['countinjun']);
array_push($roomservice_count,$countofjul[0]['countinjul']);
array_push($roomservice_count,$countofaug[0]['countinaug']);
array_push($roomservice_count,$countofsep[0]['countinsep']);
array_push($roomservice_count,$countofoct[0]['countinoct']);
array_push($roomservice_count,$countofnov[0]['countinnov']);
array_push($roomservice_count,$countofdec[0]['countindec']);
// print_r($roomservice_count);s
$restaurant_count=array();
array_push($restaurant_count,$countofjan[1]['countinjan']);
array_push($restaurant_count,$countoffeb[1]['countinfeb']);
array_push($restaurant_count,$countofmar[1]['countinmar']);
array_push($restaurant_count,$countofapr[1]['countinapr']);
array_push($restaurant_count,$countofmay[1]['countinmay']);
array_push($restaurant_count,$countofjun[1]['countinjun']);
array_push($restaurant_count,$countofjul[1]['countinjul']);
array_push($restaurant_count,$countofaug[1]['countinaug']);
array_push($restaurant_count,$countofsep[1]['countinsep']);
array_push($restaurant_count,$countofoct[1]['countinoct']);
array_push($restaurant_count,$countofnov[1]['countinnov']);
array_push($restaurant_count,$countofdec[1]['countindec']);
// print_r($restaurant_count);
$spa_count=array();
array_push($spa_count,$countofjan[2]['countinjan']);
array_push($spa_count,$countoffeb[2]['countinfeb']);
array_push($spa_count,$countofmar[2]['countinmar']);
array_push($spa_count,$countofapr[2]['countinapr']);
array_push($spa_count,$countofmay[2]['countinmay']);
array_push($spa_count,$countofjun[2]['countinjun']);
array_push($spa_count,$countofjul[2]['countinjul']);
array_push($spa_count,$countofaug[2]['countinaug']);
array_push($spa_count,$countofsep[2]['countinsep']);
array_push($spa_count,$countofoct[2]['countinoct']);
array_push($spa_count,$countofnov[2]['countinnov']);
array_push($spa_count,$countofdec[2]['countindec']);
// print_r($spa_count);
$data=array();
$data['labels'] = ["January","February","March", "April", "May", "June", "July", "August", "September", "October", "November", "Descember"];
$data['datasets'][0]['label'] = "Radar Chart Room service";
// $data['datasets'][0]['fillColor'] = "rgba(220,220,220,0.2)";
$data['datasets'][0]['fillColor'] = "rgba(51, 214, 255,0.5)";
$data['datasets'][0]['strokeColor'] = "rgba(0, 204, 255,1)"; /*"rgba(220,220,220,1)";*/
// $data['datasets'][0]['pointColor'] = "rgba(220,220,220,1)";
$data['datasets'][0]['pointColor'] = "rgba(0, 0, 153,1)";
$data['datasets'][0]['pointStrokeColor'] = "#00ffff";
$data['datasets'][0]['pointHighlightFill'] = "#00ff80";
$data['datasets'][0]['pointHighlightStroke'] = "rgba(220,220,220,1)";
$data['datasets'][0]['data'] = $roomservice_count;
$data['datasets'][1]['label'] = "Radar Chart Restaurant and Bar";
$data['datasets'][1]['fillColor'] = "rgba(102, 255, 153,0.5)"; 
$data['datasets'][1]['strokeColor'] = "rgba(26, 255, 102,1)";
$data['datasets'][1]['pointColor'] = "rgba(0, 153, 51,1)";
$data['datasets'][1]['pointStrokeColor'] = "#00ffff";
$data['datasets'][1]['pointHighlightFill'] = "#00ff80";
$data['datasets'][1]['pointHighlightStroke'] = "rgba(220,220,220,1)";
$data['datasets'][1]['data'] = $restaurant_count;
$data['datasets'][2]['label'] = "Radar Chart Spa";
$data['datasets'][2]['fillColor'] = "rgba(255, 255, 102,0.5)";
$data['datasets'][2]['strokeColor'] = "rgba(255, 255, 0,1)";
$data['datasets'][2]['pointColor'] = "rgba(255, 221, 153,1)";
$data['datasets'][2]['pointStrokeColor'] = "#00ffff";
$data['datasets'][2]['pointHighlightFill'] = "#00ff80";
$data['datasets'][2]['pointHighlightStroke'] = "rgba(220,220,220,1)";
$data['datasets'][2]['data'] = $spa_count;
echo json_encode($data);



// print_r($countoffeb);
// var data = {
//     labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
//     datasets: [
//         {
//             label: "My First dataset",
//             fillColor: "rgba(220,220,220,0.2)",
//             strokeColor: "rgba(220,220,220,1)",
//             pointColor: "rgba(220,220,220,1)",
//             pointStrokeColor: "#fff",
//             pointHighlightFill: "#fff",
//             pointHighlightStroke: "rgba(220,220,220,1)",
//             data: [65, 59, 90, 81, 56, 55, 40]
//         },
//         {
//             label: "My Second dataset",
//             fillColor: "rgba(151,187,205,0.2)",
//             strokeColor: "rgba(151,187,205,1)",
//             pointColor: "rgba(151,187,205,1)",
//             pointStrokeColor: "#fff",
//             pointHighlightFill: "#fff",
//             pointHighlightStroke: "rgba(151,187,205,1)",
//             data: [28, 48, 40, 19, 96, 27, 100]
//         }
//     ]
// };
?>
