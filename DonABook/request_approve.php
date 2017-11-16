<?php
  session_start();
  require 'db_connection.php';
  if(isset($_POST['submit'])){
  $ntf_id=$_POST['ntf_id'];
  $user_id=$_SESSION['user_id'];
  $ruser_id=$_GET['uid'];
  $book_id=$_GET['bookid'];
  $status=1;
  $bool=0;
  $cnt_via=$_POST['cnt_opt'];
  $contact="";
  date_default_timezone_set("Asia/karachi");
  $date=date('Y-m-d');
  $time=date('H:i:sa');
  $res_date=date("Y-m-d");
  $res_time=date("H:i:sa");
  $query="select * from members_table where user_id=$user_id";
  $res=$con->query($query);
  while($row=$res->fetch_assoc()){
  	if($cnt_via=="mobile"){
  		$contact=$row['contact'];
  	}else if($cnt_via=="email"){
  		$contact=$row['email'];
  	}
  }  

     $borrow_book_check=mysqli_query($con,"select * FROM books_limit WHERE user_id=$ruser_id");
      if(mysqli_num_rows($borrow_book_check)==0){
         list($year,$month,$day)=explode('-',$date);
         $end=date('Y-m-d',mktime(0, 0, 0, $month+1,$day,$year));
         $borrow_query=mysqli_query($con,"insert into books_limit(user_id,start,end,counter) values($ruser_id,'$date','$end',1) ");
         $bool=1;

      } else{
            $borrow_book_check_row=mysqli_fetch_assoc($borrow_book_check);
            $counter=(int)$borrow_book_check_row['counter']; 
            $start=date($borrow_book_check_row['start']);
            $end=date($borrow_book_check_row['end']);
            $current_date=date("Y-m-d");
            if($counter<3 && $current_date>=$start && $current_date<=$end ){
                 $counter +=1;
                 $borrow_query=mysqli_query($con,"update books_limit set counter=$counter where user_id=$ruser_id ");
                 $bool=1;
            } else if($counter==3 && $current_date>$end){
                 $counter=1;
                 $cdate=strtotime($end);
                 $start=date('Y-m-d',$cdate);
                 list($year,$month,$day)=explode('-',$start);
                 $end=date('Y-m-d',mktime(0, 0, 0, $month+1,$day,$year));
                 $borrow_query=mysqli_query($con,"update books_limit set counter=$counter,start='$start',end='$end'  where user_id=$ruser_id ");
                 $bool=1;
              }

        }
  if($bool==1){
  $query="insert into responses values($ntf_id,'$cnt_via','$contact','$res_date','$res_time')";
  $res=$con->query($query);
  if($res==true){
     $query=mysqli_query($con,"update notifications set status=$status ,ntf_status=1 where ntf_id=$ntf_id");
     echo "<script>alert('Request is approved successfully')</script>";
     echo "<script>location.assign('requestor_profile.php?uid=$ruser_id&ntfid=$ntf_id&bookid=$book_id')</script>";
   }
  } else{
     echo "<script>alert('You can not approve this book request because requesting user has already got three books in this month.')</script>";
     echo "<script>location.assign('requestor_profile.php?uid=$ruser_id&ntfid=$ntf_id&bookid=$book_id')</script>";   
  }  
}
 else{
  $ntf_id=$_GET['ntf_id'];
  $ruser_id=$_GET['uid'];
  $book_id=$_GET['bookid'];
  $res_date=date("Y-m-d");
  $res_time=date("H:i:sa");
  $status=2;
  $query="insert into responses(ntf_id,res_date,res_time) values($ntf_id,'$res_date','$res_time')";
  $res=$con->query($query);
  if($res==true){
   $query=mysqli_query($con,"update notifications set status=$status, ntf_status=1 where ntf_id=$ntf_id"); 
   echo "<script>alert('Request is rejected successfully!')</script>";
   echo "<script>location.assign('requestor_profile.php?uid=$ruser_id&ntfid=$ntf_id&bookid=$book_id')</script>";
  }
 }
?>

<html>
 <head>
 	<title>Approved</title>
 </head>
 <body>
  
 </body>
</html>