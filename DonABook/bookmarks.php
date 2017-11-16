<?php
  session_start();
  require 'db_connection.php';
  $user_id=$_SESSION['user_id'];
  $ad_id=$_GET['bkmark'];
  $count=0;
  $query="select * from bookmarks";
  $res=$con->query($query);
  while($row=$res->fetch_assoc()){
         if($row['user_id']==$user_id && $row['ad_id']==$ad_id){
                 $count++;          
         }
  }
  if($count==0){
       date_default_timezone_set("Asia/karachi");
       $date=date('Y-m-sa');
       $query="insert into bookmarks values($user_id,$ad_id,'$date')";
       $res=$con->query($query);
       if($res==true){
  	       echo "<script>alert('Successfully bookmarked')</script>";
           echo "<script>location.assign('index.php')</script>";
       }
  } else{
       echo "<script>alert('Sorry! you have already bookmark this');</script>";
       echo "<script>location.assign('index.php')</script>";
  }
?>