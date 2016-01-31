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
                      <style>
body
{
font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;
font-size:12px;
}
.main{
width:450px;
padding:3px;
border:1px solid #ececec;
}
.status{
background-color:#D2F2EE;
width:440px;
}

.comment{
padding:5px; vertical-align:top; margin-top:2px;
}
.comment_but{
text-align:right;
padding:3px;
margin-right:16px;
}
.comment_but a{
text-decoration:none;
color:#6F88DF;
font-size:10px;
}
.comment_but a:hover{
text-decoration:underline;
}
.new_comment_table
{
clear:left;
float:none;
overflow:hidden;
padding:5px 0 4px 5px;
width:380px;
font-size:11px;
margin:1px 0 0 25px;
}
.new_comment_row
{
background-color:#ECEFF5;
}
.new_comment_img
{
width:50px;
margin-top:2px;
vertical-align:top
}
.new_comment_text
{
width:300px;
margin-top:2px;
vertical-align:top;
}
#comm_row{
display:none;
background-color:#ECEFF5;
border-bottom:1px solid #E5EAF1;
width:350px;
margin:2px 0 0 40px;
}
.comm_input{
overflow:hidden;
height:29px;
margin:5px 5px 0 0;
min-height:29px;
width:298px;
border:1px solid #BDC7D8;
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
font-size:11px;
padding:3px;
}
.post_but{
background:#EEEEEE;
border-color:#999999 #999999 #888888;
border-style:solid;
border-width:1px;
color:#333333;
cursor:pointer;
display:inline-block;
font-size:11px;
font-weight:bold;
line-height:normal !important;
padding:2px 6px;
text-align:center;
text-decoration:none;
vertical-align:middle;
white-space:nowrap;
float:right;
}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
 var counter=1;
 /*Show input box*/
 $('#comment_but').click(function()
 {
  $('#comm_row').slideDown();
 });
 
 /*Delete the comment*/
 $('.comment_del_but').live("click",function() 
 {
  var ID = $(this).attr("id");
  if(confirm("Are you sure to delete this Comment?"))
  {
   $("#new_comment_table"+ID).slideUp();
   /*
    Write AJAX logic for deletion here
   */
  }
 });
 
 /* Post your comment */
 $('#post_but').click(function()
 {
  var comm = $('#comm_input').val();
  if(comm.length != 0)
  {
   /*Disables the input box*/
      $('#comm_input').attr({'disabled':'true'});
   /*Disables the post button*/
      $('#post_but').attr({'disabled':'true'});

   /*Send ajax request*/
   $.ajax({
     'url':'post.php','data':'comment='+comm,
     'type':'POST',
     'success':function(data)
     {
      if(data.length)
      {
       /*Create new table for new post*/
       var htm = '<table class="new_comment_table" id="new_comment_table'+counter+'" align="center">';
        htm += '<tr class="new_comment_row" id="'+counter+'">';
     htm += '<td class="new_comment_img" id="new_comment_img"><img src="web.PNG" height="50" width="50"></td>';
     htm += '<td class="new_comment_text" id="new_comment_text"><b>Arvind : </b>'+ data;
     htm += '<br /><div class="comment_del_but" id="'+counter+'" align="right""><a href="#">Delete</a></div>';
     htm += '</td>';
     htm += '</tr>';
     htm += '</table>';

       /*Append new table in predefined area*/
       $('#new_comment_here').append(htm);
          $('#comm_input').removeAttr('disabled');
          $('#post_but').removeAttr('disabled');
       counter++;
    }
   }
   });
  }

 });
});
</script>
</head>

<body>

<div>
<a href="http://www.webspeaks.in">Webspeaks.in</a>
<a href="http://arvind-bh.blogspot.com">
 <img src="http://www.logomaker.com/logo-images/ba3c91fee33721fb.gif"/ width="200" height="120" title="Web Speaks">
</a>
</div>

<table border="0" cellpadding="0" cellspacing="0" class="main">
 <tr class="status">
  <td>
   <table>
   <tr>
    <td class="comment" ><img src="web.PNG" height="50" width="50"></td>
    <td class="comment"><b>Arvind : </b>Facebook like comment post with jquery. This Tutorial shows how to post facebook like comments with jquery & PHP.</td>
   </tr>
   <tr>
    <td colspan="2" class="comment_but">
     <a href="#" id="comment_but">Comment</a>
    </td>
   </tr>
   </table>
  </td>
 </tr>
 <tr>
  <td colspan="2" id="new_comment_here">
  
  </td>
 </tr>
 <tr class="comm_row" id="comm_row" align="center">
  <td colspan="2" align="center">
  <textarea class="comm_input" id="comm_input"></textarea><br/>
  <button class="post_but" id="post_but">Comment!</button>
  </td>
 </tr>
</table>
</body>
</html>
     </div>   
               <?php
$comment=$_POST['comment'];
if($comment!="")
{
// mysql_query("insert into comments (`comm`) values ('$comment')");
 echo "$comment";
}
?>       
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