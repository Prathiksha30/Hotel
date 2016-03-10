<?php
include('hoteldb.php');
/*adding new event*/

?>
<?php
global $conn;
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
/*$start = "23-09-2016";
$end = "05-09-2016";
$title = "sdfndkj";*/
if($stmt = $conn->prepare("INSERT INTO event(title, startDate, endDate) VALUES(?, ?, ?)"))
{
	$stmt->bind_param('sss', $title, $start, $end);
	$stmt->execute();
	$stmt->close();
}
?>
