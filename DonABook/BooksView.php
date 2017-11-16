<?php
          session_start();  
          require_once('db_connection.php');
          if($_GET['bookid']!=null){
          	$bool=false;
			$book_id=$_GET['bookid'];
          	$select_query="select * from members_table m inner join books_ad_table b on m.user_id=b.user_id where b.ad_id=$book_id";
            $res=$con->query($select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Don-A-Book | Details</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/BooksView.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/Search-bar.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

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
	<?php if(isset($_SESSION['user_id'])){
	        require_once 'header.php';
          }
          else {
            require_once 'public_header.php';  	
          }
		 ?>
       <section style="margin-top:45px;">
       </section>
       <?php	   
	      require_once 'categories.php';?>
				
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
                                <?php while($row=$res->fetch_assoc()){ ?>
								<img id="zoom_05" src="<?php echo $row['photo']; ?>" alt="" data-zoom-image="images/product-details/1.jpg"/>
								
							</div>


						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2 style="margin-top: -35px;"><?php echo $row['title']; ?></h2>
								<p>Posted on <?php $date=date_create($row['posting_date']); 
								       echo date_format($date,"d/m/Y"); ?></p>
								       <span style=" border: 1px solid #f5f5f5; width: 95%; height: 1; margin-top: 3px; ">
									
								</span>
								 <p><b style="font-size: 17px;">Author:</b><?php echo "   ". $row['author']; ?></p>      
								<p><b style="font-size: 17px;">Edition:</b><?php echo "   ".$row['edition']; ?></p>
								<p><b style="font-size: 17px;">Condition:</b><?php echo "   ".$row['cond']; ?></p>              
								
								<span style=" border: 1px solid #f5f5f5; width: 95%; height: 1; margin-top: 3px; ">
									
								</span>
								<h2 style="margin-top: 3px;">Contact details</h2>
								
								<form id="email-contact-form" class="email-form" name="user_message.php" method="post">
								<p><?php echo strtoupper($row['fname'])." ".strtoupper($row['lname']); ?></p>
								
								<p><b style="font-size: 17px;">Email:</b> <?php echo "   ". substr($row['email'],0,8)."XXXXXXXX"; ?></p>
								
								<p><b style="font-size: 17px;">Contact: </b> <?php echo "   ". substr($row['contact'],0,4)."XXXXXXXX"; ?></p>
								
								</form>
								
								<span style=" border: 1px solid #f5f5f5; width: 95%; height: 1; margin-top: 7px; ">
									
								</span>
								
				                <span>
								    <?php if(isset($_SESSION['user_id'])){
									    $user_id=$_SESSION['user_id'];
									    $send_msg_query="select * from books_ad_table where user_id=$user_id and ad_id=$book_id"; 
                                        $send_msg_res=$con->query($send_msg_query);
                                        while($sm_row=$send_msg_res->fetch_assoc()){
            	                        $bool=true;
                                         }
									     if($bool==false){ ?><a href="MessagePage.php?bookid=<?php echo $book_id;?>&uid=<?php echo $row['user_id'];?>"><button type="button" class="btn btn-fefault cart" style="margin-top: 40px; width: 390px;">
									     <i class="glyphicon glyphicon-envelope"></i>
										Message
									</button></a><?php }?>
								</span>

								<?php } else{?>
                                              <a href="login.php?bookid=<?php echo $book_id;?>"><button type="button" class="btn btn-fefault cart" style="margin-top: 40px; width: 390px;">
									          <i class="glyphicon glyphicon-envelope"></i>
										     Message
								  	        </button></a><?php }?>
								</span> 
								    
							</div><!--/product-information-->
					   </div>
			    </div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li ><a href="#" data-toggle="tab" style="font-size:20px;">Description</a></li>
								
							</ul>
						</div>
						<div class="tab-content" style="font-size:18px;"><?php echo $row['des'];?></div>
					</div>
						<?php 
							         } } ?>
										

							
							
							
				
					
					
					
				
	</section>
	
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