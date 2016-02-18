<?php
 	include('header.php'); 
	//session_start();
	include('hoteldb.php');
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<!-- <h2><i class="fa fa-map-marker red"></i><strong>Countries</strong></h2>
		<div class="panel-actions">
			<a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
			<a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
			<a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
		</div>	 -->
		<div class="panel-actions">
		?>
		 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript">
	      google.charts.load('current', {'packages':['corechart']});
	      google.charts.setOnLoadCallback(drawChart);
		      function drawChart() {

		        var data = google.visualization.arrayToDataTable([
		          ['Task', 'Hours per Day'],
		          ['Work',     11],
		          ['Eat',      2],
		          ['Commute',  2],
		          ['Watch TV', 2],
		          ['Sleep',    7]
		        ]);

		        var options = {
		          title: 'Expenditure Summary',
		          backgroundColor: '#f2f2f2',
		          chartArea:{left:0,top:100,width:'50%',height:'75%'}

		        };

		        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		        chart.draw(data, options);
      }
    </script>
    <div class="panel-actions">
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
	</div>
	<div class="panel-body-map">
		<div id="map" style="height:380px;"></div>	
	</div>
</div>
// <script>
// $(function(){
// 	  $('#map').vectorMap({
// 	    map: 'world_mill_en',
// 	    series: {
// 	      regions: [{
// 	        values: gdpData,
// 	        scale: ['#000', '#000'],
// 	        normalizeFunction: 'polynomial'
// 	      }]
// 	    },
// 		backgroundColor: '#eef3f7',
// 	    onLabelShow: function(e, el, code){
// 	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
// 	    }
// 	  });
// 	});
// </script>


