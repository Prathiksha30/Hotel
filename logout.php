<?php include ("hoteldb.php");
?>




<?php session_start(); ?>
<?php
global $conn;
if( isset($_SESSION["email_id"]) && $_SESSION["email_id"] )
    {
       session_destroy();
      header("Location: login.php");
       exit;
    }
  else
    {
      if(isset($_SESSION['S_id']))
      {
      	 session_destroy();
          header("Location: login.php");
           exit;
      }
    }
?>

 
