<?php 
	include('header.php'); 
	//session_start();
	include('hoteldb.php');
?>


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
                          <div class="chat-meta"><?php echo "".$_SESSION['name'];?> <span class="pull-right"> 3 hours ago</span></div>
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
              <div>
              <!-- FOR EACH INVALID ARGUMENT SUPPLIED -->
              	<?php
              	$feedDeets=getFeedDetails();
                      foreach ($feedDeets as $feedDetails):
                      	echo "Feed ID :".$feedDetails['feed_id'];
                      echo "Feed Text :".$feedDetails['feed_text'];
                      echo "Created AT : ".$feedDetails['created_at'];
                      echo "User ID :".$feedDetails['user_id'];
                      endforeach; 
                      ?>
                                
                                 
                                      
                              
              </div>
            </div>

</body>
</div>
</section>
</section>
</html>

<!-- Inserting feeds into the databse. IT WORKS :D -->
<?php 
	global $conn;
	if(isset($_POST['send']))	
	{
		$feedtext=$_POST['feedtext'];
		$uname=$_SESSION['name'];
		//Enter feed details into table
		if($stmt = $conn->prepare("INSERT INTO feeds(feed_text, created_at) VALUES(?, now())"))
		{
			$stmt->bind_param('s', $feedtext);
			$stmt->execute();
			$stmt->close();
		
		if($stmt2 = $conn->prepare("INSERT INTO feed_user(user_id) VALUES(?)"))
		{
			$stmt2->bind_param('i', $_SESSION['user_id']);
			$stmt2->execute();
			$stmt2->close();
		}
		else{
			echo "Error with insertion!";
		}
		}
		else{
			echo "Error with insertion 1";
		}
	}
?>
<!-- Fetching Feed data. WORKS! -->
<?php
	
	function getFeedDetails()
	{
		global $conn;
		if($stmt = $conn->prepare("SELECT feed_id, feed_text, created_at, u_id FROM `feeds` f LEFT JOIN `feed_user` fu ON f.feed_id = fu.f_id ")) 
		{
			$stmt->execute();
			$stmt->bind_result($feed_id, $feed_text, $created_at, $user_id);
			while ($stmt->fetch()) 
			{
				$rows = array('feed_id' => $feed_id , 'feed_text' => $feed_text, 'created_at' => $created_at, 'user_id' => $user_id );
			}
			$stmt->close();
			print_r($rows);
			echo "Name : ".getUserName($rows['user_id']);
		}
		else{
			echo "Error with Feed Details!";
		}
	}
	function getUserName($user_id)
	{
		global $conn;
		if($stmt = $conn->prepare("SELECT name FROM user_guest WHERE user_id = $user_id"))
		{
			//$stmt->bind_result('i',$user_id);
			$stmt->execute();
		    $stmt->store_result();
		    $stmt->bind_result($name);
		    $stmt->fetch();
		    $stmt->close();
		    return $name;
		}
		else{
			echo "Error with User Name selection!";
		}

	}	
?>
