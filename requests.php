<?php 
	include('header.php'); 
	session_start();
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
                <div class="col-lg-12">
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
                               <?php /*if (!is_null(getPendingServices('pending'))) {*/
                              foreach (getPendingServices('pending') as $pendingServices): ?>
                              <tr>
                              <td>   <?php 
                                   echo $pendingServices['room_no'];
                                   ?> 
                              </td>
                              <td>  <?php 
                              
                                   echo getUserDetails($pendingServices['user_id']);
                                   ?>
                              </td>
                              <td>   <?php 
                                   echo $pendingServices['message'];
                                   ?> 
                              </td>
                              <td>   <?php 
                                   echo $pendingServices['request_time'];
                                   ?> 
                              </td>
                              <td>
                              <form action="" method="POST">
                              <div class="btn-group">
                                <input type="hidden" name="completedServiceID" value="<?php echo $pendingServices['service_id'];?>">
                                <input type="submit" name="competeService" value="Completed" class="btn btn-primary ">
                              </div>
                              </form>
                              </td>             
                              </tr>
                          <?php endforeach;  ?>
                       		  </tbody>
                       		  
                          </table>
                        
                      </section>

                </div>
  </div>
               
                
</div>
</section>
</html>

<?php 
if(isset($_POST['competeService']))
{
  updateServiceStatusToComplete($_POST['completedServiceID']);
  ?>
  <script>
  window.location.href = "requests.php"
  </script>
  <?php
}
function updateServiceStatusToComplete($service_id)
{
  global $conn;
  if($stmt = $conn->prepare("UPDATE `user_services` SET status='completed',delivery_time=now() WHERE service_id=?"))
    {
      $stmt->bind_param("i", $service_id);
      $stmt->execute();
    }
    else
    {
      printf("Error message: %s\n", $conn->error);
    }

}

function getUserDetails($user_id)
{
	global $conn;
	if($stmt = $conn->prepare("SELECT name from user_guest WHERE user_id= $user_id"))
	{
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($name);
		$stmt->fetch();
		$stmt->close();
		return $name;
	}
	else {
        printf("Error message: %s\n", $conn->error);
    }
}
/* THIS IS NOT WORKING !*/
function getPendingServices($status)
{
	global $conn;
	if($stmt = $conn->prepare("SELECT * FROM user_services WHERE status= ? and dept_id=?"))
	{
 
		$stmt->bind_param("si", $status,$_SESSION['Dept_id']);
		$stmt->execute();
		$stmt->bind_result($service_id, $dept_id, $user_id, $room_no, $status, $message, $request_time, $delivery_time);
		while ($stmt->fetch()) {
			$rows[] = array('service_id' => $service_id, 'dept_id' => $dept_id, 'user_id' => $user_id, 'room_no' => $room_no, 'status' => $status, 'message' => $message, 'request_time' => $request_time,'delivery_time' => $delivery_time );
		}
		$stmt->close();
		/*print_r($rows);*/
		return $rows;
	}
	else {
        printf("Error message: %s\n", $conn->error);
    }
}
// function getCompletedServices()
// {
// 	global $conn;
// 	if($stmt = $conn->prepare("SELECT * FROM user_services WHERE status= 'completed' "))
// 	{
// 		$stmt->execute();
// 		$stmt->bind_result($service_id, $dept_id, $user_id, $room_no, $status, $message, $request_time,$delivery_time);
// 		while ($stmt->fetch()) {
// 			$rows[] = array('service_id' => $service_id, 'dept_id' => $dept_id, 'user_id' => $user_id, 'room_no' => $room_no, 'status' => $status, 'message' => $message, 'request_time' => $request_time, 'delivery_time'=>$delivery_time);
// 		}
// 		$stmt->close();
// 		return $rows;
// 	}
// 	else {
//         printf("Error message: %s\n", $conn->error);
//     }
// }
function getRoomNumber()
	{
		global $conn;
		if($stmt = $conn->prepare("SELECT room_no FROM user_services WHERE status = 'pending'"))
		{
			//$stmt->bind_result('i',$user_id);
			$stmt->execute();
		    $stmt->store_result();
		    $stmt->bind_result($room_no);
		    $stmt->fetch();
		    $stmt->close();
		    return $room_no;
		}
		else{
			echo "Error with Room Number selection!";
		}

	}
	
?>
