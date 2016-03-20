<?php
 	include('header.php'); 
	session_start();
	include('hoteldb.php');
if(isset($_POST['cancelService']))
{
	$service_id = $_POST["service"];
	$msg=$_POST["msg"];
	global $conn;
	if($stmt = $conn->prepare("UPDATE user_services SET status = 'Cancelled' WHERE service_id = $service_id "))
	{
		$stmt->execute();
		$stmt->close();
	}
	if($msg == "Facial")
	{
		if($stmt = $conn->prepare("UPDATE bill SET amount=amount-500 WHERE user_id=$_SESSION[user_id] AND bill_item='Spa' "))
		{
			$stmt->execute();
			$stmt->close();
		}
	}
	else if($msg=="Massage")
 	{
     	if($stmt = $conn->prepare("UPDATE bill SET amount-amount-1000 WHERE user_id=$_SESSION[user_id] AND bill_item='Spa' "))
  	{
	    // $stmt->bind_param('isi', $_SESSION['user_id'],'spa',500);
	    $stmt->execute();
	    $stmt->close();
  	}
  else{
    echo "Error with in insertion";
  }
 }
  else if($msg=="Sauna")
 {
    if($stmt = $conn->prepare("UPDATE bill SET amount=amount-250 WHERE user_id=$_SESSION[user_id] AND bill_item='Spa' "))
  {
    // $stmt->bind_param('isi', $_SESSION['user_id'],'spa',500);
    $stmt->execute();
    $stmt->close();
  }
  else{
    echo "Error with in insertion";
  }
 }
  else if($msg=="Head Massage")
 {
     if($stmt = $conn->prepare("UPDATE bill SET amount=amount-200 WHERE user_id=$_SESSION[user_id] AND bill_item='Spa' "))
  {
    // $stmt->bind_param('isi', $_SESSION['user_id'],'spa',500);
    $stmt->execute();
    $stmt->close();
  }
  else{
    echo "Error with in insertion";
  }
 }
 else{
 	/*$foodbill =explode("-", $msg);
 	 $amt= $foodbill[0];*/
 	/* $pattern = "-";
	$amt= strstr($msg, $pattern, true);*/
	//$tok = strtok($msg, "-");
	
$tok = substr($msg, strpos($msg, '-') + 1);
 	
 	if($stmt = $conn->prepare("UPDATE bill SET amount=amount-$tok WHERE user_id=$_SESSION[user_id] AND bill_item='Restaurant'"))
 	{
 		$stmt->execute();
 		$stmt->close();
 	}
 } 
}
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
            echo $checkindate ;
        }
   else {
      printf("Error message: %s\n", $conn->error);
    }
}
function getUserServices($user_id)
{
	global $conn;
	/*$user_id=$_SESSION['user_id'];*/
	if($stmt = $conn->prepare("SELECT service_id, status, message, request_time FROM user_services WHERE user_id= $user_id"))
	{
		$stmt->execute();
		$stmt->bind_result($service_id, $status, $message, $request_time);
		while ($stmt->fetch()) 
		{
			$rows[] = array('service_id' => $service_id , 'status' => $status, 'message' => $message, 'request_time' => $request_time);
		}
		$stmt->close();
		return $rows;
	}
	else{
		echo "Error while fetching!";
	}
}
?>

