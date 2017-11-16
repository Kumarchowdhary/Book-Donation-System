<?php
  session_start();
  if(isset($_SESSION['user_id'])){
  	 require_once('db_connection.php');
	 $user_id=$_SESSION['user_id'];
	 $eid=$_GET['eid'];
	 $ad_update_query=mysqli_query($con,"select * FROM `books_ad_table` b INNER JOIN `book_cats` bc  ON b.cat_id=bc.`cat_id` AND           b.ad_id=$eid INNER JOIN `book_subcats` bsc ON b.subcat_id=bsc.`subcat_id`");
     $book_cats_query="select * from book_cats";
     $book_subcats_query="select * from book_subcats";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Don-A-Book | Edit ad</title>
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

            <form class="form-mini" enctype="multipart/form-data" action="update_ad.php?eid=<?php echo $eid;?>" method="POST"  autocomplete="on">
                <?php while($urow=$ad_update_query->fetch_assoc()){?> 
                <div class="form-row">
                <h4>Title</h4>
                    <input type="text" name="title" value="<?php echo $urow['title'];?>">
                </div>

                <div class="form-row">
                <h4>Category</h4>
                    <label>
                        <select name="cat" disabled>
                            <option>Category</option>
                            <?php $book_cats_res=$con->query($book_cats_query);
                             while($row=$book_cats_res->fetch_assoc()){
                                 if($urow['cat_name']==$row["cat_name"]){
                                ?>
                            <option value="<?php echo $row['cat_id'];?>" name="cat" selected><?php echo($row['cat_name']);?></option><?php } else{?>
                            <option value="<?php echo $row['cat_id'];?>" name="cat"><?php echo($row['cat_name']);?></option><?php } } ?>
                        </select>
                    </label>
                </div>
                
                <div class="form-row">
                <h4>Sub Category</h4>
                    <label>
                        <select name="subcat" disabled>
                            <option>Sub Category</option>
                            <?php 
                              $book_subcats_res=$con->query($book_subcats_query);
                              while($row=$book_subcats_res->fetch_assoc()){ if($urow['subcat_name']==$row["subcat_name"]){
                                ?>
                            <option value="<?php echo $row['subcat_id'] ;?>" selected><?php echo($row['subcat_name']);?></option><?php } else{?>
                            <option value="<?php echo $row['subcat_id'] ;?>"><?php echo($row['subcat_name']);?></option>
                            <?php } } ?>
                        </select>
                    </label>
                </div>
                
                    <div class="form-row">
                <h4>Edition</h4>
                    <label>
                        <select name="edition">
                            <option>Mention Edition Number</option>
                            <?php if($urow['edition']==1){?>
                            <option value="1" selected>1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4rth</option>
                            <?php } elseif($urow['edition']==2){?>
                            <option value="1">1st</option>
                            <option value="2" selected>2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4rth</option>
                            <?php } elseif($urow['edition']==3){?>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3" selected>3rd</option>
                            <option value="4">4rth</option>
                            <?php } elseif($urow['edition']==4){?>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4" selected>4rth</option><?php } ?>
                            
                        </select>
                    </label>
                </div>
                
                <div class="form-row">
                <h4>Author</h4>
                    <input type="text" name="author" value="<?php echo $urow['author'];?>">
                </div>
  
              <div class="form-row">
              <h4>Copy</h4>
                    <div class="form-radio-buttons">

                        <div>
                            <?php if($urow['copy']=="original"){?>
                            <label>
                                <input type="radio" name="copy" value="original" checked>
                                <span>Original</span>
                            </label>
                            <?php } else if($urow['copy']!="original"){ ?>
                            <label>
                                <input type="radio" name="copy" value="original" >
                                <span>Original</span>
                            </label>
                            <?php } else ?>
                         </div>

                       
                        <div>
                            <?php  if($urow['copy']=="copy"){ ?>
                            <label>
                                <input type="radio" name="copy" value="copy" checked>
                                <span>Second Copy</span>
                            </label>
                            <?php } else if($urow['copy']!="copy"){ ?>
                            <label>
                                <input type="radio" name="copy" value="copy">
                                <span>Second Copy</span>
                            </label>
                        </div>
                        <?php }?>


                    </div>
                </div>
                     <div class="form-row">
                     <h4>Condition</h4>
                    <div class="form-radio-buttons">

                        <div>
                            <?php  if($urow['cond']=="new"){ ?>
                            <label>
                                <input type="radio" name="condition" value="new" checked>
                                <span>New</span>
                            </label>
                            <?php } else if($urow['cond']!="new"){ ?>
                            <label>
                                <input type="radio" name="condition" value="new">
                                <span>New</span>
                            </label>
                            <?php } else ?>
                        </div>

                        <div>
                            <?php if($urow['cond']=="old"){ ?>
                            <label>
                                <input type="radio" name="condition" value="old" checked>
                                <span>Old</span>
                            </label>
                            <?php } else if($urow['cond']!="old"){ ?>
                            <label>
                                <input type="radio" name="condition" value="old">
                                <span>Old</span>
                            </label>
                            <?php } ?>
                        </div>


                    </div>
                </div>
               <div class="form-row">
                <label>
                    <h4>Description</h4>
                    <textarea rows="7" cols="35" name="desc" ><?php echo $urow['des'];?></textarea>
                </label>
            </div>
                <div class="form-row form-last-row">
                    <img src="<?php echo $urow['photo']; }?>" width="100px" height="150em">
                    <br><br>
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
    <script src="js/SignUpVerify.js"></script>
</body>
</html>
<?php } else{
    echo "<script>location.assign('login.html')</script>";
   }?>