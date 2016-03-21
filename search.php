<?php include('hoteldb.php'); ?>
       <?php
include("header.php");
global $conn;
$search = $_GET['q'];

$q ="SELECT feed_id, flag, feed_text, created_at, u_id FROM `feeds` f LEFT JOIN `feed_user` fu ON f.feed_id = fu.f_id WHERE feed_text like '%".$search."%'";
if ($stmt = $conn->prepare($q))   {
    $result = $stmt->execute();
    $stmt->bind_result($feed_id, $flag, $feed_text, $created_at, $u_id);
    while ($stmt->fetch()) {
        $rows[] = array('feed_id' => $feed_id, 'flag' => $flag, 'feed_text' => $feed_text, 'created_at' => $created_at, 'u_id' => $u_id);
//print_r($result);user_id
}

$stmt->close();
} else {
    echo "error";
}
function getUserName($user_id)
  {
    global $conn;
    if($stmt = $conn->prepare("SELECT username FROM user_guest WHERE user_id = $user_id"))
    {
      //$stmt->bind_result('i',$user_id);
      $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($username);
        $stmt->fetch();
        $stmt->close();
        return $username;
    }
    else{
      echo "Error with User Name selection!";
    }
  }
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
            <div class="col-md-12 portlets">
              <!-- Widget -->
        <div class="panel panel-default">
        <div class="panel-heading">
        <div class="pull-left">Search Results</div>
        <br><br>

 <?php
if(!$rows)
{ 
  echo '<div class="panel-body"><font color=black size=4>Nothing related to your search was found. Sorry :( <font></div>';
 } 
else { ?>


     <?php
     if(isset($_GET['q']))
     {?>
       <?php foreach ($rows as $row): ?>
      <div class="panel-body">
       <?php if($row['flag'] == 1)
       {
        ?>
           <h3><?php echo getUserName($row['u_id']); ?></h3>
            <h3><?php echo $row['feed_text']; ?></h3>
            <span class="pull-right"> <?php echo $row['created_at']; ?> </span>
            <!-- Passing the gig_id through the URL. Get the gig_id from the URL in the detail page using $_GET['gig_id'] -->
            
          <?php }
          ?>
       </div>
      </div>
      </div>
    <?php endforeach; } ?>

    <?php } ?>
  </div>
</section>
</section