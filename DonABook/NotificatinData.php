<?php
	   session_start();
	   $userid=$_SESSION['user_id'];
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "fyp";
 
       // Create connection
 
       $conn = new mysqli($servername, $username, $password, $dbname);
	   $notif_query="select m.user_id,m.photo,m.fname,m.lname,b.ad_status,b.title,b.ad_id,n.ntf_id,n.status 
                                     FROM books_ad_table b INNER JOIN notifications n ON b.ad_id=n.ad_id AND n.`ruser_id`=$userid
                                     AND (n.status=1 || n.status=2 || b.ad_status=2 || b.ad_status=0)
                                     INNER JOIN members_table m ON m.`user_id`=n.`user_id` where ntf_status=1 || ntf_status=2 order by n.ntf_id desc";
			/*select m.user_id,m.photo,m.fname,m.lname,b.title,b.ad_id,n.ntf_id,r.status FROM responses r 
            INNER JOIN notifications n ON r.`ntf_id`=n.`ntf_id` AND n.`ruser_id`=$userid 
            INNER JOIN members_table m ON m.`user_id`=n.`user_id`
            INNER JOIN books_ad_table b ON b.`ad_id`=n.`ad_id`";*/
	        $result=mysqli_query($conn,$notif_query);
			$results = array();
			while($row = $result->fetch_assoc()){
				$status = $row['status'];
                $photo = $row['photo'];
                $userId = $row['user_id'];
				$adId = $row['ad_id'];
				$ntfId=$row['ntf_id'];
				$fname=$row['fname'];
				$lname=$row['lname'];
				$title=$row['title'];
				$ad_status=$row['ad_status'];
                $results[] = array("status" => $status, "photo" => $photo, "userId" => $userId, "adId" => $adId, "ntfId" => $ntfId, "fname" => $fname, "lname" => $lname,"title" => $title, "adstatus" => $ad_status);
			
			}
			header('Content-type:application/json');
            echo(json_encode($results));
				//$notify_data[]= array("status"=>$row['status'],"photo"=>$row['photo'],"userId"=>$row['user_id'],"adId"=>$row['ad_id'],"ntfId"=>$row['ntf_id'],"fname"=>$row['fname'],"lname"=>$row['lname'],"title"=>$row['title']);  
				//$notify_data[]= array("status"=>$row['status'],"photo"=>$row['photo'],"userId"=>$row['user_id'],"adId"=>$row['ad_id'],"ntfId"=>$row['ntf_id'],"fname"=>$row['fname'],"lname"=>$row['lname'],"title"=>$row['title']);
				/*echo $prefix . " {\n";
                echo '  "status": "' . $row['status'] . '",' . "\n";
                echo '  "photo": ' . '"' .  $row['photo'] . '"'  . ',' . "\n";
                echo '  "userId": ' . '"' .  $row['user_id'] . '"' . "\n";
                echo '  "adId": ' . '"' .  $row['ad_id'] . '"' . "\n";
                echo '  "ntfId": ' . '"' . $row['ntf_id']  . '"' . "\n";
                echo '  "fname": ' . '"' .  $row['fname'] . '"' . "\n";
                echo '  "lname": ' . '"' .  $row['lname'] . '"' . "\n";
                echo '  "Title": ' . '"' .  $row['title'] . '"' . "\n";
                echo " }";
                $prefix = ",\n";
            
           echo "]";*/

