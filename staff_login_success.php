<?php 
	session_start();
	if(isset($_SESSION['staffEmail_id']))
	{
 		header("Location:feeds.php");  
	}
	else
	{
		?>
		<script> alert('wrong username or password')</script>
		<?php
		header("Location:staff_login.php"); 
	}
?>