<?php
  session_start();
  require 'db_connection.php';  
  if(isset($_POST['submit'])){
    $ruser_id=$_SESSION['user_id'];
    $user_id=$_POST['user_id'];
    $book_id=$_POST['book_id'];
    $contact=$_POST['contact'];
    date_default_timezone_set("Asia/karachi");
    $date=date('Y-m-d');
    $time=date('H:i:sa');
	  $msg_status=1;
    if($contact!=null){
         $contact_query=mysqli_query($con,"select * from members_table where user_id=$ruser_id");
         $row=mysqli_fetch_assoc($contact_query);
       if($contact=='mobile'){  
         $contact=$row['contact'];
       }
       else
       {
         $contact=$row['email'];
       }
    }

    $notf_query=mysqli_query($con,"select counter from books_limit where user_id=$ruser_id");
    $row=mysqli_fetch_assoc($notf_query);
    echo $counter=$row['counter'];   
   if($counter<=3){ 
  	  $query="insert into notifications(user_id,ruser_id,ad_id,contact,date,time,status,msg_status) values($user_id,$ruser_id,$book_id,'$contact','$date','$time',0,1)";
      $res=$con->query($query);
	    $query="update notifications set ntf_status=0 where user_id=$user_id and ruser_id=$ruser_id and ad_id=$book_id";
	    mysqli_query($con, $query); 
                     
        
      if($res==true){
          echo " <script>alert('Your request have been sent, please wait for the response. Thank You.')</script>";        
      } 
    }  else{
          echo " <script>alert('You can not request for more than 3 books in a month. Thank You.')</script>";
          }
     
    echo "<script>location.assign('BooksView.php?bookid=$book_id')</script>";
  }
?>
<html>
 <head><title>Message Delivery</title></head>
</html> 