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
function getCountJanuary($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=01 AND dept_id=$dept_id")) 
        {
            $stmt->execute();
          $stmt->store_result();
          $stmt->bind_result($value);
          $stmt->fetch();
          $stmt->close();
          return $value;
        }
        else 
        {
          printf("Error message: %s\n", $conn->error);
        }
}
function getCountFebruary($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=02 AND dept_id=$dept_id")) 
        {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($value);
            $stmt->fetch();
            $stmt->close();
            return $value;
        }
        else 
        {
            printf("Error message: %s\n", $conn->error);
        }
}
function getCountMarch($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=03 AND dept_id=$dept_id")) 
        {
            $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
        }
        else 
        {
             printf("Error message: %s\n", $conn->error);
        }
}
function getCountApril($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=04 AND dept_id=$dept_id")) 
        {
            $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountMay($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=05 AND dept_id=$dept_id")) 
        {
            $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountJune($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=06 AND dept_id=$dept_id")) 
        {
            $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountJuly($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=07 AND dept_id=$dept_id")) 
        {
            $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountAugust($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=08 AND dept_id=$dept_id")) 
        {
            $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountSeptember($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=09 AND dept_id=$dept_id ")) 
        {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($value);
            $stmt->fetch();
            $stmt->close();
            return $value;
        }
        else 
        {
            printf("Error message: %s\n", $conn->error);
        }
}
function getCountOctober($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=10 AND dept_id=$dept_id")) 
        {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($value);
            $stmt->fetch();
            $stmt->close();
            return $value;
        }
        else 
        {
            printf("Error message: %s\n", $conn->error);
        }
}
function getCountNovember($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=11 AND dept_id=$dept_id")) 
        {
           $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
}
function getCountDecember($dept_id)
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE MONTH(delivery_time)=12 AND dept_id=$dept_id ")) 
        {
            $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
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
$countofjan=getCountJanuary($_SESSION['Dept_id']);
$countoffeb=getCountFebruary($_SESSION['Dept_id']);
$countofmar=getCountMarch($_SESSION['Dept_id']);
$countofapr=getCountApril($_SESSION['Dept_id']);
$countofmay=getCountMay($_SESSION['Dept_id']);
$countofjun=getCountJune($_SESSION['Dept_id']);
$countofjul=getCountJuly($_SESSION['Dept_id']);
$countofaug=getCountAugust($_SESSION['Dept_id']);
$countofsep=getCountSeptember($_SESSION['Dept_id']);
$countofoct=getCountOctober($_SESSION['Dept_id']);
$countofnov=getCountNovember($_SESSION['Dept_id']);
$countofdec=getCountDecember($_SESSION['Dept_id']);
$xaxis=array();
array_push($xaxis,$countofjan);
array_push($xaxis,$countoffeb);
array_push($xaxis,$countofmar);
array_push($xaxis,$countofapr);
array_push($xaxis,$countofmar);
array_push($xaxis,$countofjun);
array_push($xaxis,$countofjul);
array_push($xaxis,$countofaug);
array_push($xaxis,$countofsep);
array_push($xaxis,$countofoct);
array_push($xaxis,$countofnov);
array_push($xaxis,$countofdec);
// print_r($xaxis);
$data=array();


$data['labels'] = ["January","February","March", "April", "May", "June", "July", "August", "September", "October", "November", "Descember"];
$data['datasets'][0]['label'] = "Services Completed";
$data['datasets'][0]['fillColor'] = "rgba(51, 255, 214,0.5)";
$data['datasets'][0]['strokeColor'] = "rgba(0, 255, 204,1)";
$data['datasets'][0]['pointColor'] = "rgba(220,220,220,1)";
$data['datasets'][0]['pointStrokeColor'] = "#00ffff";
$data['datasets'][0]['pointHighlightFill'] = "#00ff80";
$data['datasets'][0]['pointHighlightStroke'] = "rgba(220,220,220,1)";
$data['datasets'][0]['data'] = $xaxis;


echo json_encode($data);

?>