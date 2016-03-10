<?php
include('hoteldb.php');
global $conn;
if($stmt = $conn->prepare("SELECT event_id, title, startDate, endDate FROM event"))
{
	$events = array();
	$stmt->execute();
	$stmt->bind_result($event_id, $title, $startDate, $endDate);
	while ($stmt->fetch()) 
			{
				$rows = array('event_id' => $event_id, 'title' => $title, 'startDate' => $startDate, 'endDate' => $endDate);
			
	//$stmt->close();
	/* echo json_encode($rows); */
	$e = array(); // need to store array under different field names
	$e['id'] = $rows['event_id'];
	$e['title'] = $rows['title'];
	$e['start'] = $rows['startDate'];
	$e['end'] = $rows['endDate'];
	array_push(($events), $e);
}
} 
echo json_encode($events);
?>