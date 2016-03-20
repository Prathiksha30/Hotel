<?php
 	include('header.php'); 
	session_start();
	include('hoteldb.php');
if(isset($_POST['competeService']))
{
  updateServiceStatusToComplete($_POST['completedServiceID']);
  ?>
  <script>
  window.location.href = "staff_dashboard.php"
  </script>
  <?php
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
// function getPendingServices($status)
// {
// 	global $conn;
// 	if($stmt = $conn->prepare("SELECT * FROM user_services WHERE status= ? and dept_id=?"))
// 	{
 
// 		$stmt->bind_param("si", $status,$_SESSION['Dept_id']);
// 		$stmt->execute();
// 		$stmt->bind_result($service_id, $dept_id, $user_id, $room_no, $status, $message, $request_time, $delivery_time);
// 		while ($stmt->fetch()) {
// 			$rows[] = array('service_id' => $service_id, 'dept_id' => $dept_id, 'user_id' => $user_id, 'room_no' => $room_no, 'status' => $status, 'message' => $message, 'request_time' => $request_time,'delivery_time' => $delivery_time );
// 		}
// 		$stmt->close();
// 		/*print_r($rows);*/
// 		return $rows;
// 	}
// 	else {
//         printf("Error message: %s\n", $conn->error);
//     }
// }
function getServicesCompletedCount($dept_id)
{
    global $conn;
    if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE dept_id = ? AND status = 'completed'")) {
        $stmt->bind_param("i", $dept_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
    }
    else {
        printf("Error message: %s\n", $conn->error);
    }
}
function getServicesPendingCount($dept_id)
{
	global $conn;
    if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE dept_id = ? AND status = 'pending'")) {
        $stmt->bind_param("i", $dept_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
    }
    else {
        printf("Error message: %s\n", $conn->error);
    }
}
function getStaffCount($dept_id)
{
	global $conn;
	if($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_staff` WHERE dept_id = ?")) {
        $stmt->bind_param("i", $dept_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
    }
    else {
        printf("Error message: %s\n", $conn->error);
    }
}
function getDeptName($dept_id)
{
	global $conn;
	if($stmt = $conn->prepare("SELECT d_name FROM `department` WHERE d_id = ?")) {
        $stmt->bind_param("i", $dept_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();
        return $value;
    }
    else {
        printf("Error message: %s\n", $conn->error);
	}
}
function getPendingServices($dept_id)
{
	global $conn;
	if($stmt = $conn->prepare("SELECT * FROM user_services WHERE status= 'pending' AND dept_id=$dept_id"))
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
function getCompletedServices($dept_id)
{
	global $conn;
	if($stmt = $conn->prepare("SELECT * FROM user_services WHERE status= 'completed' AND dept_id=$dept_id"))
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
function getStaffDeets($dept_id)
{
	global $conn;
	if($stmt = $conn->prepare("SELECT name,email_id,profile_pic FROM user_staff WHERE dept_id=$dept_id"))
	{
		$stmt->execute();
		$stmt->bind_result($name, $email_id, $profile_pic);
		while ($stmt->fetch()) {
			$rows[] = array('name' => $name, 'email_id' => $email_id, 'profile_pic' => $profile_pic);
		}
		$stmt->close();
		return $rows;
	}
	else {
        printf("Error message: %s\n", $conn->error);
    }
}
?>
<section id="container" class="">
  <!--header start-->

  <!--main content start-->
  <section id="main-content">
      <section class="wrapper">
      <div class="row">
	      <a data-toggle="modal" href="#myModal1" title="Click to view completed services!">
	                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	                    <div class="info-box blue-bg">
	                        <i class="fa fa-thumbs-o-up"></i>
	                        	<div class="count"> <?php echo getServicesCompletedCount($_SESSION['Dept_id']); ?></div>
								<div class="title">Completed Services</div>
	                    </div><!--/.info-box-->
	                </div><!--/.col-->
	        </a>
	        <a data-toggle="modal" href="#myModal2" title="Click to view the services pending services!">
	                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	                    <div class="info-box green-bg">
	                        <i class="fa fa-thumbs-o-up"></i>
	                        	<div class="count"> <?php echo getServicesPendingCount($_SESSION['Dept_id']); ?></div>
								<div class="title">Pending Services</div>
	                    </div><!--/.info-box-->
	                </div><!--/.col-->
	        </a>
	        <a data-toggle="modal" href="#myModal3" title="Click to view staff members in your department">
	                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	                    <div class="info-box blue-bg">
	                        <i class="fa fa-thumbs-o-up"></i>
	                        	<div class="count"> <?php echo getStaffCount($_SESSION['Dept_id']); ?></div>
								<div class="title"><?php echo getDeptName($_SESSION['Dept_id']);?> Department </div>
	                    </div><!--/.info-box-->
	                </div><!--/.col-->
	        </a>
	        <div class="row">
	        <center>
	        	<div class="col-lg-6 col-md-12">	
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h2><i class="fa fa-flag-o red"></i><strong>Completed Service over 2016:</strong></h2>
						</div>
						<div class="panel-body">
						<center>
							<canvas id="myBarChart1" width="250" height="250"></canvas>
						</center>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">	
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h2><i class="fa fa-flag-o red"></i><strong>Service Requests:</strong></h2>
						</div>
						<div class="panel-body">
							 <table class="table table-hover personal-task">
	                              <tbody>
	                              <th><center>Room Number</center></th>
	                              <th><center>Name</center></th>
	                              <th><center>Request</center></th>
	                              <th><center>Time of Request</center></th>
	                               <?php /*if (!is_null(getPendingServices('pending'))) {*/
	                              foreach (getPendingServices($_SESSION['Dept_id']) as $pendingServices): ?>
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
						</div>
					</div>
				</div>
			</center>
	        </div>
                  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                              <?php  foreach (getCompletedServices($_SESSION['Dept_id']) as $completedServices):
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
              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                  <!-- <th style="padding:5px;"> Delivery Date & Time </th> -->
                              <?php  foreach (getPendingServices($_SESSION['Dept_id']) as $PendingServices): ?>
                              
                                    <tr>
                                    <td style="padding:5px;">
                                    <?php echo "".$PendingServices['room_no'];?>
                                    </td>                                    
                                    <td style="padding:5px;">
                                    <?php echo "".$PendingServices['message'];?>
                                    </td>
                                    <td style="padding:5px;">
                                   <?php echo "".$PendingServices['request_time'];?>
                                    </td>      
                                    </tr>                                 
                                <?php  endforeach; ?>
                            </table>
                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                              <!-- <button class="btn btn-success" type="button">Save changes</button> -->
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modaltitleP">Details</h4>
                          </div>
                          <div class="modalbodyP">
                            <table>
                                    <th style="padding:30px;"> Name </th>
                                    <th style="padding:30px;"> Picture </th>
                              		<th style="padding:30px;"> Email_id </th>
                                  <!-- <th style="padding:5px;"> Delivery Date & Time </th> -->
                              	<?php  foreach (getStaffDeets($_SESSION['Dept_id']) as $staffDeets):?>                            
                                    <tr>
	                                    <td style="padding:5px;">
	                                    <?php echo "".$staffDeets['name'];?>
	                                    </td>                                    
	                                    <td style="padding:5px;">
	                                    <img src="<?php echo 'StaffPhoto/'.$staffDeets['profile_pic']; ?>" alt="<?php echo "sorry";?>" width="100" height="100">
	                                    </td>
	                                    <td style="padding:5px;">
	                                   <?php echo "".$staffDeets['email_id'];?>
	                                    </td>
                                    </tr>                                 
                                <?php  endforeach;?>
                            </table>
                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                              <!-- <button class="btn btn-success" type="button">Save changes</button> -->
                          </div>
                      </div>
                  </div>
              </div>
   
      </section>
  </section>
</section>

<script>
	$.get('api/getStaffdashboardgraph.php',function(data){
		Bardata1 = jQuery.parseJSON(data);
		console.log(Bardata1);
		var ctx = document.getElementById("myBarChart1").getContext("2d");
		var myBarChart1 = new Chart(ctx).Bar(Bardata1);
	});
</script>
<script src="js/chart.js"></script>