<?php
	
	include "db_connection.php";
	session_start();
	$user_id=$_SESSION['user_id'];
	$result = mysqli_query($con,"SELECT fname,lname,email,contact,password,photo,city,aboutme FROM members_table  where user_id='$user_id'");
	$row=mysqli_fetch_array($result);
		 $firstName=$row['fname'];
		 $lastName=$row['lname'];
		 $email=$row['email'];
		 $password=$row['password'];
		 $contact=$row['contact'];
		 $path=$row['photo'];
		 $city=$row['city'];
		 $aboutme=$row['aboutme'];
	?>

<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/sidebar.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
	<link href="css/Search-bar.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="lib/bootstrap/css/sidebar.css" rel="stylesheet">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

    

    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

</head>
<body>


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  
		<?php require_once('header.php');
          require_once('search_bar.php');
          require_once('side_menubar.php');?>
 

  	
	
	</header><!--/header-->
			</div>
		</div>
	  </div>
    </div>

    <div class="content">
        <div class="header">
            
            <h1 class="page-title">Edit User</h1>
                    <ul class="breadcrumb">
            <li><a href="index.php" style="font-size: 17px;">Home</a> </li>
            <li><a href="edit-details.php" style="font-size: 17px;">Edit details</a> </li>
            <li class="active" style="font-size: 17px;"><?php echo $row['fname']." ".$row['lname'];?></li>
        </ul>

        </div>
        <div class="main-content">
            
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
  <li><a href="#profile" data-toggle="tab">Change Password</a></li>
</ul>

<div class="row">
  <div class="col-md-4">
    <br>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      <form id="tab" action="validate_login.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
		<label>First Name</label>
		<input type="text" name="fname" value="<?php echo $firstName;?>" class="form-control">
        </div>
        <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="lname" value="<?php echo $lastName;?>" class="form-control">
        </div>
		<div>
		<label>Contact No</label>
        <input type="text" name="contact" value="<?php echo $contact;?>" class="form-control">
        </div>
		<br>
		<div>
		<label>City</label>
        <input type="text" name="city"  class="form-control" value="<?php echo $city;?>">
        </div><br>
		<div>
		<label>About</label>
        <textarea cols="6" rows="4" name="des"><?php echo $aboutme?></textarea>
        </div>
		 <div class="btn-toolbar list-toolbar">
         <button class="btn btn-primary" type="submit" name="update"><i class="fa fa-save"></i> Save</button>
         </div>
		 <div id="upload" style="margin-left:530px;margin-top:-460px;">
			<div class="form-group">
				<img src="<?php echo $path;?>" style="width:235px; height:300px;border-radius:2px;">
			</div>
			<div class="form-group">
				<input type="file" name="fileUpload" id="fileupload">
			</div>
			 <div class="btn-toolbar list-toolbar">
              <button class="btn btn-primary" type="submit" name="fileupload"> upload</button>
            </div>
		 </div>
        </form>
      </div>
	  

      <div class="tab-pane fade" id="profile">

        <form id="tab2" action="validate_login.php" method="post">
          <div class="form-group">
            <!--<label>Current Password</label>
            <input type="password" class="form-control" name="currentpass"><br>-->
			<label>New Password</label>
            <input type="password" class="form-control" name="newpass"><br>
			<label>Re-type Password</label>
            <input type="password" class="form-control" name="repass"><br>
          </div>
          <div>
              <button  type="submit" name="passupdate" class="btn btn-primary">UpdatePassword</button>
          </div>
        </form>
      </div>
    </div>

    
  </div>
</div>

<div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
      </div>
      <div class="modal-body">
        
        <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete the user?</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
      </div>
    </div>
  </div>
</div>


        </div>
    </div>

		<?php	
require_once 'footer.php';
?>	
	 
	
	
	
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
</body>
</html>
