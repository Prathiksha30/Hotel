<?php
session_start();
include('hoteldb.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Profile</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <form class="form-horizontal" role="form" action="" method="POST"> 
    <div class="form-group">
                                                      <label class="col-lg-2 control-label">Image: </label>
                                                      <div class="col-lg-6">
                                                          <input type="file" name="file" id="file" size="80">
                                                      
                                                      </div>
                                                  </div> 
                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                      <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                                      </div>
                                                  </div>
                                                  </form>
     <div class="padd sscroll">
                    <ul class="chats">
       <li class="by-me">
                        <!-- Use the class "pull-left" in avatar -->
                        <div class="avatar pull-left">
                          <img src="img/user.jpg" alt=""/>
                        </div>
                        <div class="chat-content">
                          <div class="chat-meta"><span class="pull-right"> HEY THERE YOU. YES YOU!</span></div>
                          
                          <div class="clearfix"></div>
                        </div>
                          <a href="#comment"> Comment </a>
                      </li> 
                      </ul>
     </div>   
     <div id="comment">
     HI THERE
      <?php 
          if($_POST)
          {
            global $conn;
            $comm=$_POST['comm'];
            if($stmt = $conn->prepare("INSERT INTO comments(comment_text, comment_date) VALUES(?, now())"))
            {
              $stmt->bind_param('s', $comm);
              $stmt->execute();
              $stmt->close();
            }
          }
      ?>
       <script>
       $(document).ready(function()){
        $('#comm').keyup(function(e))
        {
          if(e.keyCode == 13) //enter key
          {
            var comm= $('#comm').val()
            if(comm=="")
            {
              alert("Write something...");
            }
            else
            {
              $(#commentbox).append("<div class=\'commentarea\>"+comm+"</div>");
              $.post("trial.php", {comm:comm}, function(data))
              {

              })
            $('#comm').val("");
            }
          }
        });
       });
</script>
     </div>                                          
  </body>
  </html>
  <?php 
  if(isset($_POST['submit']))
  {
    global $conn;
    $user_image = $_FILES["file"]["name"];
    echo "Picture: ".$user_image;
    if($stmt = $conn->prepare("UPDATE user_guest SET user_image=? WHERE user_id=2"))
    {
      $stmt->bind_param('s', $user_image);
      $stmt->execute();
      $stmt->close();

    }
    else{
      echo "Error with insertion :(";
    }
  }
  ?>
  <?php

    $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

     if ((($_FILES["file"]["type"] == "image/gif")
     || ($_FILES["file"]["type"] == "image/jpeg")
     || ($_FILES["file"]["type"] == "image/jpg")
     || ($_FILES["file"]["type"] == "image/pjpeg")
     || ($_FILES["file"]["type"] == "image/x-png")
     || ($_FILES["file"]["type"] == "image/png"))
     && ($_FILES["file"]["size"] < 10000000000)
     && in_array($extension, $allowedExts)) 
        {
            if ($_FILES["file"]["error"] > 0) 
                {
                     echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                } 
            else 
                {
                 echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                 echo "Type: " . $_FILES["file"]["type"] . "<br>";
                 echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                 echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";


                if (file_exists("upload/" . $_FILES["file"]["name"])) 
                    {
                        echo $_FILES["file"]["name"] . " already exists. ";
                    } 
                else 
                    {
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                       "upload/" . $user_image);
                        echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
                    }
                }
       }    
   

   

               
     // here pre tag will come in double quotes.
    //print_r($_POST);  // show post data
    //print_r($_FILES);  // show files data
    die; // die to stop execution. 

?>

<style>
.status
{
    width:350px;
    font-size: 13px;
    line-height: 18px;
    font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
}
.commentarea
{
    width:350px;
    font-size: 13px;
    line-height: 18px;
    font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
    border: thin;
    border-color: white;
    border-style: solid;
    background-color: hsl(0, 0%, 96%);
    padding: 5px;
}
#comment
{
    width: 357px;
    height: 23px;
    font-size: 15px;
}
</style>