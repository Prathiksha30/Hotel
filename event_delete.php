<?php
include('hoteldb.php');
?>
<?php
global $conn;
$id = $_POST['id'];
if($stmt = $conn->prepare("DELETE FROM event WHERE event_id = ?"))
{
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->close();
}
?>
