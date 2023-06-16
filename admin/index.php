<?php
// Include config file
require_once "../config.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//settings
$insert=$mysqli->query("select * from settings where id='1'");
$fetcharry=$insert->fetch_array();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo $fetcharry[13]; ?>" type="image/gif" sizes="32x32">
	<!-- bootstrap css file link -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!-- custom css file link -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- jquery  cdn link -->
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
	<!-- fontawesome css file link -->
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
	<title><?php echo $fetcharry[1]; ?> | Admin Panel</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col bg-light border-bottom py-3 fixed-top">
				<div class="row">
					<div class="col-md-4 col-sm-6 col-6">
						<img src="<?php echo $fetcharry[12]; ?>" class="img-fluid logo">
					</div>
					<div class="col-md-8 col-sm-6 col-6 text-right">
						<div class="dropdown" style="float:right;">
							<img src="<?php echo $fetcharry[13]; ?>" class="dropbtn">
						  <div class="dropdown-content">
						  <a href="change.php" target="dispaly"><i class="fas fa-cog"></i> Password change</a>
						  <a href="logout.php"><i class="fas fa-sign-out-alt"></i> logout</a>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<!-- left side  -->
			<div class="col-md-2" style="margin-top: 6rem;">
				<div class="list-group list-group-flush">
	            	<a href="dashboard.php" target="dispaly" class="list-group-item list-group-item-action active rounded-0">
	              		Dashboard
	            	</a>
	            	<a href="department.php" target="dispaly" style="text-decoration: none" class="list-group-item list-group-item-action">
	            		Department
	          		</a>
	          		<a href="doctor.php" target="dispaly" style="text-decoration: none" class="list-group-item list-group-item-action">
	              		Dotors
	          		</a>
	              	<a href="patient.php" target="dispaly"  style="text-decoration: none" class="list-group-item list-group-item-action">
	              		Patient
	            	</a>
	            	<a href="appointment.php" target="dispaly"  style="text-decoration: none" class="list-group-item list-group-item-action">
	              		Appointment
	            	</a>
	            	<a href="blog.php" target="dispaly"  style="text-decoration: none" class="list-group-item list-group-item-action">
	              		Blogs
	            	</a>
	            	<a href="messages.php" target="dispaly"  style="text-decoration: none" class="list-group-item list-group-item-action">
	            		Messages
	            	</a>
	             	<a href="setting.php" target="dispaly"  style="text-decoration: none" class="list-group-item list-group-item-action">
	            		Setting
	            	</a>
	          	</div>
			</div>
			<!-- end left side-->
			<!-- right side -->
			<div class="col-md-10 main-body">
				<iframe src="dashboard.php" style="height: 530px;width: 100%; border: none;" name="dispaly"></iframe>
			</div>
			<!--end right side -->
			<!-- footer -->
			<div class="col-md-12 fixed-bottom bg-dark py-2 text-center text-white">
				Created By DREAM-IT | All Rights Reserved
			</div>
			<!--footer-->
		</div>
	</div>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>

