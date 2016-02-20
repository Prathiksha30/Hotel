<?php 
	session_start();
	
	if(!isset($_SESSION['user_id']))
	{
		?>
		<script> alert('Wrong Email ID!')</script>
		<?php
		header("Location:login.php"); 
	}
	else
	{
		header("Location:index.php"); 
	}
?>
<!-- <a href="#myModal" data-toggle="modal" class="btn btn-primary"> -->