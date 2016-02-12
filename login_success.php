<?php 
	session_start();
	if(!isset($_SESSION['email_id']) || !isset($_SESSION['staffEmail_id']))
	{
		header("Location:login.php"); 
	}
	else
	{
		?>
		<script> alert('wrong username or password')</script>
		<?php
		header("Location:index.php"); 
	}
?>
<!-- <a href="#myModal" data-toggle="modal" class="btn btn-primary"> -->