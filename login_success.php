<?php 
	session_start();
	
	if(!isset($_SESSION['email_id']))
	{
		?>
		<script> alert('wrong username or password')</script>
		<?php
		header("Location:login.php"); 
	}
	else
	{
		header("Location:index.php"); 
	}
?>
<!-- <a href="#myModal" data-toggle="modal" class="btn btn-primary"> -->