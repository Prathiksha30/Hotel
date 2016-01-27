<?php
session_start();
include('hoteldb.php');
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

    <title>Elements | Creative - Bootstrap 3 Responsive Admin Template</title>

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

  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">Nice <span class="lite">Admin</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
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
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username">Jenifer Smith</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_clock_alt"></i>Feeds</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_chat_alt"></i>Chats</a>
                            </li>
                            <li>
                                <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
                            </li>                            
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
                  <li class="active">
                      <a class="" href="index.html">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forms</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="form_component.html">Form Elements</a></li>                          
                          <li><a class="" href="form_validation.html">Form Validation</a></li>
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>UI Fitures</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">Components</a></li>
                          <li><a class="" href="buttons.html">Buttons</a></li>
                          <li><a class="" href="grids.html">Grids</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>Widgets</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Charts</span>
                          
                      </a>                                         
                  </li>                             
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Tables</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.html">Basic Table</a></li>
                      </ul>
                  </li>                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="login.html"><span>Login Page</span></a></li>
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                      </ul>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <br><br>
              <div class="row">
                  <div class="col-lg-12">                      
                      <!--tab nav start-->
                      <section class="panel">
                          <header class="panel-heading tab-bg-primary ">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#RoomService">Room Service</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#Restaurant&Bar">Restaurant & Bar</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#Recreation&LeisureServices">Recreation & Leisure Services</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#TransportaionFacility">Transportaion Facility</a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="RoomService" class="tab-pane active">
                                    <br>
                                      <!--carousel start-->                
                                      <section class="panel">
                                          <div id="c-slide" class="carousel slide auto panel-body">
                                              <ol class="carousel-indicators out">
                                                  <li class="active" data-slide-to="0" data-target="#c-slide"></li>
                                                  <li class="" data-slide-to="1" data-target="#c-slide"></li>
                                                  <li class="" data-slide-to="2" data-target="#c-slide"></li>
                                              </ol>
                                              <div class="carousel-inner">
                                                  <div class="item text-center active">
                                                      <h3>Select</h3>
                                                      <small class="">Select the service you require</small>
                                                  </div>
                                                  <div class="item text-center">
                                                      <h3>Order Notes</h3>
                                                      <small class="">Want a little less sugar, little more spice? Let us know.</small>
                                                  </div>
                                                  <div class="item text-center">
                                                      <h3>Done</h3>
                                                      <small class="">Click on Submit and the request will go to the room service department</small>
                                                  </div>
                                                  
                                              </div>
                                              <a data-slide="prev" href="#c-slide" class="left carousel-control">
                                                  <i class="arrow_carrot-left_alt2"></i>
                                              </a>
                                              <a data-slide="next" href="#c-slide" class="right carousel-control">
                                                  <i class="arrow_carrot-right_alt2"></i>
                                              </a>
                                          </div>
                                      </section>
                                      <!--carousel end-->
                                      <!--form start form takes in the room service request from guests-->
                                        <form  method="POST" action="">
                                        <div class="row">
                                        <div class="col-lg-4">
                                           
                                            <div class="radiobox">
                                                  <label>
                                                      <input type="radio" name="req"  value="Extra Mattress" >
                                                      Extra Mattress
                                                  </label>
                                            </div>
                                                  <!-- <div class="col-sm-6">
                                                  <label>Select Qunatity
                                                          <div class="col-lg-6">
                                                              <select class="form-control m-bot10">
                                                                  <option>1</option>
                                                                  <option>2</option>
                                                              </select>
                                                        </div> 

                                                  </label>
                                                  </div>
                                           -->
                                            
                                            
                                            </div>
                                            </div>
                                            
                                            <div class="radiobutton">
                                                  <label>
                                                      <input type="radio" name="req" value="Something isn't working">
                                                      Something isn't working (mention in the comment what isn't working)
                                                  </label>
                                            </div>
                                            <div class="radiobutton">
                                                  <label>
                                                      <input type="radio" name="req" value="Need Some toiletries">
                                                      Need Some toiletries (please mention in the comment what toiletries you want)
                                                  </label>
                                            </div>
                                            <div class="radiobutton">
                                                  <label>
                                                      <input type="radio" name="req" value="Clean My Room" >
                                                      Clean My Room
                                                  </label>
                                            </div>
                                            <div class="radiobutton">
                                                  <label>
                                                      <input type="radio" name="req" value="Provide with an iron box" >
                                                      Provide with an iron box
                                                  </label>
                                            </div>
                                            <div class="radiobutton">
                                                  <label>
                                                      <input type="radio" name="req" value="Refil the minifridge" >
                                                      Refil the minifridge
                                                  </label>
                                            </div>
                                            <div class="col-sm-10"> Comment:
                                               <input type="text" name="comment" class="form-control">
                                            </div>
                                            <br>
                                            <div class="col-lg-offset-2 col-lg-10">
                                              <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                            </div>
                                            </form>
                                  </div>
                                  <div id="Restaurant&Bar" class="tab-pane">
                                      page 2
                                  </div>
                                  <div id="Recreation&LeisureServices" class="tab-pane">
                                      page 3
                                  </div>                                  
                                  <div id="TransportaionFacility" class="tab-pane">
                                      page 4
                                  </div>
                              </div>
                          </div>
                      </section>
                      <!--tab nav start-->                      
                  </div>
              </div>
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- gritter -->
   
    <!-- custom gritter script for this page only-->
    <script src="js/gritter.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
  </body>
</html>
<?php
if(isset($_POST['submit']))
 {
?>
  <script type='text/javascript'>alert("your request has been send to the room service department");
  window.location.href = "index.php"
  </script>";
  <?php 
  global $conn;
  $req = $_POST['req'];
  $comment = $_POST['comment'];
  $message=$req."-".$comment;  
  echo $message;
  if ($stmt = $conn->prepare("INSERT INTO `user_services`(`dept_id`, `user_id`, `room_no`, `status`, `message`) VALUES ('1','1','101','pending',?)")) 
  {
    $stmt->bind_param("s",$message);
    $stmt->execute();
  }
}