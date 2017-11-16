<?php
	   session_start();
	   $userid=$_SESSION['user_id'];
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "fyp";
 
       // Create connection
 
       $conn = new mysqli($servername, $username, $password, $dbname);
	   if(isset($_GET['Status'])){
		   
		   $sql="update notifications set ntf_status=2 where ruser_id=$userid and ntf_status=1";
		   $bol=$conn->query($sql);
	   }
	   							 
	        $notif_query="select * from notifications where ntf_status=1 and ruser_id=$userid";
			$result=mysqli_query($conn,$notif_query);
			$count = $result->num_rows;
		    echo $count;
	 
	 
	
?>