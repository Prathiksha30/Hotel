<?php
session_start();
include('hoteldb.php');
function getUserInfo($user_id)
{
    global $conn;
    if ($stmt = $conn->prepare("SELECT name, user_image FROM `user_guest` WHERE user_id = ?"))
        {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($name,$user_image);
        while ($stmt->fetch()) {
          $rows[] = array('name' => $name,'user_image' => $user_image);
        }
        $stmt->close();
        return $rows;
    }
    else {
        printf("Error message: %s\n", $conn->error);
    }
}
function getStaffDetails($s_id)
{
  global $conn;
  if ($stmt = $conn->prepare("SELECT name, profile_pic FROM `user_staff` WHERE s_id = ?"))
    {
        $stmt->bind_param("i", $s_id);
        $stmt->execute();
        $stmt->bind_result($sname, $profile_pic);
        while ($stmt->fetch()) {
          $rows[] = array('name' => $sname,'profile_pic' => $profile_pic);
        }
        $stmt->close();
        return $rows;
    }
    else {
        printf("Error message: %s\n", $conn->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Creative - Bootstrap Admin Template</title>
<!-- clock timer-->
<link rel="stylesheet" href="css/flipclock.css">
    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
   <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
<!-- FOR DATETIMEPICKER -->
    
    <link href="bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    
  </head>
   <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

           <!--logo start-->
     <a href="feeds.php" class="logo">AMIGO DE <span class="lite">HOTEL</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                       <!--  <form class="navbar-form">
                            <input  class="form-control" placeholder="Search" type="text">
                            <button type="submit" class="btn btn-default btn-primary">Search</button>
                        </form> -->
                        <form class="navbar-form navbar-left" role="search" method="GET" action="search.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="q">
        </div>
        <button type="submit" class="btn btn-default btn-primary">Search</button>
      </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
               
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="follow-ava">
                              
                             <!-- IMAGE COMES HERE-->
                              
                            </span>
                            <span class="username">
                            <?php
                            if(isset($_SESSION['S_id']))
                            {
                              $staffName = getStaffDetails($_SESSION['S_id']);
                              echo $staffName[0]['name'];
                            }
                            else{
                                $name = getUserInfo($_SESSION['user_id']);
                                echo $name[0]['name'];
                              }
                              ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                       <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                             <?php

                            if(isset($_SESSION['S_id']))
                            { 
                            	?><a href="staff_profile.php"><i class="icon_profile"></i> My Profile</a><?php
                            }
                            else
                            {
                                ?><a href="profile.php"><i class="icon_profile"></i> My Profile</a><?php
                            }?>
                            </li>
                            <li>
                                <a href="feeds.php"><i class="icon-dashboard-l"></i>Feeds</a>
                            </li>
                            <li>
                               <?php

                            if(isset($_SESSION['S_id']))
                            { 
                              /*$staff = $_SESSION['staff_id']*/;
                              if( $_SESSION['S_id'] == 0) //admin has id 0
                              { ?>
                                
                              <a href="admin_newusers.php"><i class="icon-task-l"></i> My Dashboard</a> 
                            <?php  }

                               else { ?>
                                <a href="staff_dashboard.php"><i class="icon-task-l"></i> Dashboard & Services</a> 
                              <?php  }  
                              ?>
                              </li>

                              <li>
                              
                            <?php 
                            } //end of if for Staff
                            else {
                            ?>
                            <li>
                                <a href="services.php"><i class="icon-task-l"></i> Services</a>
                                 <?php 
                            } ?>
                            </li>
                            <!-- <li>
                                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
                            </li> -->
                            <li>
                                <a href="logout.php"><i class="icon-login-l "></i> Log Out</a>
                            </li>
                            <!-- <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documents</a>
                            </li> -->
                           <!--  <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li> -->
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">  
              <?php if(isset($_SESSION['user_id']))
                        { ?>        
                  <li>
                     <a class="" href="user_dashboard.php">Dashboard
                          <i class="icon_piechart"></i>                                                  
                      </a>

                           
                  </li>  
                  <?php 
                  }?>           
                  <li >
                  
                      <a class="" href="feeds.php">Feed
                          <i class="icon_house_alt"></i>
                      </a>
                  </li>
                  <?php if(isset($_SESSION['user_id']))
                  {?>
                  <!--   <li>
                      <a href="404.html" class="">Chat
                          <i class="icon_document_alt"></i>                          
                      </a>
                      
                  </li> -->
                  <?php
                  }?>
                  
                  <li>
                  <?php if(isset($_SESSION['S_id']))
                        { 
                          if( $_SESSION['S_id'] == 0)
                            { ?>
                           <a href="admin_newusers.php" class="">My Dashboard
                          <i class="icon_desktop"></i></a> 
                       <?php   
                            }
                           else { ?>
                          <a href="staff_dashboard.php" class="">Service Requests
                          <i class="icon_desktop"></i></a> 
                         <?php  
                          }
                        }
                        else 
                        {
                        ?>
                          <a href="services.php" class="">Services 
                          <i class="icon_desktop"></i></a>
                        <?php 
                        } ?>
                                             
                  </li>
                  <li>
                      <a class="" href="events.php">Events
                          <i class="icon_genius"></i>                          
                      </a>
                  </li>
                  <li> 
                   <?php 
                   if(isset($_SESSION['user_id']))
                    {?>
                                              
                              <a class="" href="profile.php">My Profile
                                  <i class="icon_profile"></i>                                                  
                              </a>
                                                 
                          
                          <?php
                    }
                    else
                    {?>
                      <a class="" href="staff_profile.php">My Profile
                                  <i class="icon_profile"></i>                                                  
                       </a>
                    <?php
                    }?>
                    </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- <script src="js/jquery.js"></script> -->
    <script type="text/javascript" src="assets/fullcalendar/jquery/jquery-1.8.1.min.js" charset="UTF-8"></script>
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


 <!-- jQuery full calendar -->
    <script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
  <!-- <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script> -->
 <script src="js/calendar-custom.js"></script>
 <script src='js/moment.min.js'></script>
