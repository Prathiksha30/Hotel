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

<?php
    global $conn;
    if (isset($_POST['submit'])) 
    {
        $email_id=$_POST['email'];
        $password = $_POST['password'];

     if($stmt = $conn->prepare("SELECT s_id, name,email_id FROM user_staff WHERE email_id= ? AND password=? AND admin_confirm=1"))
     {
        $stmt->bind_param('ss', $email_id,$password);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($s_id, $name, $email_id);
        $count=0;
        while($stmt->fetch())
        {
            $count=$count+1;
            $rows[]=array('s_id'=>$s_id,'name'=>$name,'email_id'=>$email_id);
        }
        //print_r($rows);
        // $row_count=$stmt->rowCount();
        //echo $count;
        $stmt->close();
     }
     if($count==1)
        {          
            $_SESSION['StaffEmail_id']=$email_id;
            $_SESSION['StaffName']=$name;
            $_SESSION['S_id']=$s_id;
            header("Location: index.php");
        }
        else
        {
            ?>
            <script>
            alert("Wrong Email ID and Room Number") ;
            </script>
            <?php
        }
    }
?>

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
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div>
             <input type="submit" name="submit" value="Login" class="btn btn-primary btn-lg btn-block">
            <!-- <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"> Login </button> -->
            <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
            </div>
            <div>
                <a class="btn btn-info btn-lg btn-block" data-toggle="modal" href="#myModal">Signup</a>           
            </div>
        </div>
      </form>

      <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Registeration Form</h4>
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
                                            <label>Password: </label>
                                            <input type="password" name="password" class="form-control" maxlength="20" minlength="6" required>
                                        </div>
                                        <div class="form-group">
                                            <label >Upload a profile photo: </label>
                                            <input type="file" name="file" id="file" required>
                                        </div>
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
                <!-- modal -->

    </div>

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
  </body>
</html>

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
                       "profilePhoto/".$staffImg);
                    }
                }
       } 
?>
<?php
    if(isset($_POST['submit1']))
    { 
     $staffName=$_POST['name'];
        $staffEmaiID=$_POST['emailid'];
        $staffPassword=$_POST['password'];
        $staffImg=$_FILES["file"]["name"];
        $staffMobno=$_POST['mobile'];
        $staffAge=$_POST['age'];
        $staffGender=$_POST['sex'];
        $staffDepartment=strtolower($_POST['dept_name']);
        $staffDepartmentID=getDepartmentID($staffDepartment);
        ?>
        <script>
        alert("Wait for admin to confirm. Login after sometime");
        </script>
        <?php
        if($stmt = $conn->prepare("INSERT INTO user_staff(name, email_id, password, ph_no, age, gender,dept_id) VALUES(?,?,?,?,?,?,?)"))
        {
            $stmt->bind_param("ssssisi", $staffName, $staffEmaiID, $staffPassword, $staffMobno, $staffAge, $staffGender,$staffDepartmentID);
            $stmt->execute();
            $stmt->close;
        }
        else
        {
            echo "Error with updation";
        }
    }
?>
<?php
function getDepartmentID($staffDepartment)
        {  
            global $conn;
            if($stmt = $conn->prepare("SELECT `d_id` FROM `department` WHERE d_name=?"))
            {
                $stmt->bind_param("s", $staffDepartment);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($staffDepartmentID);
                $stmt->fetch();
                $stmt->close();
                return $staffDepartmentID;
            }
            else
            {
                echo "Error with getting department id!";
          
            }
        }
?>