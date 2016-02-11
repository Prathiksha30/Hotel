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
                                  <form class="form-validate form-horizontal" id="feedback_form" method="get" action="">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="cname" name="fullname" minlength="5" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">E-Mail <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="cemail" type="email" name="email" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="curl" class="control-label col-lg-2">Website</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="curl" type="url" name="url" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Subject <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="subject" name="subject" minlength="5" type="text" required />
                                          </div>
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Feedback</label>
                                          <div class="col-lg-10">
                                              <textarea class="form-control " id="ccomment" name="comment" required></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Save</button>
                                              <button class="btn btn-default" type="button">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
    </div>
</section>