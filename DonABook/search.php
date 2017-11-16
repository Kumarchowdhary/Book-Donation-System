<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'fyp';
$con = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
$keyword = $_GET['keyword'];

if($_GET['Looking']=="looking"){
  if(isset($keyword)){
	  $result = mysqli_query($con,"SELECT DISTINCT title  FROM books_ad_table  WHERE title LIKE '%".$keyword."%'");
      while($row = $result->fetch_assoc()){
	  // put in bold the written text
	     $title = str_replace($_GET['keyword'], '<b>'.$_GET['keyword'].'</b>', $row['title']);
	     // add new option
		 //echo json_encode($title);
		 echo '<li  style=text-align:left; class="list-group-item"  onclick="set_looking(\''.str_replace("'", "\'", $row['title']).'\')">'.$title.'</li>';
       }
	}
	}


else if($_GET['Looking']=="location"){
  if(isset($keyword)){
	  $result = mysqli_query($con,"SELECT city  FROM members_table  WHERE city LIKE '%".$keyword."%'");
      while($row = $result->fetch_assoc()){
	  // put in bold the written text
	     $city = str_replace($_GET['keyword'], '<b>'.$_GET['keyword'].'</b>', $row['city']);
	     // add new option
         echo '<li style=text-align:left class="list-group-item"  onclick="set_location(\''.str_replace("'", "\'", $row['city']).'\')">'.$city.'</li>';
       }
	}
}
?>
