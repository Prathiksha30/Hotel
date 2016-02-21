<?php
 	include('header.php'); 
	//session_start();
	include('hoteldb.php');
?>
<script src="js/chart.js"></script>
<canvas id="myChart" width="900" height="900"></canvas>

<script>
var chartData = [];
$.get('api/getPiechartData.php',function(data){
	console.log(data);
	alert(data);
	chartData = data;

// var chartData = [
//     {
//         value: 300,
//         color:"#F7464A",
//         highlight: "#FF5A5E",
//         label: "Red"
//     },
//     {
//         value: 50,
//         color: "#46BFBD",
//         highlight: "#5AD3D1",
//         label: "Green"
//     },
//     {
//         value: 100,
//         color: "#FDB45C",
//         highlight: "#FFC870",
//         label: "Yellow"
//     }
// ]

	var ctx = document.getElementById("myChart").getContext("2d");
	var myNewChart = new Chart(ctx).Pie(chartData);


});



</script>


  </body>
</html>

