<?php
session_start();
include('hoteldb.php');
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
						<div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                                    <h4 class="modal-title">Registeration Form</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" id="modalform" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label >Name</label>
                                            <input type="text" name="name" placeholder="" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email ID: </label>
                                            <input type="email" class="form-control" name="emailid" placeholder="Ex: asds@asds.com" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password: </label>
                                            <input type="password" name="password" class="form-control" maxlength="20" minlength="6" required>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label >Upload a profile photo: </label>
                                            <input type="file" name="file" id="file" required>
                                        </div> -->
                                        <div class="form-group">
                                            <label >Mobile Number</label>
                                            <input type="text" name="mobile" id="" class="form-control" maxlength="10" minlength="10" required>
                                        </div>
                                        <div class="form-group">
                                            <label >Age: </label>
                                            <input type="number" name="age" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label lass="col-lg-2 control-label">Department: </label>
                                            <input type="text" name="dept_name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Gender</label>
                                            <div class="col-lg-6">
                                                <input type="radio" name="sex" value ="male" checked>Male
                                                <input type="radio" name="sex" value ="female">Female
                                            </div>
                                        </div>
                                        
                                        <input type="submit" name="submit1" value="submit" class="btn btn-success">
                                    </form>
                                </div>
                            </div>
                    </div>
        </div>
 </body>
</html>
<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery ui -->
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!--custom checkbox & radio-->
    <script type="text/javascript" src="js/ga.js"></script>
    <!--custom switch-->
    <script src="js/bootstrap-switch.js"></script>
    <!--custom tagsinput-->
    <script src="js/jquery.tagsinput.js"></script>
    <!-- colorpicker -->
    <!-- bootstrap-wysiwyg -->
    <script src="js/jquery.hotkeys.js"></script>
    <script src="js/bootstrap-wysiwyg.js"></script>
    <script src="js/bootstrap-wysiwyg-custom.js"></script>
    <!-- ck editor -->
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <!-- custom form component script for this page-->
    <script src="js/form-component.js"></script>
    <!-- custome script for all page -->
    <script src="js/scripts.js"></script>
    <!-- custome qunatity change button -->
    <script src="js/custom-quantitybutton.js"></script> 
    <script>
      //knob
      $(".knob").knob();
    </script>  
<?php
global $conn;     
    // $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "PNG",  "GIF", "JPEG");
    // $temp = explode(".", $_FILES["file"]["name"]); //gets file name
    // $extension = end($temp);

    //  if ((($_FILES["file"]["type"] == "image/gif")
    //  || ($_FILES["file"]["type"] == "image/jpeg")
    //  || ($_FILES["file"]["type"] == "image/jpg")
    //  || ($_FILES["file"]["type"] == "image/pjpeg")
    //  || ($_FILES["file"]["type"] == "image/x-png")
    //  || ($_FILES["file"]["type"] == "image/png"))
    //  && ($_FILES["file"]["size"] < 1000000)
    //  && in_array($extension, $allowedExts)) 
    //     {
    //         if ($_FILES["file"]["error"] > 0) 
    //             {
    //                  echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    //             } 
    //         else 
    //             {
    //             if (file_exists("profilePhoto/" . $_FILES["file"]["name"])) 
    //                 {
    //                     echo $_FILES["file"]["name"] . " already exists. ";
    //                 } 
    //             else 
    //                 {
    //                     move_uploaded_file($_FILES["file"]["tmp_name"],
    //                    "StaffPhoto/".$staffImg);
    //                 }
    //             }
    //    } 
if (isset($_POST['sumbit']))
    {
        $staffName=$_POST['name'];
        $staffEmaiID=$_POST['emailid'];
        $staffPassword=crypt($_POST['password']);
        // $staffImg=$_FILES["file"]["name"];
        $staffMobno=$_POST['mobile'];
        $staffAge=$_POST['age'];
        $staffGender=$_POST['sex'];
        $staffDepartment=strtolower($_POST['dept_name']);
        $staffDepartmentID=getDepartmentID( $staffDepartment);
        echo $staffName;
 		if($stmt = $conn->prepare("UPDATE `user_staff` SET name, email_id, password, ph_no, age, gender,dept_id"))
        {
            $stmt->bind_param("ssissi", $staffName, $staffEmaiID, $staffPassword, $staffMobno, $staffAge, $staffGender,$staffDepartmentID);
            $stmt->execute();
        }
    }
?>

<?php
function getDepartmentID($staffDepartment)
        {  
        	global $conn;
        	if($stmt = $conn->prepare("SELECT `d_id` FROM `department` WHERE d_name=$staffDepartment"))
	        {
	            $stmt->execute();
	            $stmt->store_result();
	            $stmt->bind_result($staffDepartmentID);
	            $stmt->fetch();
	            $stmt->close();
	            // return $staffDepartmentID;
	            echo $staffDepartmentID;
	        }
	        else
	        {
	            echo "Error with getting department id!";
	      
	        }
        }
?>