<?php
	   session_start();
	   require_once('db_connection.php');
	  function valid($con,$fname,$lname,$email,$password,$contact,$gender,$photo,$nic,$time,$date,$city,$about,$question,$answer)
	  {
	  	$encpass=SHA1($password);
		$query="select * from members_table where email='$email' and nic='$nic'";
		$result=$con->query($query);
  		if ($result->num_rows>0){
  			echo "<script>alert('This user already exists.')</script>";
  		}
		else{
			 $query="insert into members_table(fname,lname,email,gender,password,contact,photo,time,date,nic,city,aboutme,question,answer)Values('$fname','$lname','$email','$gender','$encpass','$contact','$photo','$time','$date','$nic','$city','$about','$question','$answer')";
			 if($con->query($query)==true){
    			echo "<script>alert('Account created successfully, kindly verify your account, to access this.');</script>";
    		    echo "<script>location.assign('login.php')</script>";
    		}		 
		}
	}

	if(isset($_POST['signup'])){
		
		 $fname=$_POST['firstname'];
		 $lname=$_POST['lastname'];
		 $email=$_POST['email'];
		 $password=$_POST['password'];
		 $contact=$_POST['contact'];
		 $gender=$_POST['gender'];
		 $question=$_POST['question'];
		 $answer=$_POST['answer'];
		 $city=$_POST['city'];
		 $photo="";
		 $nic=$_POST['nic'];
		 $about=$_POST['about'];
		 
		 date_default_timezone_set("Asia/karachi");
		 $time=date('h:i:sa');
		 $date=date('Y-m-d');
         if($gender=='male'){
         	$photo="uploaded_files/male_icon.png";
         }
         else{
         	$photo="uploaded_files/female_icon.png";
         }
  		 valid($con,$fname,$lname,$email,$password,$contact,$gender,$photo,$nic,$time,$date,$city,$about,$question,$answer);
  		 
	}
	else if(isset($_POST['Login'])){
	    $email=$_POST['email'];
	    $pass=$_POST['pass'];
	    $encpass=SHA1($pass);
	    $result=$con->query("select user_id,email,password from members_table where email='$email' and password='$encpass'");
        if(mysqli_num_rows($result)==1){
         while($row=$result->fetch_assoc()){
			$_SESSION['user_id']=$row['user_id'];
			
			echo("<script>location.assign('index.php')</script>");
         }
        }
       else{
         echo("<script>alert('Please enter correct email/password')</script>");
         echo("<script>location.assign('login.php')</script>");
       }
         
     }
	 else if(isset($_POST['update'])){
		  $user_id=$_SESSION['user_id'];
		  $fname=$_POST['fname'];
		  $lname=$_POST['lname'];
		  //$email=$_POST['email'];
		  $city=$_POST['city'];
		  $contact=$_POST['contact'];
		  $aboutme=$_POST['des'];
		  $sql="update members_table set fname='$fname',lname='$lname',contact='$contact',city='$city',aboutme='$aboutme'where user_id='$user_id'";
			 if($con->query($sql)==true) {
    			echo "<script>alert('update record  successfully!')</script>";
				echo("<script>location.assign('user_profile.php')</script>");
				
    		}
	 }
	 else if(isset($_POST['fileupload']))
	 {
		 include 'db_connection.php';
		 $user_id=$_SESSION['user_id'];
	     $targetfolder = "uploaded_files/";
         $targetfolder = $targetfolder . basename( $_FILES["fileUpload"]["name"]) ;
		 //$tmp_name = $_FILES["fileUpload"]["tmp_name"];
        if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetfolder))
       {
	     //echo "The file ". basename( $_FILES['fileUpload']['name']). " is uploaded";
		 $sql="update members_table set photo='$targetfolder' where user_id='$user_id'";
		 if ($con->query($sql) === TRUE) {
               header('location:user_profile.php');
         } else {
                echo "Error updating record: " . $conn->error;
            }

       }
       else{
          echo "Problem uploading file";
        } 
	}
	else if(isset($_POST['passupdate'])){
		include 'db_connection.php';
		 $user_id=$_SESSION['user_id'];
		 $newpass=$_POST['newpass'];
		 $encpass=SHA1($newpass);
			$sql="update members_table set password='$encpass' where user_id='$user_id'";
			if($con->query($sql)==true) {
    			echo "<script>alert('Password successfully changed')</script>";
				header('location:user_profile.php');
    		}
	}
	
?>