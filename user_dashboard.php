<?php
 	include('header.php'); 
	//session_start();
	include('hoteldb.php');

function getCheckinDate()
{
    global $conn;
  if ($stmt = $conn->prepare("SELECT checkin FROM user_guest WHERE user_id=1")) 
        {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($checkindate);
            $stmt->fetch();
            $stmt->close();
            return $checkindate;
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
        	<center>
        	<div class="col-lg-11 col-md-12">	
			<div class="panel panel-success">
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
					
					<canvas id="myLineChart" width="250" height="250"></canvas>
				</div>
			</div>
		</div>
		</div>
	</section>
</section>

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
						<script>
							 $.get('api/getLinechartData.php',function(data){
					        console.log(data);
					        // we need to convert string data into array!
					        // therefore, we need to use parseJSON() function to convert data
					        // sent by php to valid JS array, otherwise it will just 
					        // treat it as string and NOT CHARTS!! 
					        Linedata = jQuery.parseJSON(data);
					        var ctx = document.getElementById("myLineChart").getContext("2d");
					        var myLineChart = new Chart(ctx).Line(data, options);
					    });
						</script>
						<script src="js/chart.js"></script>
						<!-- Count up					-->

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
						<script src="js/flipclock.js"></script>
						<script src="js/flipclock.min.js"></script>
</body>
</html>

