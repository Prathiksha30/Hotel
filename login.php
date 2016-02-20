<!DOCTYPE html>
<?php 
	include 'hoteldb.php'; 
	session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Hotel Login</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" action="" method="POST">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="email" class="form-control" placeholder="Email ID" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="text" name="roomno" class="form-control" placeholder="Room Number">
            </div>
           
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"> Login </button>
            <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
        </div>
      </form>

    </div>


  </body>
</html>

<?php
	global $conn;
	if (isset($_POST['submit'])) 
	{
	    $email_id=$_POST['email'];
	    $room = $_POST['roomno'];
	 	//echo "hi";

	 if($stmt = $conn->prepare("SELECT user_id, name FROM user_guest WHERE email_id= ?"))
	 {
	 	$stmt->bind_param('s', $email_id);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($user_id, $name);
		$stmt->fetch();
		if($stmt->num_rows > 0)
		{
        /*echo "hey";
			echo $stmt->num_rows;*/
			$_SESSION['email_id']=$email_id;
			$_SESSION['name']=$name;
            $_SESSION['user_id']=$user_id;
		// 	//var_dump($name);
            $_SESSION['roomno']=$room;
			
			header("location:login_success.php");
		}
		else
		{ ?>
			<script>
            alert("Ain't working.") ;
            </script>
		<?php 
        } 
		$stmt->close();
	 }
	}
		
?>