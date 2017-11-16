<?php
  session_start();
  if(isset($_SESSION['user_id'])){
  	 require_once('db_connection.php');
	 $user_id=$_SESSION['user_id'];
	 $query=mysqli_query($con,"select fname,lname from members_table where user_id=$user_id");
	 $result=mysqli_fetch_assoc($query);
	 $username=$result['fname']." ".$result['lname'];
     $book_cats_query="select * from book_cats";
     $book_subcats_query="select * from book_subcats";
     $book_subcats_res=$con->query($book_subcats_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Don-A-Book | Submit ad</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/form-mini.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/Search-bar.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		
		<?php 
	        require_once 'header.php';
	        require_once 'search_bar.php'; ?>
	
		
	</header><!--/header-->
	
	<section id="form"><!--form-->
	
        <div class="form-mini-container">


            <h1>DETAILS FOR AD</h1>

            <form class="form-mini" enctype="multipart/form-data" action="index.php" method="POST"  autocomplete="on">

                <div class="form-row">
				<h4>Title</h4>
                    <input type="text" name="title" placeholder="">
                </div>
				
                <div class="form-row">
				<h4>Category</h4>
                    <label>
                        <select name="cat" style="height:45px;">
                        	<option>Category</option>
                        	<?php $book_cats_res=$con->query($book_cats_query);
                        	 while($row=$book_cats_res->fetch_assoc()){?>
                            <option value="<?php echo $row['cat_id'];?>" name="cat"><?php echo($row['cat_name']);?></option><?php } ?>
                        </select>
                    </label>
                </div>
                
				
				    <div class="form-row">
				<h4>Edition</h4>
                    <label>
                        <select name="edition">
                            <option>Mention Edition Number</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
							
                        </select>
                    </label>
                </div>
				
				<div class="form-row">
				<h4>Author</h4>
                    <input type="text" name="author" placeholder="">
                </div>
  
              <div class="form-row">
			  <h4>Copy</h4>
                    <div class="form-radio-buttons">

                        <div>
                            <label>
                                <input type="radio" name="copy" value="original">
                                <span>Original</span>
                            </label>
                        </div>

                        <div>
                            <label>
                                <input type="radio" name="copy" value="copy">
                                <span>Second Copy</span>
                            </label>
                        </div>


                    </div>
                </div>
				     <div class="form-row">
					 <h4>Condition</h4>
                    <div class="form-radio-buttons">

                        <div>
                            <label>
                                <input type="radio" name="condition" value="new">
                                <span>New</span>
                            </label>
                        </div>

                        <div>
                            <label>
                                <input type="radio" name="condition" value="old">
                                <span>Old</span>
                            </label>
                        </div>


                    </div>
                </div>
               <div class="form-row">
                <label>
                    <h4>Description</h4>
                    <textarea rows="7" cols="75" name="desc"></textarea>
                </label>
            </div>
                <div class="form-row form-last-row">
				    <input type="file" name="uploadedfile" value="Choose A File"><br>
                    <button type="submit" name="ad_submit">Post Ad</button>
                </div>

            </form>
        </div>
	</section><!--/form-->
	
	<?php	
require_once 'footer.php';
?>	
	 
	
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	
</body>
</html>
<?php } else{
   	echo "<script>location.assign('login.php')</script>";
   }?>