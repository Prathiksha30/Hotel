<?php include('header.html') ?>

 <section id="main-content">
          <section class="wrapper">  
<div class="row">
            <div class="col-lg-12">
            <!-- col-md-4 portlets -->
              <!-- Widget -->
              <div class="panel panel-default">
				<div class="panel-heading">
                  <div class="pull-left">Live Feed</div>
                  <div class="widget-icons pull-right">
                   <!--  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a> -->
                  </div>  
                  <div class="clearfix"></div>
                </div> <br>


                <div class="panel-body">
                  <!-- Widget content -->
                   <div class="col-sm-10"> 
                  <!-- <div class="widget-foot"> -->
                     
                      <form class="form-inline" method="POST">
						<div class="col-sm-11">
						<input class="form-control input-lg m-bot15" type="text" name="feedtext" placeholder="Say something..">
							<!-- <input type="text" class="form-control" placeholder="Type your message here..."> -->
						</div>
						<button class="btn btn-primary" name="send">Post </button>
						<!-- <a class="btn btn-primary" href="" title="Bootstrap 3 themes generator">Post</a> -->
                        <!-- <button type="submit" class="btn btn-info">Send</button> -->
                      </form>
						<?php 
	 						if(isset($_POST['send']))
					 		{
					 			$desc=$_POST['feedtext'];
					 		}
					 			?>
                  <!-- </div> -->
                  </div>
                  <br><br><br><br>
                  <div class="padd sscroll">
                    
                    <ul class="chats">
                    	
                      <!-- Chat by us. Use the class "by-me". -->
                      <li class="by-me">
                        <!-- Use the class "pull-left" in avatar -->
                        <div class="avatar pull-left">
                          <img src="img/user.jpg" alt=""/>
                        </div>

                        <div class="chat-content">
                          <div class="chat-meta">John Smith <span class="pull-right">3 hours ago</span></div>
                          <?php echo $desc; ?>
                          <div class="clearfix"></div>
                        </div>
                      </li> 

                      <!-- Chat by other. Use the class "by-other". -->
                      <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                          <img src="img/user22.png" alt=""/>
                        </div>

                        <div class="chat-content">
                          <!-- In the chat meta, first include "time" then "name" -->
                          <div class="chat-meta">3 hours ago <span class="pull-right">Jenifer Smith</span></div>
                          Vivamus diam elit diam, consectetur fconsectetur dapibus adipiscing elit.
                          <div class="clearfix"></div>
                        </div>
                      </li>   

                      <li class="by-me">
                        <div class="avatar pull-left">
                          <img src="img/user.jpg" alt=""/>
                        </div>

                        <div class="chat-content">
                          <div class="chat-meta">John Smith <span class="pull-right">4 hours ago</span></div>
                          Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                          <div class="clearfix"></div>
                        </div>
                      </li>  

                      <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                          <img src="img/user22.png" alt=""/>
                        </div>

                        <div class="chat-content">
                          <!-- In the chat meta, first include "time" then "name" -->
                          <div class="chat-meta">3 hours ago <span class="pull-right">Jenifer Smith</span></div>
                          Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                          <div class="clearfix"></div>
                        </div>
                      </li>                                                                                  

                    </ul>

                  </div>
                  <!-- Widget footer -->

                </div>


              </div> 
            </div>

</body>