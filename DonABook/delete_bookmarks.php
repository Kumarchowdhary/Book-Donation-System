<?php
  session_start();
  if(isset($_SESSION['user_id'])){
  	 require_once "db_connection.php";
     $book_id=$_GET['bookid'];
     $user_id=$_SESSION['user_id'];
     $drop_bk_query="delete from bookmarks where user_id=$user_id and ad_id=$book_id ";
     if($con->query($drop_bk_query)==true){
        echo "<script>alert('You have successfully removed this from your wishlist.')</script>";
        echo "<script>location.assign('user_profile_bookmarks.php')</script>";
     }
  }
  else{
  	   echo "<script>location.assign('login.php')</script>"; 
  }
 
?>