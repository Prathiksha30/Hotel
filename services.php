<?php
session_start();
include('hoteldb.php');
include('header.php');
?>


  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
    
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
                                      <a data-toggle="tab" href="#Restaurant_Bar">Restaurant & Bar</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#Recreation_LeisureServices">Recreation & Leisure Services</a>
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
                                                      Refill the minifridge
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
                                  <div id="Restaurant_Bar" class="tab-pane">
                                  <!--modal start-->
                                          <section class="panel">
                                              <header class="panel-heading">
                                                  Menu
                                              </header>
                                              <div class="panel-body">
                                                  <a class="btn btn-success" data-toggle="modal" href="#myModal">
                                                      Breakfast
                                                  </a>
                                                  <a class="btn btn-warning" data-toggle="modal" href="#myModal2">
                                                      Lunch
                                                  </a>
                                                  <a class="btn btn-danger" data-toggle="modal" href="#myModal3">
                                                      Dinner
                                                  </a>
                                                  <a class="btn btn-info popovers" data-toggle="modal" href="#myModal3">
                                                      Snacks and Drinks
                                                  </a>
                                                  <div class="login-wrap">
                                                    <div class="col-lg-2 control-label">Total Bill Amount: 
                                                    <label id="cartTotal">0</label>
                                                    </div>
                                                    <div class="col-lg-2 control-label" id="cartBill">Total Bill Items: 
                                                    <button type="button" class"btn btn-success" id="checkOut" value="CheckOut">Check Out </button>
                                                    <!-- <table id="cartBill" >
                                                      <th> Item </th>
                                                      <th> Price </th>
                                                      <tr > </tr>
                                                    </table> -->
                                                    </div>
                                                  </div>
                                                  <!-- Modal -->
                                                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">Breakfast Menu</h4>
                                                              </div>
                                                              <div class="modal-body">
                                                              <table>
                                                                <th>Item</th>
                                                                <th>Price</th>
                                                                <?php
                                                                if (!is_null(getMenu('breakfast'))) {
                                                                    foreach (getMenu('breakfast') as $key => $menu ):
                                                                ?>
                                                                  <tr>
                                                                  <td style="padding:5px;"> <?php echo $menu['fooditem_name']; ?> </td>
                                                                  <td style="padding:5px;"> <?php echo $menu['fooditem_price']; ?></td>
                                                                  <td>
                                                                  <form id='myform' method='POST' action=''>
                                                                    <input type ='hidden' class="name_quantity_<?php echo $key; ?>" value='<?php echo $menu['fooditem_name']; ?>' field='name_quantity_<?php echo $key; ?>' name="name_quantity_<?php echo $key; ?>"/>
                                                                    <input type ='hidden' class="price_quantity_<?php echo $key; ?>" value='<?php echo $menu['fooditem_price']; ?>' field='price_quantity_<?php echo $key; ?>' name="price_quantity_<?php echo $key; ?>"/>
                                                                    <input type='button' value='-' class='qtyminus' field='quantity_<?php echo $key; ?>' />
                                                                    <input type='text' name='quantity_<?php echo $key; ?>' value='0' class='qty' />
                                                                    <input type='button' value='+' class='qtyplus' field='quantity_<?php echo $key; ?>' />
                                                                  </form>
                                                                  </td>
                                                                  </tr>
                                                                  <?php endforeach; } ?>
                                                              </table>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                  <button class="btn btn-danger" type="button"> Confirm</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- modal -->
                                                  <!-- Modal -->
                                                  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">Lunch Menu</h4>
                                                              </div>
                                                              <div class="modal-body">
                                                              <table>
                                                                <th>Item</th>
                                                                <th>Price</th>
                                                                <?php
                                                                 if (!is_null(getMenu('lunch'))) {
                                                                  foreach (getMenu('lunch') as $key => $menu ):
                                                              ?>
                                                                  <tr>
                                                                  <td style="padding:5px;"> <?php echo $menu['fooditem_name']; ?> </td>
                                                                  <td style="padding:5px;"> <?php echo $menu['fooditem_price']; ?></td>
                                                                  <td>
                                                                  <form id='myform' method='POST' action=''>
                                                                    <input type ='hidden' class="name_quantity1_<?php echo $key; ?>" value='<?php echo $menu['fooditem_name']; ?>' field='name_quantity1_<?php echo $key; ?>' name="name_quantity1_<?php echo $key; ?>"/>
                                                                    <input type ='hidden' class="price_quantity1_<?php echo $key; ?>" value='<?php echo $menu['fooditem_price']; ?>' field='price_quantity1_<?php echo $key; ?>' name="price_quantity1_<?php echo $key; ?>"/>
                                                                    <input type='button' value='-' class='qtyminus' field='quantity1_<?php echo $key; ?>' />
                                                                    <input type='text' name='quantity1_<?php echo $key; ?>' value='0' class='qty' />
                                                                    <input type='button' value='+' class='qtyplus' field='quantity1_<?php echo $key; ?>' />
                                                                  </form>
                                                                  </td>
                                                                  </tr>
                                                                  <?php endforeach; } ?>
                                                              </table>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                  <button class="btn btn-warning" type="button"> Confirm</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- modal -->
                                                  <!-- Modal -->
                                                  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">Dinner Menu</h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <table>
                                                                <th>Item</th>
                                                                <th>Price</th>
                                                                <?php
                                                                 if (!is_null(getMenu('dinner'))) {
                                                                  foreach (getMenu('dinner') as $key => $menu ):
                                                              ?>
                                                                  <tr>
                                                                  <td style="padding:5px;"> <?php echo $menu['fooditem_name']; ?> </td>
                                                                  <td style="padding:5px;"> <?php echo $menu['fooditem_price']; ?></td>
                                                                  <td>
                                                                  <form id='myform' method='POST' action=''>
                                                                    <input type ='hidden' class="name_quantity2_<?php echo $key; ?>" value='<?php echo $menu['fooditem_name']; ?>' field='name_quantity2_<?php echo $key; ?>' name="name_quantity2_<?php echo $key; ?>"/>
                                                                    <input type ='hidden' class="price_quantity2_<?php echo $key; ?>" value='<?php echo $menu['fooditem_price']; ?>' field='price_quantity2_<?php echo $key; ?>' name="price_quantity2_<?php echo $key; ?>"/>
                                                                    <input type='button' value='-' class='qtyminus' field='quantity2_<?php echo $key; ?>' />
                                                                    <input type='text' name='quantity2_<?php echo $key; ?>' value='0' class='qty' />
                                                                    <input type='button' value='+' class='qtyplus' field='quantity2_<?php echo $key; ?>' />
                                                                  </form>
                                                                  </td>
                                                                  </tr>
                                                                  <?php endforeach; } ?>
                                                              </table>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                  <button class="btn btn-danger" type="button"> Confirm</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- modal -->
                                                  <!-- Modal -->
                                                  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">Dinner Menu</h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <table>
                                                                <th>Item</th>
                                                                <th>Price</th>
                                                                <?php
                                                                 if (!is_null(getMenu('snacks&drinks'))) {
                                                                  foreach (getMenu('snacks&drinks') as $key => $menu ):
                                                              ?>
                                                                  <tr>
                                                                  <td style="padding:5px;"> <?php echo $menu['fooditem_name']; ?> </td>
                                                                  <td style="padding:5px;"> <?php echo $menu['fooditem_price']; ?></td>
                                                                  <td>
                                                                  <form id='myform' method='POST' action=''>
                                                                    <input type ='hidden' class="name_quantity3_<?php echo $key; ?>" value='<?php echo $menu['fooditem_name']; ?>' field='name_quantity3_<?php echo $key; ?>' name="name_quantity3_<?php echo $key; ?>"/>
                                                                    <input type ='hidden' class="price_quantity3_<?php echo $key; ?>" value='<?php echo $menu['fooditem_price']; ?>' field='price_quantity3_<?php echo $key; ?>' name="price_quantity3_<?php echo $key; ?>"/>
                                                                    <input type='button' value='-' class='qtyminus' field='quantity3_<?php echo $key; ?>' />
                                                                    <input type='text' name='quantity_<?php echo $key; ?>' value='0' class='qty' />
                                                                    <input type='button' value='+' class='qtyplus' field='quantity3_<?php echo $key; ?>' />
                                                                  </form>
                                                                  </td>
                                                                  </tr>
                                                                  <?php endforeach; } ?>
                                                              </table>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                  <button class="btn btn-danger" type="button"> Confirm</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- modal -->

                                              </div>
                                          </section>
                                          <!--modal start-->
                                      <!-- swiggy code starts here -->
                                      <!-- <div class="restaurant-menu-listing">
                                        <div class="banner-common hide cart-error-banner"></div>
                                        <div class="container">
                                      <div class="row">
                                      <div class="col-md-3 col-xs-12">
                                      <div class="sidebar-wrapper " id="sidebar-wrapper">
                                          <div class="cusines">
                                            <div class="search-box">
                                              <input class="search" type="text" placeholder="Search by items" id="item-filter">
                                            </div>
                                              <div class="category-list">
                                                    <ul class="sub-category resto_sub_cat">
                                                        <li class="active">
                                                          <a class="selection_cate" data-id="all" title="All">All</a>
                                                        </li>
                                                        <li class="">
                                                          <a class="selection_cate" data-id="12794" title="Ice Creams">Ice Creams</a>
                                                        </li>
                                                        <li class="">
                                                          <a class="selection_cate" data-id="12802" title="Beverages">Beverages</a>
                                                        </li>
                                                        <li class="">
                                                          <a class="selection_cate" data-id="212947" title="Mousse">Mousse</a>
                                                        </li>
                                                    </ul>
                                              </div>
                                          </div>
                                      </div>
                                      </div>
                                      </div>
                                      </div>
                                      </div>  -->                                     
                                     <!-- swiggy code ends here -->
                                  </div>
                                  <div id="Recreation_LeisureServices" class="tab-pane">
                                       <img src="img/rec.jpg" height="300" width="1126">
                                      <br> <br>
                                      <div class="row">
                                      <div class="col-lg-4">
                                       <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                          Recreation and Leisure 
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse in">
                                  <div class="panel-body">
                                      The Hotel offers a variety of options for indoor and outdoor swimming, plus a sports complex featuring, basketball, volleyball, and tennis courts.
