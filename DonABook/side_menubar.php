<?php
  require_once('db_connection.php');
  $user_id=$_SESSION['user_id'];
  $user_query=mysqli_query($con,"select * from members_table where user_id=$user_id");
  $row=mysqli_fetch_array($user_query);

?>

 <div class="sidebar-nav">
<div class="row profile">
		<div class="col-md-3" style="width: 100%">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?php echo $row['photo']; ?>" class="img-responsive" alt=""> 
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $row['fname']." ".$row['lname']; ?>
					</div>
					
				</div>
				<!-- END SIDEBAR USER TITLE -->

				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="user_profile.php">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="edit-details.php">
							<i class="glyphicon glyphicon-user"></i>
							Edit Details </a>
						</li>
						<li>
							<a href="user_profile_ads.php">
							<i class="glyphicon glyphicon-folder-open"></i>
							Manage my Ads </a>
						</li>
						<li>
							<a href="user_profile_messages.php">
							<i class="glyphicon glyphicon-envelope"></i>
							Message </a>
						</li>
						<li>
							<a href="user_profile_bookmarks.php">
							<i class="glyphicon glyphicon-floppy-disk"></i>
							Saved Searches </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->