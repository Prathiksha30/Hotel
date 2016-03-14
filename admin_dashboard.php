<?php
 	include('header.php'); 
	session_start();
	include('hoteldb.php');
?>
<section id="container" class="">
  <!--header start-->

  <!--main content start-->
  <section id="main-content">
      <section class="wrapper">
      	<div class="row">
      		<div class="col-lg-6 col-md-12">	
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h2><i class="fa fa-flag-o red"></i><strong>Number Of Visits:</strong></h2>
					</div>
					<div class="panel-body">
					<center>
						<canvas id="myBarChart" width="250" height="250"></canvas>
					</center>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">	
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h2><i class="fa fa-flag-o red"></i><strong>Earning Pie</strong></h2>
					</div>
					<div class="panel-body">
					<center>
						<canvas id="myPieChart" width="250" height="250"></canvas>
					</center>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-12">	
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h2><i class="fa fa-flag-o red"></i><strong>Department Activity</strong></h2>
						</div>
						<div class="panel-body">
						<center>
							<canvas id="myRadarChart" width="250" height="250"></canvas>
						</center>
						</div>
					</div>
				</div>
			</div>
      	</div>
      </section>
  </section>
</section>
<script>
	$.get('api/getAdminDashboardNoofvisitschart.php',function(data){
		Bardata = jQuery.parseJSON(data);
		console.log(Bardata);
		var ctx = document.getElementById("myBarChart").getContext("2d");
		var myBarChart = new Chart(ctx).Bar(Bardata);
	});
</script>
<script>
	$.get('api/getPieChartforAdmin.php',function(data){
		Piedata = jQuery.parseJSON(data);
		console.log(Piedata);
		var ctx = document.getElementById("myPieChart").getContext("2d");
		var myPieChart = new Chart(ctx).Pie(Piedata);
	});
</script>
<script>
	$.get('api/getRadarChartAdmin.php',function(data){
		Radardata = jQuery.parseJSON(data);
		console.log(Radardata);
		var ctx = document.getElementById("myRadarChart").getContext("2d");
		var myRadarChart = new Chart(ctx).Radar(Radardata);
	});
</script>
<script src="js/chart.js"></script>