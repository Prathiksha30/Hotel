<?php 
	include('header.php'); 
	//session_start();
	include('hoteldb.php');
?>
<script type="text/javascript">
    $(window).load(function(){
        $('#myModal1').modal('show');
    });
</script>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
            <div class="col-md-12 portlets">
              <!-- Widget -->
              <div class="panel panel-default">
				<div class="panel-heading">
                  <div class="pull-left">Live Feed</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <?php
          				incrementNumberOfVisits();
          		  ?>
                  <div class="clearfix"></div>
                </div>
<!-- Modal content goes here -->
                <div class="panel-body">
                  <!-- Widget content -->
                  	<div class="widget-foot">
                  	 <form class="form-inline" method="POST">
						<div class="form-group">
							<input type="text" class="form-text1" placeholder="Type your message here..." name="feedtext">
						</div>
                        <button name="send" class="btn btn-info">Post</button> <!-- type="submit" -->
                     </form>
                  </div>
                  <?php 
                  		foreach (getFeedDetails() as $feedDetails):
                  			if($feedDetails['flag'] ==1)
                  			{ 
                  ?>
                  <div class="padd sscroll">
                    <ul class="chats">
                      <!-- Chat by us. Use the class "by-me". -->
                      <li class="by-me">
                        <!-- Use the class "pull-left" in avatar -->
                        <div class="avatar pull-left">
                          <img src="<?php echo 'profilePhoto/'.getUserImage($feedDetails['u_id'])?>" alt="" height="50" width="50">
                        </div>

                        <div class="chat-content">
                          <!-- In meta area, first include "name" and then "time" -->
                          <div class="chat-meta"> 
                          <?php 
                            $feed_uid = $feedDetails['u_id'];
                            if($feed_uid[0] == "s")
                            {
                              $staff_dept = getStaffDept($feed_uid);
                              $dept_name = getDeptName($staff_dept);
                             ?> <b> <?php echo "".$dept_name; ?> </b> <?php
                            }
                            else{ 
                      ?> 
                      <b> 
                      <?php
                            echo "".getUserName($feedDetails['u_id']); 
                      ?> </b> 
                      <?php
                          }
                          if($_SESSION['S_id'] == 6)
                          { 
                      ?>
                        <form method="POST" action="">
                          <input type="hidden" name="feed_id" value="<?php echo $feedDetails['feed_id']; ?>"> <!-- Gets the value of that row -->
                          <span class="pull-right"><button type="submit" class="btn-close1" name="delete" value="<?php $feedDetails['feed_id']?>"><i class="fa fa-times"></i></button> </span>
                        </form>
                      <?php }
                      ?>
                          <span class="pull-right"><?php echo "".$feedDetails['created_at'];?></span></div>
                          <?php 
                            echo $feedDetails['feed_text']; 
                      ?>
                          <div class="clearfix"></div>
                        </div>
                        <!-- COMMENT -->
                        <div class="clearfix">
                          <span class="pull-right">
                            <a class="CommentButton"> Comment </a>
                           </span>
                              <div id="CommentArea" class="commentTextArea">
                            asdasdasdsads
                            <textarea name="CommentText" class="form-comment" placeholder="Type commenent here.."></textarea>
                          </div>
                        </div>
                      </li> 
                    </ul>

                  </div>
                  <?php 
              }
              endforeach;
                  ?>
                </div>
              </div> 
            </div>

                  <div class="col-lg-4">
                      <!--Project Activity start-->
                      
                      <!--Project Activity end-->
                  </div>
              </div>
		<!-- <div class="row">
			<div class="col-md-12 portlets">
				<div class="panel panel-default">
					<div class="panel-heading">
						LIVE FEED
					</div>
				</div>
				<div class="panel-body">
					<div class="col-lg-10">
						<form class="form-inline" method="POST">
						<input class="form-control input-lg m-bot15" type="text" name="feedtext" placeholder="Say something..">
						
					</form>
					</div>
					
				</div>
				
			</div>
			
		</div> -->
	</section>
	
</section>

<?php
if(isset($_POST['delete']))
  {
    global $conn;
    $feedid= $_POST["feed_id"];

    if($stmt=$conn->prepare("UPDATE `feeds` SET flag = 0 WHERE feed_id = $feedid"))
    {
      $stmt->execute();
      $stmt->close();
      echo "<meta http-equiv='refresh' content='0'>";
    }
    else 
      {?>
       <script>alert("There was an error, please try after sometime.")</script>
  <?php
      }
  }
