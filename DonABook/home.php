<?php
     if(isset($_SESSION[user_id])){
     	header("location: index.php");
     }
     else{
     require_once('insert_ad.php');
     require_once('db_connection.php');
	 require_once("pagination/function.php");
	 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	 $limit = 6; //if you want to dispaly 10 records per page then you have to change here
	 $startpoint = ($page * $limit) - $limit;
	 $statement = "books_ad_table"; 
     $res=mysqli_query($con,"select * from {$statement} order by rand() LIMIT {$startpoint} , {$limit}");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Don-A-Book | Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
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
	<?php 
	      require_once 'public_header.php';
	      require_once 'search_bar.php';
	      require_once 'slider.php';
	      require_once 'categories.php';?>		
				</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php while($row=mysqli_fetch_array($res))
	                    { ?>						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
				                            <img src="<?php echo $row['photo']; ?>" alt="" width="255px" height="237px"/>
											
											<p><h2><?php echo $row['title'];?></h2><p>
											<p><h2 style="font-size:13px;">By: <?php echo $row['author'];?></h2></p>
										
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
											    <p><center>DESCRIPTION</center><br/><?php echo $row['des'];?><p>
												<h3><a class="ex1" href="BooksView.php?bookid=<?php echo $row['ad_id']?>">More Details </a></h3>
												
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="bookmarks.php?bkmark=<?php echo $row['ad_id']?>"><i class="fa fa-plus-square"></i>Bookmark</a></li>
										
									</ul>
								</div>
							</div>
						</div>
						<?php } ?>
					</div><!--features_items-->
					
					<ul class="pagination">
					<?php
                        echo pagination($statement,$limit,$page);
                    ?>
					</ul>
			</div>
		</div>
		</div>
	</section>
	
	<?php	
require_once 'footer.php';
?>	
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php } ?>