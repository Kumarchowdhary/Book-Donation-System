<?php
      session_start();
      require_once('db_connection.php');
      if(isset($_POST['ad_submit'])){
          $title=$_POST['title'];
          $author=$_POST['author'];
          $edition=$_POST['edition'];
          $copy=$_POST['copy'];
          $condition=$_POST['condition'];
          $desc=$_POST['desc'];
          $cat_id=$_POST['cat'];
          $sub_cat_id=$_POST['subcat'];
          $user_id=$_SESSION['user_id'];
          if($sub_cat_id!=null && $title!=null && $cat_id!=null && $author!=null && $edition!=null && $copy!=null && $condition!=null && $desc!=null){
                 $target_name= "uploaded_files/";
                 $temp_path= $_FILES['uploadedfile']['tmp_name'];
                 $target_name= $target_name.$_FILES['uploadedfile']['name'];
                 $check = getimagesize($_FILES['uploadedfile']["tmp_name"]);
                 if(move_uploaded_file($temp_path, $target_name) && $check['mime']){
                 }   
                 else{
                      echo("<b>file is not an image</b>");
                 }
                 $book_photo=$target_name;
                 date_default_timezone_set("Asia/karachi");
                 $date=date('Y-m-d');
                 $time=date('H:i:sa');
                 $insert_query="insert into books_ad_table(title,author,edition,copy,cond,des,cat_id,subcat_id,user_id,photo,posting_date,posting_time) values('$title','$author','$edition','$copy','$condition','$desc',$cat_id,$sub_cat_id,$user_id,'$book_photo','$date','$time')";
                 if($con->query($insert_query)==false){
                          echo "Record not added";
                 }
          }
      }       
?>