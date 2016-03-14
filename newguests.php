<?php 
	include('header.php'); 
	include('hoteldb.php');
?>
<br><br><br><br>
<section id="main-content">
<div class="col-lg-12">
	<ol class="breadcrumb">
		<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
		<li><i class="icon_document_alt"><a href="admin_newusers.php"></i>Staff</a></li>
		<li><i class="icon_profile"></i>Guests</a></li>
	<!-- 	<li><i class="fa fa-files-o"></i>Spa facilities</li> -->
	</ol>
</div>
<div class="row">
				<div class="col-lg-10">
					<h3 class="page-header">&nbsp<i class="fa fa-table"></i> Guests at Hotel </h3>
				</div>
				<div class="col-lg-2">
				<a class="btn btn-primary" data-toggle="modal" href="#myModal"> Add New Guest </a>
				<!-- <input type="submit" name="competeService" value="Add New Guest" class="btn btn-primary "> -->
				</div>
</div>
<div class="row">
    <div class="col-lg-12">
     	<section class="panel">
            <table class="table table-striped table-advance table-hover">
            <tbody>
                <tr>
                    <th><i class="icon_profile"></i>Name</th>
                    <th><i class="icon_star"></i> User Name</th>
                    <th><i class="icon_mail_alt"></i> Email Address</th> 
                    <th><i class="icon_phone"></i> Phone Number</th>
                    <th><i class="icon_ribbon"></i> Room Number</th>
                    <th><i class="icon_calendar"></i> Check in</th>
                    <th><i class="icon_calendar"></i> Check out</th>
                    <!-- <th><i class="icon_camera_alt"></i></th> -->
                </tr>
                <?php 
                foreach (getUserDetails() as $userDetails): 
                ?>
    			<?php if($userDetails['checkout'] == NULL) 
                              {?>
                              <tr>                             
                                    <td>
                                    <?php echo $userDetails['name']; ?> </td>                               
                                    <td> <?php echo $userDetails['username']; ?> </td>
                              <td> <?php echo $userDetails['email_id']; ?> </td>
                              <td> <?php echo $userDetails['ph_no']; ?> </td> 
                              <td> <?php echo $userDetails['room_no']; ?>  </td> 
                              <td> <?php echo $userDetails['checkin']; ?>  </td> 
                                 <td>
                                  <div class="btn-group">
                                      <form method="POST" action="">
                                       <input type="hidden" name="checkout" value="<?php echo $userDetails['user_id']; ?>"> <!-- Gets the value of that row -->
                                      <input type="submit" name="accept" value="Checkout" class="btn btn-success">
                                      </input>
                                      </form>
                                  </div>
                                  </td> <?php }  ?>
                              </tr>                              
                           </tbody>
                        <?php endforeach; ?>
                        </table>
                      </section>
                  </div>
              </div>  
               <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Enter Guest Details:</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label >Name</label>
                                            <input type="text" name="name" placeholder="" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email ID: </label>
                                            <input type="email" class="form-control" name="emailid" placeholder="Ex: asds@asds.com" required>
                                        </div>
                                        <div class="form-group">
                                            <label >Phone Number</label>
                                            <input type="text" name="phno" placeholder="" class="form-control" maxlength="10" minlength="10" required>
                                        </div>
                                        <div class="form-group">
                                            <label >Upload a profile photo: </label>
                                            <input type="file" name="file" id="file" required>
                                        </div>
                                        <div class="form-group">
                                            <label >Room Number</label>
                                            <input type="text" name="roomno" id="" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label >Age: </label>
                                            <input type="number" name="age" class="form-control" required>
                                        </div>

                                       <!--  <div class="form-group">
                                            <label lass="col-lg-2 control-label">Checkin: </label>
                                            <input type="date" name="checkin" class="form-control" required>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Gender</label>
                                            <div class="col-lg-6">
                                                <input type="radio" name="sex" value ="male" checked>Male
                                                <input type="radio" name="sex" value ="female">Female
                                            </div>
                                        </div>
                                        
                                        <input type="submit" name="submit1" value="Submit" class="btn btn-success">
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- modal -->
<?php 
if(isset($_POST['accept']))
{
	global $conn;
	$uid= $_POST["checkout"];
	if($stmt = $conn->prepare("UPDATE user_guest SET checkout = now() WHERE user_id = $uid"))
	{
		$stmt->execute();
		$stmt->close();
	}
	else
	{
		printf("Error message: %s\n", $conn->error);
	}
}
function getUserDetails()
{
	global $conn;
	if($stmt = $conn->prepare("SELECT user_id, name, username, email_id, ph_no, room_no, checkin, checkout FROM user_guest"))
	{
		$stmt->execute();
		$stmt->bind_result($user_id, $name, $username, $email_id, $ph_no, $room_no, $checkin, $checkout);
		while($stmt->fetch())
		{
			$rows[ ]= array('user_id' => $user_id, 'name' => $name , 'username' => $username, 'email_id' =>$email_id, "ph_no" => $ph_no, 'room_no' => $room_no, 'checkin' => $checkin, 'checkout' => $checkout );
		}
		$stmt->close();
		return $rows;
	}
		else {
        printf("Error message: %s\n", $conn->error);
    }
}
?>
<!-- FOR MODAL -->
<?php
if(isset($_POST['submit1'])) 
{
	global $conn;
	$name=$_POST['name'];
	$email_id=$_POST['emailid'];
	$ph_no=$_POST['phno'];
	$guest_img=$_FILES["file"]["name"];
	$roomno=$_POST['roomno'];
	$age1=$_POST['age'];
	$geender=$_POST['sex'];
	if($stmt=$conn->prepare("INSERT INTO user_guest(name, email_id, ph_no, age, user_image, gender, room_no) VALUES(?, ?, ?, ?, ?, ?, ?"))
	{
		$stmt->bind_param('sssissi', $name, $email_id, $ph_no, $age1, $guest_img, $geender, $roomno);
		$stmt->execute();
		$stmt->close();
	}
	else{
		?>
		<script> alert("Something went wrong. Please try again!"</script>
	<?php }
  
}

?>
<?php
  $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "PNG",  "GIF", "JPEG");
    $temp = explode(".", $_FILES["file"]["name"]); //gets file name
    $extension = end($temp);

     if ((($_FILES["file"]["type"] == "image/gif")
     || ($_FILES["file"]["type"] == "image/jpeg")
     || ($_FILES["file"]["type"] == "image/jpg")
     || ($_FILES["file"]["type"] == "image/pjpeg")
     || ($_FILES["file"]["type"] == "image/x-png")
     || ($_FILES["file"]["type"] == "image/png"))
     && ($_FILES["file"]["size"] < 1000000)
     && in_array($extension, $allowedExts)) 
        {
            if ($_FILES["file"]["error"] > 0) 
                {
                     echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                } 
            else 
                {
                if (file_exists("StaffPhoto/" . $_FILES["file"]["name"])) 
                    {
                        echo $_FILES["file"]["name"] . " already exists. ";
                    } 
                else 
                    {
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                       "profilePhoto/".$guest_img);
                    }
                }
       } 
?>