<?php
  session_start();
  require 'db_connection.php';  
  if(isset($_POST['submit'])){
  	$user_id=$_POST['user_id'];
  	$ruser_id=$_SESSION['user_id'];
  	$bookid=$_POST['book_id'];
  	date_default_timezone_set("Asia/karachi");
    $date=date('Y-m-d');
    $time=date('H:i:sa');
  	$query="insert into notifications(user_id,ruser_id,ad_id,date,time) values($user_id,$ruser_id,$bookid,'$date','$time')";
  	$res=$con->query($query);
    if($res==true){
      echo " <h1>Your message has been sent wait for the response thank you</h1>";

    }
  }
  else{
      echo "<h1>Sorry! Your request can't be fulfilled because You've already requested for this book<br/></h1>";
    }
?>
<html>
 <head><title>Message Delivery</title></head>
</html> 