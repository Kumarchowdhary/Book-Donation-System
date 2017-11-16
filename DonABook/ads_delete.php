<?php
  session_start();
  if(isset($_SESSION['user_id'])){
  	 if(isset($_GET['deactive'])){
     require_once('db_connection.php');
	 $userid=$_SESSION['user_id'];
	 $did=$_GET['did'];
	 $query=mysqli_query($con,"update books_ad_table set ad_status=0 where ad_id=$did");
	 mysqli_query($con,"update notifications set ntf_status=1 where ad_id=$did");
	 if($query>0){
	 	echo "<script>alert('Your book ad has been deactivated now & It will not visible anymore.')</script>";
	 	echo "<script>location.assign('user_profile_ads.php')</script>";
	 }
  }
  else if(isset($_GET['delete'])){
     require_once('db_connection.php');
	 $userid=$_SESSION['user_id'];
	 $did=$_GET['did'];
	 $query=mysqli_query($con,"update books_ad_table set ad_status=2 where ad_id=$did");
	 mysqli_query($con,"update notifications set ntf_status=1 where ad_id=$did");
	 if($query>0){
	 	echo "<script>alert('Your book ad has been removed now.')</script>";
	 	echo "<script>location.assign('user_profile_ads.php')</script>";
	 }
  }

  else if(isset($_GET['active'])){
     require_once('db_connection.php');
	 $userid=$_SESSION['user_id'];
	 $did=$_GET['did'];
	 $query=mysqli_query($con,"update books_ad_table set ad_status=1 where ad_id=$did");
	 mysqli_query($con,"update notifications set ntf_status=1 where ad_id=$did");
	 if($query>0){
	 	echo "<script>alert('Your book ad has been activated now.')</script>";
	 	echo "<script>location.assign('user_profile_ads.php')</script>";
	 }
  }
 }  

?>