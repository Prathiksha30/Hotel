<?php 
include('hoteldb.php');
include('header.php');
?>
<section id="main-content">
 <section class="wrapper"> 
 
<div class="row">
			<div class="col-md-12 portlets">
            <div class="panel panel-default">
				<div class="panel-heading">
                  <h2><strong>Calendar</strong></h2>
				<div class="panel-actions">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>  
                 
                </div><br><br><br>
                <div class="panel-body">
                  <!-- Widget content -->
                  
                    <!-- Below line produces calendar. I am using FullCalendar plugin. -->
                    <div id="calendar"></div>
                    <div id="dialog" title="" style="display:none;">Delete Event</div>
                  
                </div>
              </div> 
               <!-- THERE'S AN ERROR WITH THE LIBRARY FILES. DOWNLOAD AGAIN -->
            </div>
</div>

<script type='text/javascript'>
$(document).ready(function() {
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		var calendar = $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
	  		selectable: true,
	  		selectHelper: true,
	  		<?php $staffid = $_SESSION['S_id'];
			if($staffid == 6)
	  			{
	  		 ?>
	  		select: function(start, end, Allday) 
	  		{
	  		 	var title = prompt('Event Title:'/*, event.title, { buttons: { Ok: true, Cancel: false} }*/);
	   			if (title)
	   			{
	   				start = $ .fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm: ss");
	   				end = $ .fullCalendar.formatDate(end, "yyyy-MM-dd HH: mm: ss");
	   				$.ajax({
	     					url: 'http://localhost/Hotel/eventadd.php',
	     					/*data: 'title =' + title + '& start =' + start + '& end =' + end,*/
	     					type: "POST",
	     					dataType: 'json',
	     					
	     					data:
	     					{
							'title' : title,
							'start' : start,
							'end' : end,
	     					},
	     					
	    					/*success: function(json){
	       						alert('Event added!');
	     					},*/
	     					error: function(e){
	       						alert('Error processing your request: '+e.responseText);
	     					}
	   				});
	   				calendar.fullCalendar('renderEvent' , {
	   					title: title,
	   					start: start,
	   					end: end,
	   					/*Allday: Allday*/
	   				},
	   				true //makes even stay on calendar
	    			);
	  			}
	   			calendar.fullCalendar('unselect');
			},
			<?php } // end of if for Admin ?>
			events: {
           		url: 'http://localhost/Hotel/event_source.php',
           		dataType: 'json',
           		type: 'POST',
            	error: function() {
                alert('There was an error while fetching events.');
            	}
        	},
			/*eventClick: function(event){
				$('#calendar').fullCalendar('removeEvents', event.id);
			}*/
			<?php 
			$staffid = $_SESSION['S_id'];
			if($staffid == 6)
	  			{
			?>
			eventClick: function(event){
       			 id= event.id;
       			$("#dialog").dialog({
       				resizable: false,
       				height: 150,
       				width: 450,
       				modal: true,
       				title: "Are sure you want to delete this?",
       				buttons: {
       					Yes: function(){
       						$('#calendar').fullCalendar('removeEvents', event.id);
       						$("#dialog").dialog("close"); //event deletes even if dialog box is closed. - Error!
       					}
       				}
       			});
       			$.ajax({
	     					url: 'http://localhost/Hotel/event_delete.php',
	     					/*data: 'title =' + title + '& start =' + start + '& end =' + end,*/
	     					type: "POST",
	     					dataType: 'json',
	     					
	     					data:
	     					{
							'id' : id
	     					},
	     					
	     					error: function(e){
	       						alert('Error processing your request: '+e.responseText);
	     					}
	   				});
       		} //event click end
       		<?php } //end of if for Admin ?>
       		
	}); //calendar function
}); //doc ready function

</script>
