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
               
                	 <a data-toggle="modal" href="#myModal" title="Click to view the number of services completed!">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box dark-bg">
                        <i class="fa fa-thumbs-o-up"></i>
                        
                    <div class="count"> </div>

                        <div class="title">Completed</div>
                    </div><!--/.info-box-->
                </div><!--/.col-->
                </a>
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modaltitleP">Details</h4>
                          </div>
                          <div class="modalbodyP">
                            <table>
                                    <th style="padding:5px;"> Room Number </th>
                                    <th style="padding:5px;"> Service </th>
                              		<th style="padding:5px;"> Request Date & Time </th>
                                  <th style="padding:5px;"> Delivery Date & Time </th>
                              <?php  foreach (getCompletedServices() as $completedServices):
                              ?>
                              
                                    <tr>
                                    <td style="padding:5px;">
                                    <?php echo "".$completedServices['room_no'];?>
                                    </td>                                    
                                    <td style="padding:5px;">
                                    <?php echo "".$completedServices['message'];?>
                                    </td>
                                    <td style="padding:5px;">
                                   <?php echo "".$completedServices['request_time'];?>
                                    </td>
                                    <td style="padding:5px;">
                                   <?php echo "".$completedServices['delivery_time'];?>
                                    </td>      
                                    </tr>                                 
                                <?php  endforeach;
                              ?>
                            </table>
                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                              <!-- <button class="btn btn-success" type="button">Save changes</button> -->
                          </div>
                      </div>
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
function getCompletedServices()
{
	global $conn;
	if($stmt = $conn->prepare("SELECT * FROM user_services WHERE status= 'completed' "))
	{
		$stmt->execute();
		$stmt->bind_result($service_id, $dept_id, $user_id, $room_no, $status, $message, $request_time,$delivery_time);
		while ($stmt->fetch()) {
			$rows[] = array('service_id' => $service_id, 'dept_id' => $dept_id, 'user_id' => $user_id, 'room_no' => $room_no, 'status' => $status, 'message' => $message, 'request_time' => $request_time, 'delivery_time'=>$delivery_time);
		}
		$stmt->close();
		return $rows;
	}
	else {
        printf("Error message: %s\n", $conn->error);
    }
}
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
