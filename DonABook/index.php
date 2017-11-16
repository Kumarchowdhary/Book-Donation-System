<?php
   session_start();
     require_once('insert_ad.php');
     require_once('db_connection.php');
	 require_once("pagination/function.php");
	 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	 $limit = 9; //if you want to dispaly 10 records per page then you have to change here
	 $startpoint = ($page * $limit) - $limit;
	 $statement = "books_ad_table"; 
     $res=mysqli_query($con,"select * from {$statement}  where ad_status=1 LIMIT {$startpoint} , {$limit}");
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
	<link rel="stylesheet" href="css/jquery-ui.theme.css">
	<link rel="stylesheet" href="lib/bootstrap/css/sidebar.css">
	
	
	
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	
	
	
	
	
</head><!--/head-->

<body>

	<?php 
	      if(isset($_SESSION['user_id'])){
	      	$user_id=$_SESSION['user_id'];
	        require_once 'header.php';
          }
          else {
            require_once 'public_header.php';  	
          }
	      require_once 'search_bar.php';
	      require_once 'slider.php';
	      require_once 'categories.php';?>		
				
				

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php while($row=mysqli_fetch_array($res))
	                    { if($row['ad_status']==1){ ?>						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
				                          <a href="BooksView.php?bookid=<?php echo $row['ad_id']?>" > <img src="<?php echo $row['photo']; ?>" alt="" width="255px" height="237px"/> <a/>
											
											<h2><?php echo $row['title'];?></h2>
											<h2 style="font-size:13px;">By: <?php echo $row['author'];?></h2>
										
										</div>
										<!--
										<div class="product-overlay">
											<div class="overlay-content">
											    <p><center>DESCRIPTION</center><br/><?php echo $row['des'];?><p>
												<h3><a class="ex1" href="BooksView.php?bookid=<?php echo $row['ad_id']?>">More Details </a></h3>
												
											</div>
										</div>
										-->
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="bookmarks.php?bkmark=<?php echo $row['ad_id']?>"><i class="fa fa-plus-square"></i>Bookmark</a></li>
										
									</ul>
								</div>
							</div>
						</div>
						<?php } } ?>
						
					</div><!--features_items-->
					<div>
					<ul class="pagination">
					<?php
                        echo pagination($statement,$limit,$page);
                    ?>
					</ul>
					
					<div>
					
					<?php if(isset($_SESSION['user_id'])){ ?>
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">Favourites</a></li>
								<li><a href="#sunglass" data-toggle="tab">Recomended</a></li>	
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<?php
								   	$user_id=$_SESSION['user_id'];
                                    $fav_query=mysqli_query($con,"select ad.photo,ad.title,ad.ad_id,ad.ad_status from bookmarks b inner join books_ad_table ad on b.ad_id=ad.ad_id where b.user_id=$user_id order by rand() "); 
								    if(mysqli_num_rows($fav_query)>0){
                                        while($row=mysqli_fetch_array($fav_query)){
                                        	if($row['ad_status']==1){
									?>	
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="<?php echo $row['photo']; ?>" alt="" />
											
												<p><?php echo $row['title']; ?></p>
															<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="BooksView.php?bookid=<?php echo $row['ad_id']; ?>"><i class="fa fa-plus-square"></i>Want It</a></li>
										
									</ul>
								    </div>
											</div>
										</div>
									</div>
								</div>
								<?php } else if($row['ad_status']==0){ ?>
                                 
                                <div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="<?php echo $row['photo']; ?>" alt="" />
											
												<p><?php echo $row['title']; ?></p>
															<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="BooksView.php?bookid=<?php echo $row['ad_id']; ?>" onclick="return false;"><i class="fa fa-plus-square"></i>Want It</a></li>
										
									</ul>
								    </div>
											</div>
										</div>
									</div>
								</div>

								 <?php } } } else{ echo "<center><h1>Favourite List is empty</h1><center>"; } ?>      
							</div>
							
							</div>
						</div>
					</div><!--/category-tab-->
				    <?php } ?>
					
				
			</div>
		</div>
		</div>
	</section>
	
	
	<?php	
require_once 'footer.php';
?>		
	
	  
	<script src="js/looking.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	
</body>
</html>