There are engaging activities that guests of all ages will enjoy - miles of hiking trails, Segway tours, falconry, and much more!
                                  </div>
                              </div>
                          </div>
                                     </div> 

                                    <div class="col-lg-2">
                      <section class="panel">
                          <div class="panel-body">Pool Facilities</div>
                      </section>
                  </div>
                  <div class="col-lg-2">
                      <section class="panel">
                          <div class="panel-body">Fitness Centre </div>
                      </section>
                  </div>
                  <div class="col-lg-2">
                      <section class="panel">
                          <div class="panel-body"> <a href="spa.php"> Spa Facilities </a> </div>
                      </section>
                  </div>
                                     </div>
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
  <script src="js/custom-quantitybutton.js"></script>
  </body>
</html>
<?php
function getMenu($category)
{
  global $conn;
  if ($stmt = $conn->prepare("SELECT fooditem_name, fooditem_price FROM `restaurant_menu` WHERE category=?")) 
  {
     $stmt->bind_param("s", $category);
    $stmt->execute();
    $stmt->bind_result($fooditem_name, $fooditem_price);
    while ($stmt->fetch()) {
          $rows[] = array('fooditem_name' => $fooditem_name, 'fooditem_price' => $fooditem_price);
        }
    $stmt->close();
    return $rows;
    }
    else {
        printf("Error message: %s\n", $conn->error);
    }
}
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
?>
<!--<script>
  $("#checkOut").click(function(){
    $.ajax({
      type: 'GET',
      url: 'cart_checkout.php'
      data: {
        "totalAmount": totalamount,
        "totalItems": totalitems
      }
      success: function(returnMe){
        alert(returnMe);
        /*alert('Your stuff has been saved');
        window.location.reload();*/
      }
    });
  });
</script>-->
<!--<script>
$cart=$('.qty').val()*
</script>-->