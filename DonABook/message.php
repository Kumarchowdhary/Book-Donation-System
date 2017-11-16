<?php
	   session_start();
	   $userid=$_SESSION['user_id'];
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "fyp";
 
       // Create connection
 
       $conn = new mysqli($servername, $username, $password, $dbname);
       // Check connection
       if ($conn->connect_error) {
 
           die("Connection failed: " . $conn->connect_error);
       } 
	   
	   if(isset($_GET['Status'])){
		   
		   $sql="update notifications set msg_status=0 where user_id=$userid";
		   $bol=$conn->query($sql);
	   }
 
       //$sql = mysqli_query($conn,"select * from notifications where user_id=$userid");
       //$result = $conn->query($sql);
       //$row = $result->fetch_assoc();
	   $sql="select * from notifications where user_id=$userid and msg_status=1";
       $result=mysqli_query($conn,$sql);
       $count = $result->num_rows;
       echo $count;
       $conn->close();
?>
 