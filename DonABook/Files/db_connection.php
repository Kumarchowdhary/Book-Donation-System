<?php
   $servername="localhost";
   $username="root";
   $password="";
   $db="fyp";
   $con=mysqli_connect($servername,$username,$password,$db);
   if(mysqli_connect_error()){
       echo "Connection Failed: ".mysqli_connect_error();
   }
?>   