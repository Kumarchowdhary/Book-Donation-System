<?php
	    //$user_id=$_SESSION['user_id'];
		$result = mysqli_query($con,"SELECT m.fname,m.lname,m.email,m.contact,img.path FROM members_table m INNER JOIN image img ON m.member_id=img.member_id ");
	    while($row = $result->fetch_assoc()){
		 $firstName=$row['fname'];
		 $lastName=$row['lname'];
		 $email=$row['email'];
		// $password=$row['password'];
		 $contact=$row['contact'];
		 $path=$row['path'];
	}
?>