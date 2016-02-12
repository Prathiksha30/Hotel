<?php 
	include('header.php'); 
	//session_start();
	include('hoteldb.php');
?>

<br><br><br><br>
<section id="main-content">
<div class="col-lg-12">
	<ol class="breadcrumb">
		<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
		<li><i class="icon_document_alt"></i>Service Requests</a></li>
	<!-- 	<li><i class="fa fa-files-o"></i>Spa facilities</li> -->
	</ol>
</div>
<div class="row">
<!-- <div class="col-lg-1"></div> -->
                <div class="col-lg-8">
                      <!--Project Activity start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                            <div class="row">
                              <div class="col-lg-8 task-progress pull-left">
                                  <h1>Service Requests</h1>
                              </div>
                            </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                              <th><center>Room Number</center></th>
                              <th><center>Name</center></th>
                              <th><center>Request</center></th>
                              <th><center>Time of Request</center></th>
                              <?php 
                               if (!is_null(getPendingServices('pending'))) {
                              foreach (getPendingServices('pending') as $pendingServices):
                              ?>
                          <tr>
                                <td>
                                <?php 
                                   echo $pendingServices['service_id'];

                                  ?>
                                  </td>
                              </tr>
                          <?php endforeach; }?>
                       		  </tbody>
                          </table>
                      </section>
                </div>
</div>
</section>
</html>

<?php 
function getUserDetails($user_id)
{
	global $conn;
	if($stmt = $conn->prepare("SELECT name, room_no from user_guest WHERE user_id= $user_id"))
	{
		$stmt->execute();
		$stmt->bind_result($name, $room_no);
		while ($stmt->fetch()) {
			$rows[] = array('name' => $name , 'room_no' => $room_no );
		}
		$stmt->close();
		return $rows; 
	}
	else {
        printf("Error message: %s\n", $conn->error);
    }
}
function getPendingServices($status)
{
	global $conn;
	if($stmt = $conn->prepare("SELECT * FROM user_services WHERE status= ?"))
	{
		$stmt->bind_param("s", $status);
		$stmt->execute();
		$stmt->bind_result($service_id, $dept_id, $user_id, $room_no, $status, $message, $request_time);
		while ($stmt->fetch) {
			$rows[] = array('service_id' => $service_id, 'dept_id' => $dept_id, 'user_id' => $user_id, 'room_no' => $room_no, 'status' => $status, 'message' => $message, 'request_time' => $request_time );
		}
		$stmt->close();
		/*print_r($rows);*/
		return $rows;
	}
	else {
        printf("Error message: %s\n", $conn->error);
    }
	// if($stmt = $conn->prepare("SELECT service_id FROM user_services WHERE status= ?"))
	// {
	// 	$stmt->bind_param("s", $status);
	// 	$stmt->execute();
	//     $stmt->store_result();
	//     $stmt->bind_result($service_id);
	//     $stmt->fetch();
	//     $stmt->close();
	//     return $service_id;
	// }
	// else {
 //        printf("Error message: %s\n", $conn->error);
 //    }

}
function getCompletedServices()
{
	global $conn;
	if($stmt = $conn->prepare("SELECT * FROM user_services WHERE status= 'completed' "))
	{
		$stmt->execute();
		$stmt->bind_result($service_id, $dept_id, $user_id, $room_no, $status, $message, $request_time);
		while ($stmt->fetch) {
			$rows[] = array('service_id' => $service_id, 'dept_id' => $dept_id, 'user_id' => $user_id, 'room_no' => $room_no, 'status' => $status, 'message' => $message, 'request_time' => $request_time );
		}
		$stmt->close();
		return $rows;
	}
	else {
        printf("Error message: %s\n", $conn->error);
    }
}

?>
