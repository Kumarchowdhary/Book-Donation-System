<?php
       session_start();
       require_once('db_connection.php');
       if(isset($_SESSION['user_id'])){
        if(isset($_POST['ad_submit'])){
          $title=$_POST['title'];
          $author=$_POST['author'];
          $edition=$_POST['edition'];
          $copy=$_POST['copy'];
          $condition=$_POST['condition'];
          $desc=$_POST['desc'];
          //$cat_id=$_POST['cat'];
          //$sub_cat_id=$_POST['subcat'];
          $eid=$_GET['eid'];
          $user_id=$_SESSION['user_id'];
          if( $title!=null && $author!=null && $copy!=null && $condition!=null && $desc!=null & $edition!=null){
                 //if(is_uploaded_file($_FILES['uploadedfile']['tmp_name'])){
                 //$target_name= "uploaded_files/";
                 //$temp_path= $_FILES['uploadedfile']['tmp_name'];
                 //$target_name= $target_name.$_FILES['uploadedfile']['name'];
                 //$check = getimagesize($_FILES['uploadedfile']["tmp_name"]);
                 //if(move_uploaded_file($temp_path, $target_name) && $check['mime']){
                 //}   
                 //else{
                  //    echo("<b>file is not an image</b>");
                 //}
                 //$book_photo=$target_name;
                 $update_query="update books_ad_table set title='$title',author='$author',
                 copy='$copy',cond='$condition',des='$desc', edition=$edition,
                 user_id=$user_id where ad_id=$eid";
                 if($con->query($update_query)==false){
                          echo "Record not updated";
                 }
                 else{
              	  echo "<script>alert('Your book ad updated successfully!')</script>";
                  echo "<script>location.assign('user_profile_ads.php')</script>";
              }
              //}
              //else{
              	// $update_query="update books_ad_table set title='$title',author='$author',
                // edition='$edition',copy='$copy',cond='$condition',des='$desc',
                 //cat_id=$cat_id,subcat_id=$sub_cat_id,user_id=$user_id where ad_id=$eid";
                 //if($con->query($update_query)==false){
                 //         echo "Record not updated";
              
               //}
            }
               else{
                  echo "<script>alert('Your book ad updated successfully!')</script>";
              	  echo "<script>location.assign('user_profile_ads.php')</script>";
              }

          }
      }  

 //   }     
//}
else{
 echo "<script>location.assign('login.php')</script>";
}
?>