<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fyp";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$email=$_GET['email'];
	$emails="";
	$sql="select email from members_table where email='$email'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0){
	while($row = $result->fetch_assoc())
	{
	    $emails=$row['email'];

	}
}
	else{
			echo "<script>alert('sorry your are not member of our system');</script>";
			echo "<script>location.assign('login.php')</script>";
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Don-A-Book | Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/main2.css" rel="stylesheet">
	<link href="css/Search-bar.css" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery-ui.theme.css">
	
	
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script src="js/jquery.js"></script>
	
	</head><!--/head-->

<body>
	<header id="header"><!--header-->
	<?php require_once 'public_header.php';?>	
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1" style="margin-left:350px;">
					<div class="login-form" id="login"><!--login form-->
							<input type="email" placeholder="Email Address"  id="email" value="<?php echo $emails;?>" disabled/>
							<select name="question" id="question">
							<option selected>Select Question</option>
							<option value="Who Is Your Favourite Uncle">Who is your favourite uncle?</option>
							<option value="What is Your Nick Name">What is your nick name?</option>
							<option value="Which is your Favourite Book">Which is your favourite book?</option>
							<option value="What is Your Pet Name">What is your pet name?</option>
							<option value="Who is your best friend">Who is your best friend?</option>
							</select><br><br>
							<input type="text" name="answer" required placeholder="* Secret Answer" id="answer">
							<button  class="btn btn-default"  style="margin-left:130px;" id="confrim">Confirm</button>
						
					</div><!--/login form-->
				</div>
				</div>
				</div>
				
				<div class="container">
			    <div class="row">
				<div class="col-sm-4" style="margin-top:20px;margin-left:350px;">
				
					<div class="signup-form" id="sign"><!--sign up form-->
						<form action="ResetPassword.php"  method="POST" >
						    <h5 id="error" style="color:red;margin-left:0px;"></h5>
							<input type="email" placeholder="Email Address" name="email"  id="emails" required autocomplete="off"  value="<?php echo $emails;?>"/>
							<input type="password"  required autocomplete="off"   name="password"  id="password"  placeholder="Password" />
							<input type="password"  required autocomplete="off"   name="conpassword" id="confrimpass" placeholder="ConfirmPassword" />
							<button type="submit" class="btn btn-default" name="signup" style="margin-left:100px;">Reset Password</button>
					   
					</form>
					
					</div><!--/sign up form-->
				</div>
				</div>
				</div>
				
				
			
		
	</section><!--/form-->
    
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>	
	<script src="js/SignUpVerify.js"></script>
	<script src="js/forgetpass.js"></script>
	
</body>
</html>