<section id="container" class="">
  <!--header start-->

  <!--main content start-->
  <section id="main-content">
      <section class="wrapper">
        <div class="row">
        	<center>
        	<div class="col-lg-11 col-md-12">	
			<div class="panel panel-success panelcustom">
				<div class="panel-heading">

					<h2><i class="fa fa-flag-o red"></i><strong>Days you have stayed with us</strong></h2>
					
				</div>
				<div class="panel-body">
				<center>
					<div style="color: #ffffff;display: inline-block;font-weight: 100;text-align: center;font-size: 30px;">
					  
					  <div style="padding: 10px;border-radius: 3px;background: #00BF96;display: inline-block;">
					 Days: <span style=" padding: 15px; border-radius: 3px; background: #00816A; display: inline-block;" id="days">00</spap></br>
					 </div>
					 <div style="padding: 10px;border-radius: 3px;background: #00BF96;display: inline-block;">
					  Hours: <span style=" padding: 15px; border-radius: 3px; background: #00816A; display: inline-block;" id="hours">00</span></br>
					  </div>
					  <div style="padding: 10px;border-radius: 3px;background: #00BF96;display: inline-block;">
					  Minutes: <span style=" padding: 15px; border-radius: 3px; background: #00816A; display: inline-block;" id="minutes">00</span></br>
					  </div>
					  <div style="padding: 10px;border-radius: 3px;background: #00BF96;display: inline-block;">
					  Seconds: <span style=" padding: 15px; border-radius: 3px; background: #00816A; display: inline-block;" id="seconds">00</span></br>
					 </div>
					</div>
				</center>
				</div>
			</div>
			</div>
			</center>
        </div>
        <div class="row">
        <div class="col-lg-6 col-md-12">	
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2><i class="fa fa-flag-o red"></i><strong>Your Total Expenditure</strong></h2>
				</div>
				<div class="panel-body">
					
					<center>
					<canvas id="myPieChart" width="250" height="250"></canvas>
					</center>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12">	
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h2><i class="fa fa-flag-o red"></i><strong>Feeds Activity</strong></h2>
				</div>
				<div class="panel-body">
				<center>
					<canvas id="myLineChart" width="250" height="250"></canvas>
				</center>
				</div>
			</div>
		</div>
		</div>
		<div class="row">
			<div class="col-lg-11 ">
			<div class="panel panel-info panelcustom">
				<div class="panel-heading">
					<center><h2><i class="fa fa-flag-o red"></i><strong>Requested Services</strong></h2></center>
				</div>
				<div class="panel-body">
					<table class="table bootstrap-datable countries">
					<tr>
						<th></th> 
						<th></th> 
						<th></th>
						<th>Service</th>
						<th>Request Time</th>
						<th>Status</th>
					</tr>
					<?php 
						foreach(getUserServices($_SESSION['user_id']) as $getUserServices): 
					?>
					<tr>
					<td></td>
					<td></td>
					<td></td>
					 <td style="padding:5px;"> <?php echo "".$getUserServices['message'];?> </td>
					<td style="padding:5px;"> <?php echo "".$getUserServices['request_time'];?> </td>
					<?php 
						if($getUserServices['status'] == 'pending')
						{ ?>
					<td style="padding:5px";>
						 <form method="POST" action="">
						 	<input type="hidden" name="msg" value="<?php echo $getUserServices['message']; ?>">
                            <input type="hidden" name="service" value="<?php echo $getUserServices['service_id']; ?>"> <!-- Gets the value of that row -->
                            <input type="submit" name="cancelService"  value="Pending" data-content="Click here to cancel this service!" data-placement="right" data-trigger="hover" class="btn btn-info popovers btn-danger">
                         </form>
					 </td>		
						<?php }
						else{ 
								if($getUserServices['status'] == 'completed')
								{
							?>
						<td style="padding:5px;">Completed</span> </td> 

					<?php }
					else { ?>
								<td style="padding:5px; color:#c7cbd4;">Cancelled</span> </td> 
					<?php }
					}
						
					?>
					
					</tr>
				<?php endforeach; ?>
					</table>
				</div>
			</div>
				 
			</div>
		</div>
	</section>
</section>
<script src="js/chart.js"></script>
<!--pie chart start-->
<script>	
	$.get('api/getPiechartData.php',function(data){
        console.log(data);
        // we need to convert string data into array!
        // therefore, we need to use parseJSON() function to convert data
        // sent by php to valid JS array, otherwise it will just 
        // treat it as string and NOT CHARTS!! 
        Piedata = jQuery.parseJSON(data);
        var ctx = document.getElementById("myPieChart").getContext("2d");
        var myNewChart = new Chart(ctx).Pie(Piedata);
    });
</script>
<!--pie chart end-->
<!--line chart start-->
<script>
	$.get('api/getLinechartData.php',function(data){
		
		Linedata = jQuery.parseJSON(data);
		console.log(Linedata);
		var ctx = document.getElementById("myLineChart").getContext("2d");
		var myLineChart = new Chart(ctx).Line(Linedata);
	});
</script>
<!--line chart end-->
<!-- Count up-->
<script>
window.onload=function() {
	// Month,Day,Year,Hour,Minute,Second

		  upTime('<?php echo getCheckinDate(); ?>'); // ****** Change this line!
		}
		function upTime(countTo) {
		  now = new Date();
		  countTo = new Date(countTo);
		  difference = (now-countTo);

		  days=Math.floor(difference/(60*60*1000*24)*1);
		  hours=Math.floor((difference%(60*60*1000*24))/(60*60*1000)*1);
		  mins=Math.floor(((difference%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
		  secs=Math.floor((((difference%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);

		  document.getElementById('days').firstChild.nodeValue = days;
		  document.getElementById('hours').firstChild.nodeValue = hours;
		  document.getElementById('minutes').firstChild.nodeValue = mins;
		  document.getElementById('seconds').firstChild.nodeValue = secs;

		  clearTimeout(upTime.to);
		  upTime.to=setTimeout(function(){ upTime(countTo); },1000);
		}
</script>
<!--end count up-->
<script src="js/flipclock.js"></script>
<script src="js/flipclock.min.js"></script>
<script src="js/chart_global.js"></script>
</body>
</html>

