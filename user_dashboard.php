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


