<?php
session_start();
include('hoteldb.php');
include('header.php');

function getUserNameandRoom($user_id)
{
    global $conn;
    if ($stmt = $conn->prepare("SELECT username, room_no, user_image FROM `user_guest` WHERE user_id = ?"))
        {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($username, $room_no, $user_image);
        while ($stmt->fetch()) {
          $rows[] = array('username' => $username, 'room_no' => $room_no, 'user_image' => $user_image);
        }
        $stmt->close();
        return $rows;
    }
    else {
        printf("Error message: %s\n", $conn->error);
    }
}
function getUserdetails($user_id)
{
    global $conn;
    if ($stmt = $conn->prepare("SELECT name, email_id, ph_no, age, gender, checkin FROM `user_guest` WHERE user_id = ?")) 
        {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($name, $emailid, $ph_no, $age, $gender, $checkin);
        while ($stmt->fetch()) {
          $rows[] = array('name' => $name, 'email_id' => $emailid, 'ph_no' => $ph_no, 'age' => $age, 'gender' => $gender, 'checkin' => $checkin);
        }
        $stmt->close();
        return $rows;
    }
    else {
        printf("Error message: %s\n", $conn->error);
    }
}


?>
  
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
          
      <!--header end-->

      <!--sidebar start-->
      
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<!-- <li><i class="icon_documents_alt"></i>Pages</li> -->
						<li><i class="fa fa-user-md"></i>Profile</li>
					</ol>
				</div>
			</div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                              <h4>
                              <?php
                                $name = getUserNameandRoom($_SESSION['user_id']);
                                echo $name[0]['username'];
                                ?>
                                <br>
                                <?php
                                echo " Room Number: ".$name[0]['room_no'];
                              ?>
                              </h4>               
                              <div class="follow-ava">
                                  <img src="<?php echo 'profilePhoto/'.$name[0]['user_image']; ?>" alt="<?php echo "sorry"?>">
                              </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 follow-info">
                                
                                <!-- <h6>
                                    <span><i class="icon_clock_alt"></i><php echo "".date("Y/m/d").""; ?></span>
                                    <span><i class="icon_calendar"></i><php echo "".date("h:i:sa").""; ?></span>
                                    <span><i class="icon_pin_alt"></i>NY</span> 
                                </h6> -->
                            </div>
                            
                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                  <!-- <li class="active">
                                      <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          Daily Activity
                                      </a>
                                  </li> -->
                                  <li>
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  
                                  <!-- profile -->
                                  <div id="profile" class="tab-pane active">
                                    <section class="panel">
                                      <!-- <div class="bio-graph-heading">
                                                Hello I’m Jenifer Smith, a leading expert in interactive and creative design specializing in the mobile medium. My graduation from Massey University with a Bachelor of Design majoring in visual communication.
                                      </div> -->
                                      </section><div class="panel-body bio-graph-info">
                                          <h1>Personal Information</h1>
                                          <div class="row">
                                          <?php $userdetail = getUserdetails($_SESSION['user_id']);?>
                                              <div class="bio-row">
                                                  <p><span>Name: </span>:<?php echo $userdetail[0]['name'];?> </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Email ID: </span>:<?php echo $userdetail[0]['email_id'];?> </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Mobile Number: </span> <?php echo $userdetail[0]['ph_no'];?></p>
                                              </div> 
                                              <div class="bio-row">
                                                  <p><span>Age: </span>:<?php echo $userdetail[0]['age'];?> </p>
                                              </div>                                             
                                              <div class="bio-row">
                                                  <p><span>Gender: </span>: <?php echo $userdetail[0]['gender'];?></p>
                                              </div>
                                          </div>
                                      </div>
                                      <section>
                                          <div class="row">                                              
                                          </div>
                                      </section>
                                  </div>
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                                              <form class="form-horizontal" role="form" action="" method="POST" enctype="multipart/form-data">                                                   
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Name: </label>
                                                      <div class="col-lg-6">
                                                          <input type="text" name="guestname" class="form-control" required>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">User Name (*visible to other guests*): </label>
                                                      <div class="col-lg-6">
                                                          <input type="text" name="username" class="form-control" required>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Email ID: </label>
                                                      <div class="col-lg-10">
                                                          <input type="email" name="emailid" id="" class="form-control" >
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Mobile Number: </label>
                                                      <div class="col-lg-6">
                                                          <input type="text" name="mobileno" class="form-control" maxlength="10" minlength="10">
                                                      </div>
                                                  </div>
                                                      
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Age: </label>
                                                      <div class="col-lg-6">
                                                          <input type="text" name="age" class="form-control" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Image: </label>
                                                      <div class="col-lg-6">
                                                          <input type="file" name="file" id="file" size="80">
                                                      
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Gender: </label>
                                                      <div class="col-lg-6">
                                                          <input type="radio" name="sex" value ="male" checked>Male
                                                          <input type="radio" name="sex" value ="female">Female
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                      <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </section>
                                  </div>
                              </div>
                          </div>
                      </section>
                 </div>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    

  <script>

      //knob
      $(".knob").knob();

  </script>


  </body>
</html>
<?php

if(isset($_POST['submit']))
 {
  $name = $_POST['guestname'];
  $ph_no = $_POST['mobileno'];
  $username = $_POST['username'];
  $email_id = $_POST['emailid'];
  $age= $_POST['age'];
  $Img=$_FILES["file"]["name"];
  $gender = $_POST['sex'];
 ?>
  <?php   
  global $conn;
    if ($stmt = $conn->prepare("UPDATE `user_guest` SET `name`=?,`username`=?, `email_id`=?,`ph_no`=?, `age`=?, `user_image`=?, `gender`=? WHERE `user_id`=?")) 
      {
        $stmt->bind_param("ssssissi", $name, $username, $email_id, $ph_no, $age, $Img, $gender, $_SESSION['user_id']);
        $stmt->execute();
      }
      else{
        echo "Error with insertion";
      }
}
?>
<!-- CODE TO UPLOAD THE FILE -->
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
                if (file_exists("profilePhoto/" . $_FILES["file"]["name"])) 
                    {
                        echo $_FILES["file"]["name"] . " already exists. ";
                    } 
                else 
                    {
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                       "profilePhoto/".$Img);
                    }
                }
       }       
?>
