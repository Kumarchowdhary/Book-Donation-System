<?php
     require_once('db_connection.php');
	 require_once("pagination/function.php");
	 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	 $limit = 6; //if you want to dispaly 10 records per page then you have to change here
	 $startpoint = ($page * $limit) - $limit;
	 $statement = "books_ad_table"; 
     $res=mysqli_query($con,"select * from {$statement} order by rand() LIMIT {$startpoint} , {$limit}");
	 $results = array();
	 while($row = $res->fetch_assoc()){
				//$status = $row['status'];
                $photo = $row['photo'];
                //$userId = $row['user_id'];
				$adId = $row['ad_id'];
				//$ntfId=$row['ntf_id'];
				//$fname=$row['fname'];
				//$lname=$row['lname'];
				$title=$row['title'];
				$author=$row['author'];
				$description=$row['des'];
				//$ad_status=$row['ad_status'];
                $results[] = array("adId" => $adId, "photo" => $photo, "title" => $title, "author" => $author, "description" => $description);
			
			}
			header('Content-type:application/json');
            echo(json_encode($results));


	?>