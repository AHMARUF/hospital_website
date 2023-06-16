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

//back button 
if (isset($_POST['back'])) {
	header("location: doctor.php");
}
  //view Get id 
$DTd = $_SESSION['id'];
$insert=$mysqli->query("select * from doctor where id='$DTd'");
$fetcharry=$insert->fetch_array();
  	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- bootstrap css file link -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!-- custom css file link -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- jquery  cdn link -->
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
	<!-- fontawesome css file link -->
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
	<!-- <title>Admin Panel |jjjj</title> -->
</head>
<body>
	<div class="container-fluid mt-3">
		<div class="row">
			<div class="col-md-12">
				<div class="card border-0">
					<div class="card-header">
						<h5 class="card-title text-center">Doctor Information</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<center>
									<img src="../admin/<?php echo $fetcharry[12] ?>"  class="img-thumbnail" style=" height: 300px; width: 250px;"><br><br>
								<h3><?php echo $fetcharry[1] ?></h3>
								</center>
							</div>
							<div class="col-md-8">
								<table class="table table-borderless">
								  <tbody>
								    <tr>
								      <td>Email</td>
								      <td>
								      	<?php echo $fetcharry[2]; ?>
								      </td>
								    </tr>
								    <tr>
								      <td>password</td>
								      <td>----------</td>
								    </tr>
								    <tr>
								      <td>Designation</td>
								      <td>
								      	<?php echo $fetcharry[4]; ?>
								      </td>
								    </tr>
								    <tr>
								      <td>Department</td>
								      <td>
<?php 
$dId = $fetcharry[5];
$insert=$mysqli->query("select * from department where id='".$dId."'");
$fetcharry_d=$insert->fetch_array();
echo $fetcharry_d[1];
?>
								      </td>
								    </tr>
								    <tr>
								      <td>Address</td>
								      <td>
								      	<?php echo $fetcharry[6]; ?>
								      </td>
								    </tr>
								    <tr>
								      <td>Number</td>
								      <td>
								      	<?php echo $fetcharry[7]; ?>
								      </td>
								    </tr>
								    <tr>
								      <td>Date Of Birth</td>
								      <td>
								      	<?php echo $fetcharry[8]; ?>
								      </td>
								    </tr>
								    <tr>
								      <td>Gender</td>
								      <td>
								      	<?php 
								      		if ($fetcharry[9]==1) {
								      			echo "Male";
								      		}else{
								      			echo "Female";
								      		}
								      	?>
								      </td>
								    </tr>
								    <tr>
								      <td>Blood Group</td>
								      <td>
								      	<?php 
								      		if($fetcharry[10]==1){
								      			echo "A+";
								      		} 
								      		else if($fetcharry[10]==2){
								      			echo "A-";
								      		}
								      		else if($fetcharry[10]==3){
								      			echo "B+";
								      		}
								      		else if($fetcharry[10]==4){
								      			echo "B-";
								      		}
								      		else if($fetcharry[10]==5){
								      			echo "O+";
								      		}
								      		else if($fetcharry[10]==6){
								      			echo "O-";
								      		} 
								      		else if($fetcharry[10]==7){
								      			echo "AB+";
								      		}
								      		else if($fetcharry[10]==8){
								      			echo "AB-";
								      		}
								      		else{
								      			echo "NOT FOUND";
								      		} 
							       		?> 
								      </td>
								    </tr>
								    <tr>
								      <td>Education</td>
								      <td>
								      	<?php echo $fetcharry[11]; ?>
								      </td>
								    </tr>
								    <tr>
								      <td>Status</td>
								      <td>
								      	<?php 
						            		if ($fetcharry[13]==1) {
						            			echo "<span class='badge bg-success'>Active</span>";
						            		}else{
						            			echo "<span class='badge bg-danger'>Unactive</span>";
						            		}
						            	?>
								      </td>
								    </tr>
								    <tr>
								      <td>Create Date</td>
								      <td>
								      	<?php echo $fetcharry[14]; ?>
								      </td>
								    </tr>
								  </tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<form method="post">
							<button name="back" type="submit" class="btn btn-outline-secondary">Back</button>
							<button type="submit" onclick="window.print()" class="btn btn-outline-info">Print</button>
						</form>
					</div>
			    </div> 
		    </div>
		</div>
	</div>
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>


