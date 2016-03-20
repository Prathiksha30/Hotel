<?php 
	include('header.php'); 
  session_start();
	include('hoteldb.php');
?>
<br><br><br><br>
<section id="main-content">
<div class="col-lg-12">
	<ol class="breadcrumb">
		<li><i class="fa fa-home"><a href="admin_dashboard.php"></i>Overview</a></li>
		<li><i class="icon_document_alt"></i>Staff</li>
		<li><i class="icon_profile"><a href="newguests.php"></i>Guests</a></li>
	<!-- 	<li><i class="fa fa-files-o"></i>Spa facilities</li> -->
	</ol>
</div>
<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">&nbsp<i class="fa fa-table"></i> STAFF VERIFICATION </h3>
				</div>
</div>
<div class="row">
    <div class="col-lg-12">
     	<section class="panel">
            <table class="table table-striped table-advance table-hover">
            <tbody>
                <tr>
                    <th><i class="icon_profile"></i>Name</th>
                    <th><i class="icon_star"></i> Staff Id</th>
                    <th><i class="icon_mail_alt"></i> Email</th> 
                    <th><i class="icon_ribbon"></i> Department</th>
                    <th><i class="icon_calendar"></i> DOJ</th>
                    <!-- <th><i class="icon_camera_alt"></i></th> -->
                    <th><i class="icon_tool"></i> Confirm</th>
                </tr>
                <?php 
                foreach (getStaffDetails1() as $staffDetails): 
                ?>
    			<?php if($staffDetails['admin_confirm'] == 0) 
                              {?>
                              <tr>                             
                                    <td>
                                    <?php echo $staffDetails['name']; ?>
                                    </td>                               
                                    <td> <?php echo $staffDetails['staff_id']; ?> </td>
                              <td> <?php echo $staffDetails['email_id']; ?> </td>
                              <td> <?php $dept= $staffDetails['dept_id']; 
                               $dept_name= getDeptName($dept);
                              		echo $dept_name;
                              ?> </td> 
                              <td> <?php echo $staffDetails['doj']; ?>  </td> 
                                 <td>
                                  <div class="btn-group">
                                      <form method="POST" action="">
                                       <input type="hidden" name="staff_id" value="<?php echo $staffDetails['s_id']; ?>"> <!-- Gets the value of that row -->
                                      <button type="submit" name="accept" class="btn btn-success"> <i class ="icon_check_alt2"> </i> </button>
                                      
                                      <!-- <button class="btn btn-success" id="accept" ><i class="icon_check_alt2"></i> </button> -->
                                      <button type="submit" class="btn btn-danger" name="reject" value="<?php $staffDetails['s_id'] ?>"><i class="icon_close_alt2"></i> </button>
                                      </form>
                                  </div>
                                  </td> <?php }  ?>
                              </tr>                              
                           </tbody>
                        <?php endforeach; ?>
                        </table>
                      </section>
                  </div>
              </div>   
  <div class="row">
  <div class="col-lg-12">
					<h3 class="page-header">&nbsp<i class="fa fa-table"></i> STAFF DETAILS </h3>
				</div>
                  <div class="col-lg-12">
                      <section class="panel">
                          
                          <div class="table-responsive">
                            <table class="table"> 

                             <th><i class="icon_profile"></i>Name</th>
		                    <th><i class="icon_star"></i> Staff Id</th>
		                    <th><i class="icon_ribbon"></i> Department</th>
		                    <th><i class="icon_mail_alt"></i> Email</th> 
		                    <th><i class="icon_phone"></i> Mobile Number</th>
		                    <th><i class="icon_profile"></i> Gender</th>
		                    <th><i class="icon_calendar"></i> DOJ</th>   
		                     <?php 
                		foreach (getStaffDetails1() as $staffDetails): 
                		 if($staffDetails['admin_confirm'] == 1) 
                              {?>
                              <tr>                             
                                    <td>
                                    <?php echo $staffDetails['name']; ?>
                                    </td>                               
                                    <td> <?php echo $staffDetails['staff_id']; ?> </td>
                                     <td> <?php $dept= $staffDetails['dept_id']; 
                              				 $dept_name= getDeptName($dept);
                              				 echo $dept_name;
                             			 ?> </td> 
                              <td> <?php echo $staffDetails['email_id']; ?> </td>
                              <td> <?php echo $staffDetails['ph_no']; ?> </td>
                              <td> <?php echo $staffDetails['gender']; ?> </td>
                              <td> <?php echo $staffDetails['doj']; ?>  </td> 
                              <?php } ?>
                                 <td>
                        <?php endforeach; ?>
                        </table>
                      </section>
                  </div>
              </div>                     
<?php
function getStaffDetails1()
{
	global $conn;
	if($stmt = $conn->prepare("SELECT s_id, staff_id, name, email_id, doj, dept_id, admin_confirm, ph_no, gender FROM user_staff"))
	{
		$stmt->execute();
		$stmt->bind_result($s_id, $staff_id, $staffName, $staffEmail, $staffDoj, $staffDept, $admin_confirm, $ph_no, $gender);
		while ($stmt->fetch()) {
			$rows [] = array('s_id' => $s_id,'staff_id' => $staff_id , 'name' => $staffName, 'email_id' => $staffEmail, 'doj' => $staffDoj, 'dept_id' => $staffDept, 'admin_confirm' => $admin_confirm, 'ph_no' => $ph_no, 'gender' => $gender );
		}
		$stmt->close();
		return $rows;
		}
	
 	else
	  {
	    printf("Error message: %s\n", $conn->error);
	  }
}
function getDeptName($dept_id)
{
	 global $conn;
  if ($stmt = $conn->prepare("SELECT d_name FROM `department` WHERE d_id = ?"))
    {
        $stmt->bind_param('i', $dept_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($d_name);
        $stmt->fetch();
        $stmt->close();
        return $d_name;
    }
}
?>               
 <!-- FOR ADMIN BUTTONS -->
 <?php  
 	if(isset($_POST['accept']))
 	{
 		global $conn;
 		$sid= $_POST["staff_id"];
 		if($stmt = $conn->prepare("UPDATE user_staff SET admin_confirm='1' WHERE s_id = $sid"))
 		{
 			$stmt->execute();
 			$stmt->close() ?>
 			<script> alert("Staff has successfully been verified!")
      </script> 
      <script type="text/javascript"></script>
 		<?php
 		/*window.location.href = ".php";*/ 
    
 		}
 		else
 		{?>
 			<script> alert("There was an error, please try again after sometime.")</script>
 		<?php
 		}
 	}
 	if(isset($_POST['reject']))
 	{
 		global $conn;
 		$sid= $_POST["staff_id"];
 		if($stmt = $conn->prepare("DELETE FROM user_staff WHERE s_id= $sid"))
 		{
 			$stmt->execute();
 			$stmt->close(); ?>
 			<script> alert("Staff has successfully been deleted!")
      </script> 
 		<?php
 		}
 		else{
 			printf("Error : ". $conn->error);
 			?>
 			<script> alert("There was an error, please try again after sometime.")</script>
 		<?php
 		}
 	}
 ?>
             
              