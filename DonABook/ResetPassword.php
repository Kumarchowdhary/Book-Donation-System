<?php
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
	   if(isset($_POST['Email']))
	   {
	     $email=$_POST['Email'];
		 $question=$_POST['Question'];
		 $answer=$_POST['Answer'];
	     $sql="select email from members_table where email='$email' and question='$question' and answer='$answer'";
	     $result=mysqli_query($conn,$sql);
	     if ($result->num_rows > 0){
		     while($row = $result->fetch_assoc())
		     {
		       $emails=$row['email'];
		       echo $emails;
	         }
		  }
		 
		else{
				echo "<script>alert('Please provide valid email address.');</script>";
			   echo "<script>location.assign('forgetpass.php')</script>";
		}	
		  
	   }
	   if(isset($_POST['signup'])){
		    $pass=$_POST['password'];
		    $conpass=$_POST['conpassword'];
		    $email=$_POST['email'];
		   $encpass=SHA1($pass);
		   if($pass==$conpass){
		   	$sql="select email from members_table where email='$email'";
	        $result=mysqli_query($conn,$sql);
	        if($result->num_rows > 0){
		      $sql="update members_table set password='$encpass' where email='$email'";
			   if($conn->query($sql)==true) {
    			  echo "<script>alert('Password Updated successfully!');window.location='login.php'</script>";
				  //echo "<script>alert('update Password successfully');</script>";
				  //header('location:login.php');
			   }
			 }
			 
    	    }
			else{
				echo "<script>alert('Both Password Does Not Matched');window.location='forgetpass.html'</script>";
			}
		   
	   }
	   

?>