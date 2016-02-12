<?php 
	include('header.php'); 
	//session_start();
	include('hoteldb.php');
?>
<br><br><br><br>
<section id="main-content">
<div class="col-lg-12">
	<ol class="breadcrumb">
		<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
		<li><i class="icon_document_alt"></i><a href="services.php">Services</a></li>
		<li><i class="fa fa-files-o"></i>Spa facilities</li>
	</ol>
</div>
<div class="col-lg-4">
 <div class="panel-group m-bot20" id="accordion">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                          Collapsible Group Item #1
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse in">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                          Collapsible Group Item #2
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                          Collapsible Group Item #3
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseThree" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>
                          </div>
                      </div>
                      </div>
    <div class="col-lg-8">
    	 <header class="panel-heading">
                              Book an appointment today!
                          </header>
                           <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="cname" name="fullname" minlength="5" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Room Number<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="rno" type="number" name="roomno" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="curl" class="control-label col-lg-2">Select your treatment</label>
                                          <div class="col-lg-10">
                                          <select class="form-control m-bot15" name="treatment">
                                              <option value="Facial">Facial</option>
                                              <option value="Massage">Massage</option>
                                              <option value="Sauna">Sauna</option>
                                              <option value="Head Massage">Head Massage</option> 
                                              <option value="Other">Other</option>
                                          </select>
                                              <!-- <input class="form-control " id="curl" type="url" name="url" /> -->
                                          </div
                                      </div>
                                                                         
                                      <div class="form-group">
                                              <label class="control-label col-sm-2">Pick your date: </label>
                                              <div class="col-sm-6">
                                                  <div class="input-append date " id="dpYears" data-date=""
                                                       data-date-format="dd-mm-yyyy " data-date-viewmode="years">
                                                      <input class="form-control" size="16" type="date" name="datepick" value="<?php echo date('Y-m-d'); ?>" > <!-- PHP shows today's date -->
                                                      <span class="add-on" ><i class="glyphicon glyphicon-calendar"></i></span>
                                                  </div>
                                              </div>
                                          </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit" name="request">Request</button>
                                              <button class="btn btn-default" type="button">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
    </div>
</section>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({

        weekStart: 1,
        todayBtn:  1,
        /*setDate: new Date(),*/
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
        startDate: new Date() //To disable past dates
    });
    </script>
<?php 
global $conn;
if(isset($_POST['request']))
{
  $roomno=$_POST['roomno'];
  $msg=$_POST['treatment'];
  $datepick=$_POST['datepick'];
  if($stmt = $conn->prepare("INSERT INTO user_services(dept_id, user_id, room_no, status, message, request_time) VALUES('3', '2', ?, 'Pending', ?, ?) "))
  {
    $stmt->bind_param('iss', $roomno, $msg, $datepick);
    $stmt->execute();
    $stmt->close();
  }
  else{
    echo "Error with in insertion";
  }
}
?>