?>
<!-- Inserting feeds into the databse. IT WORKS :D -->
<?php 
	global $conn;
	if(isset($_POST['send']))	
	{
		$feedtext=$_POST['feedtext'];
		$uname=$_SESSION['name'];
		//Enter feed details into table
		if($stmt = $conn->prepare("INSERT INTO feeds(feed_text, created_at) VALUES(?, now())"))
		{
			$stmt->bind_param('s', $feedtext);
			$stmt->execute();
			$stmt->close();
  		if($stmt2 = $conn->prepare("INSERT INTO feed_user(u_id) VALUES(?)"))
  		{
        if(isset($_SESSION['S_id']))
        {
          $staffid = "s".$_SESSION['S_id'];
          $stmt2->bind_param('s', $staffid);
        }
        else
        {
  			   $stmt2->bind_param('i', $_SESSION['user_id']);
        }
  			$stmt2->execute();
  			$stmt2->close();
  		}
  		else{
  			echo "Error with insertion!";
  		}
  	}
		else{
			echo "Error with insertion 1";
		}
		echo "<meta http-equiv='refresh' content='0'>"; //to refresh page after post is submitted
	}
?>
<!-- Fetching Feed data. WORKS! -->
<?php
	function incrementNumberOfVisits()
	{
		global $conn;
	    $rows = array();
	    if($stmt = $conn->prepare("UPDATE `user_guest` SET numberOfVisits=numberOfVisits+1 WHERE user_id=?"))
	    {
	      $stmt->bind_param("s", $_SESSION['user_id']);
	      $stmt->execute();
	    }
	    else
	    {
	      printf("Error message: %s\n", $conn->error);
	    }
	}
	
	function getFeedDetails()
	{
		global $conn;
		if($stmt = $conn->prepare("SELECT feed_id, flag, feed_text, created_at, u_id FROM `feeds` f LEFT JOIN `feed_user` fu ON f.feed_id = fu.f_id ORDER BY created_at DESC")) 
		{
			$stmt->execute();
			$stmt->bind_result($feed_id, $flag, $feed_text, $created_at, $u_id);
			while ($stmt->fetch()) 
			{
				$rows[] = array('feed_id' => $feed_id ,'flag' => $flag, 'feed_text' => $feed_text, 'created_at' => $created_at, 'u_id' => $u_id );
			}
			$stmt->close();
			return $rows;
		}
		else{
			echo "Error with Feed Details!";
		}
	}
	function getUserName($user_id)
	{
		global $conn;
		if($stmt = $conn->prepare("SELECT username FROM user_guest WHERE user_id = $user_id"))
		{
			//$stmt->bind_result('i',$user_id);
			$stmt->execute();
		    $stmt->store_result();
		    $stmt->bind_result($username);
		    $stmt->fetch();
		    $stmt->close();
		    return $username;
		}
		else{
			echo "Error with User Name selection!";
		}
  }
    function getUserCheckout($user_id)
  {
    global $conn;
    if($stmt = $conn->prepare("SELECT checkout FROM user_guest WHERE user_id = $user_id"))
    {
      //$stmt->bind_result('i',$user_id);
      $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($checkout);
        $stmt->fetch();
        $stmt->close();
        return $checkout;
    }
    else{
      echo "Error with User Name selection!";
    }

	}
	function getUserImage($user_id)
	{
		global $conn;
		if($stmt = $conn->prepare("SELECT user_image FROM user_guest WHERE user_id = $user_id"))
		{
			//$stmt->bind_result('i',$user_id);
			$stmt->execute();
		    $stmt->store_result();
		    $stmt->bind_result($user_image);
		    $stmt->fetch();
		    $stmt->close();
		    return $user_image;
		}
		else{
			echo "Error with image selection!";
		}
	}	
  /*STAFF DETAILS*/
  function getStaffDept($s_id)
{
  global $conn;
  if ($stmt = $conn->prepare("SELECT dept_id FROM `user_staff` WHERE staff_id = ?"))
    {
        $stmt->bind_param('i', $s_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($dept_id);
        $stmt->fetch();
        $stmt->close();
        return $dept_id;
    }
    else {
        printf("Error message: %s\n", $conn->error);
    }
}
function getDeptName($dept_id)
{
  global $conn;
  if ($stmt = $conn->prepare("SELECT d_name FROM `department` WHERE d_id = ?"))
    {
        $stmt->bind_param('i', $dept_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($d_name);
        $stmt->fetch();
        $stmt->close();
        return $d_name;
    }
    else {
        printf("Error message: %s\n", $conn->error);
    }
}
?>
<!-- For Modal Form -->
<?php
if(isset($_POST['submit']))
 {
  $username = $_POST['username'];
  $emailid = $_POST['emailid'];
  $age= $_POST['age'];
  $Img=$_FILES["file"]["name"];
  $gender = $_POST['sex'];
 ?>
  <?php   
  global $conn;
    if ($stmt = $conn->prepare("UPDATE `user_guest` SET `username`=?, `email_id`=?, `age`=?, `user_image`=?, `gender`=? WHERE `user_id`=?")) 
      {
        $stmt->bind_param("ssissi", $username, $emailid, $age, $Img, $gender, $_SESSION['user_id']);
        $stmt->execute();
      }
      else{
      	echo "Error with insertion";
      }
  // header("Location: http://localhost:8080/snappy/profile.php#");
}
function getVisitNumber()
{
	global $conn;
    if ($stmt = $conn->prepare("SELECT `numberOfVisits` FROM `user_guest` WHERE `user_id`=?")) 
      {
        $stmt->bind_param("s",$_SESSION['user_id']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($numberOfVisits);
        $stmt->fetch();
        $stmt->close();
        return $numberOfVisits;
      }
      else
      {
      	echo "Error with select";
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

<script type="text/javascript">
$('.commentTextArea').slideUp();

  $('.CommentButton').click(function(){
    $(this).parent().parent().find('.commentTextArea').slideToggle()
    console.log("clisasad");
   // console.log($(this).parent().parent().find('commentTextArea').slideToggle());
    //$('#CommentButton').addClass('visible')
  });
</script>

<style type="text/css">
  .CommentArea{
    
    border-top: 1px solid white;
    text-align: right;
}
.invisible {
    display: none;
}
.visible {
    display: block;
} 
.form-comment {
    display: block;
    width: 30%;
    height: 24px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #8e8e93;
    vertical-align: middle;
    background-color: #ffffff;
    border: 1px solid #c7c7cc;
    border-radius: 4px;
    -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.form-comment:focus {
  border-color: #007AFF;
  outline: 0;  
}
.form-comment[disabled],
.form-comment[readonly],
fieldset[disabled] .form-comment {
  cursor: not-allowed;
  background-color: #f7f7f7;
}
textarea.form-comment {
  height: auto;
}
.form-comment:-moz-placeholder {
  color: #d7d7d7;
}
.form-comment::-moz-placeholder {
  color: #d7d7d7;
}
.form-comment:-ms-input-placeholder {
  color: #d7d7d7;
}
.form-control::-webkit-input-placeholder {
  color: #d7d7d7;
}
/*Text input*/
.form-text1 {
    display: block;
    width: 850px;
    height: 45px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #8e8e93;
    vertical-align: middle;
    background-color: #ffffff;
    border: 1px solid #c7c7cc;
    border-radius: 4px;
    margin-bottom: 10px;
    -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.form-text1t:focus {
  border-color: #007AFF;
  outline: 0;  
}
.form-text1[disabled],
.form-text1[readonly],
fieldset[disabled] .form-text1 {
  cursor: not-allowed;
  background-color: #f7f7f7;
}
textarea.form-text1 {
  height: auto;
}
.form-text1:-moz-placeholder {
  color: #d7d7d7;
}
.form-text1::-moz-placeholder {
  color: #d7d7d7;
}
.form-text1:-ms-input-placeholder {
  color: #d7d7d7;
}
.form-text1::-webkit-input-placeholder {
  color: #d7d7d7;
}

</style>


               <!-- FOR THE MODAL -->
    <?php
    if (getVisitNumber() == '1')
    {
    ?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal1" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                              <h4 class="modal-title">Update your information!</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form role="form" method="POST" action="" enctype="multipart/form-data">
                                                  <div class="form-group">
                                                      <label >Username</label>
                                                      <input type="text" name="username" placeholder="Choose a username" class="form-control" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Email ID: </label>
                                                      <input type="email" class="form-control" name="emailid" placeholder="Ex: asds@asds.com">
                                                  </div>
                                                  <div class="form-group">
                                                      <label >Choose a profile photo: </label>
                                                      <input type="file" name="file" id="file">
                                                      
                                                  </div>
                                                  <div class="form-group">
                                                      <label >Age: </label>
                                                      <input type="number" name="age" class="form-control" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Gender</label>
                                                      <div class="col-lg-6">
                                                          <input type="radio" name="sex" value ="male" checked>Male
                                                          <input type="radio" name="sex" value ="female">Female
                                                      </div>
                                                  </div>
                                                  <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                              </form>
                                          </div>
                                      </div>
                                  </div>
    </div>  
    <?php
    }
    ?>