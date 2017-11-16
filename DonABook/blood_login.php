<?php 
  // session_start();
   //if(isset($_SESSION['user_id'])) {
      //echo "<script>location.assign('index.php')</script>";}  
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
	<script src="js/jquery.js"></script>
	</head><!--/head-->

<body>
	<header id="header"><!--header-->
	<?php require_once 'public_header.php';?>	
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="validate_login.php" method="POST">
							<?php if(isset($_GET['bookid'])){?>
							<input type="hidden" name="bookid" value="<?php echo $_GET['bookid']; ?>"><?php }?>
							
							<input type="email" placeholder="Email Address"  name="email" id="email" required />
							<input type="password" placeholder="Password" name="pass"  id="pass" required/>
							<span>
								<a href="#" style="color:#e57373;" id="forgot"> Forgot Password?</a>
							</span>
							<button type="submit" class="btn btn-default" name="Login">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="blood_validate_login.php" onsubmit="return varify();" method="POST" >
						    <h5 id="error" style="color:red;margin-left:0px;"></h5>
							<input type="text"     required autocomplete="off"   name="firstname" id="first" placeholder="* First Name" />
							<input type="text"      required autocomplete="off"   name="lastname"  id="last"  placeholder="* Last Name" />
							<input type="email"     required autocomplete="off"   name="email"     id="email" placeholder="* Email Address" />
							<input type="password"  required autocomplete="off"   name="password"  id="password"  placeholder="* Password" />
							<input type="password"  required autocomplete="off"   name="conpassword" id="confrimpass" placeholder="* ConfirmPassword" />
							<input type="text"   required autocomplete="off"      name="city"        id="City"  placeholder="* City" />
							<input type="text"   required autocomplete="off"      name="contact"     id="contact" maxlength="12" placeholder="* Contact ( i.e  0331-XX78X90)" />
							<input type="text"   required autocomplete="off"      name="nic"         id="nic" maxlength="15"  placeholder="* NIC ( i.e   44106-XXXX662-1)"/>
							<!--<textarea rows="4" cols="10" required autocomplete="off"   name="address"   id="address"  ></textarea>-->
							<select name="gender">
							<option selected>---Selecte Gender---</option>
							<option value="male" >Male</option>
							<option value="female">Female</option>
							</select><br/><br/>
							<!--<textarea rows="30" cols="30" placeholder="* About You" name="about"  id="about" required></textarea><br><br>-->
							<select name="question">
							<option selected>Select Question</option>
							<option value="Who Is Your Favourite Uncle">Who is your favourite uncle?</option>
							<option value="What is Your Nick Name">What is your nick name?</option>
							<option value="Which is your Favourite Book">Which is your favourite book?</option>
							<option value="What is Your Pet Name">What is your pet name?</option>
							<option value="Who is your best friend">What is your best friend?</option>
							</select><br/><br/>
							<input type="text" name="answer" required placeholder="* Secret Answer">
							<select name="status" class="status">
							<option selected>Select Status</option>
							<option value="0">Donar</option>
							<option value="1">Reciever</option>
							</select><br/><br/>
							<input type="text" name="address" id="address" placeholder=" * Residence Address" required>
							<button type="submit" class="btn btn-default" name="signup">Signup</button>
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
	<script src="js/blood_SignUpVerify.js"></script>
	<script src="js/blood_valid.js"></script>
	
</body>
</html>