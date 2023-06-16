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
			<div class="col-md-3 pt-2">
				<div class="card">
				  <div class="card-body">
				  	<div class="row">
				  		<div class="col-md-6 col-sm-6 col-6">
				  			<h5 class="card-title">Doctors</h5>
					  	</div>
<?php 
$count=$mysqli->query("SELECT * FROM doctor");
$i=0;
while ($count->fetch_array()) {
	$i++;
}
?>
					  	<div class="col-md-6 col-sm-6 col-6">
					  		<h5 class="card-title text-right"><?php echo $i ?> +</h5>
					  	</div>
				  	</div>
				    <img src="../img/chart.png" class="card-img" alt="">
				  </div>
				</div>
			</div>
			<div class="col-md-3 pt-2">
				<div class="card">
				  <div class="card-body">
				  	<div class="row">
				  		<div class="col-md-6 col-sm-6 col-6">
				  			<h5 class="card-title">Patient</h5>
					  	</div>
					  	<?php 
$count=$mysqli->query("SELECT * FROM patient");
	$i=0;
								while ($count->fetch_array()) {
									$i++;
								}
					  		?>
					  	<div class="col-md-6 col-sm-6 col-6">
					  		<h5 class="card-title text-right"><?php echo $i ?> +</h5>
					  	</div>
				  	</div>
				    <img src="../img/chart.png" class="card-img" alt="">
				  </div>
				</div>
			</div>
			<div class="col-md-3 pt-2">
				<div class="card">
				  <div class="card-body">
				  	<div class="row">
				  		<div class="col-md-7 col-sm-7 col-7">
				  			<h5 class="card-title">Messages</h5>
					  	</div>
					  	<?php 
$count=$mysqli->query("SELECT * FROM contacts");
$i=0;
while ($count->fetch_array()) {
									$i++;
								}
					  		?>
					  	<div class="col-md-5 col-sm-5 col-5">
					  		<h5 class="card-title text-right"><?php echo $i ?> +</h5>
					  	</div>
				  	</div>
				    <img src="../img/chart.png" class="card-img" alt="">
				  </div>
				</div>
			</div>
			<div class="col-md-3 pt-2">
				<div class="card">
				  <div class="card-body">
				  	<div class="row">
				  		<div class="col-md-7 col-sm-7 col-7">
				  			<h5 class="card-title">Department</h5>
					  	</div>
					  	<div class="col-md-5 col-sm-5 col-5">
					  		<?php 
					  			$count=$mysqli->query("SELECT * FROM department");
								$i=0;
								while ($count->fetch_array()) {
									$i++;
								}
					  		?>
					  		<h5 class="card-title text-right"><?php echo $i;?> +</h5>
					  	</div>
				  	</div>
				    <img src="../img/chart.png" class="card-img" alt="">
				  </div>
				</div>
			</div>
			<div class="col-md-6 pt-2">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Department list</h6>
						<hr>
						<table id="datatabledoctor" class="table table-striped table-bordered">
					        <thead>
					            <tr>
					                <th>SL</th>
					                <th>Department</th>
					                <th>Status</th>
					            </tr>
					        </thead>
						    <tbody>
<?php

$inset=$mysqli->query("SELECT * FROM `department` ORDER BY `department`.`id` DESC");
$i=1;
while($fetcharry=$inset->fetch_array())
        {
        	
?>
						        <tr>
						            <td><?php echo $i;?></td>
						            <td><?php echo $fetcharry[1];?></td>
						            <td>
						            	<?php if ($fetcharry[3]==1) {?>
						            	<span class="badge badge-success">Active</span>
							            <?php }else{ ?>
							            	<span class="badge badge-warning">Unctive</span>
							            <?php }?>
						            </td>
						        </tr>
<?php 
$i++;
}
?>
						    </tbody>
					        <tfoot>
					            <tr>
					                <th>SL</th>
					                <th>Department</th>
					                <th>Status </th>
					            </tr>
					        </tfoot>
		    			</table>
		    		</div>
				</div>
			</div>
			<div class="col-md-6 pt-2">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Doctors list</h6>
						<hr>
						<table id="datatablebook" class="table table-striped table-bordered">
					        <thead>
					            <tr>
					            	<th>SL</th>
					                <th>Name</th>
					                <th>Department</th>
					                <th>Mobile </th>
					            </tr>
					        </thead>
						    <tbody>
<?php

$inset=$mysqli->query("SELECT * FROM `doctor` ORDER BY `doctor`.`id` DESC");
$i=1;
while($fetcharry=$inset->fetch_array())
        {
        	
?>
						        <tr>
						            <td><?php echo $i;?></td>
						            <td><?php echo $fetcharry[1];?></td>
						            <td>
<?php 
						            	$dId = $fetcharry[5];
$insert=$mysqli->query("select * from department where id='".$dId."'");
$fetcharry_d=$insert->fetch_array();
echo $fetcharry_d[1];
?> 
						        	</td>
						            <td><?php echo $fetcharry[7];?></td>
						        </tr>
<?php 
$i++;
}
?>
						    </tbody>
					        <tfoot>
					            <tr>
					                <th>SL</th>
					                <th>Name</th>
					                <th>Department</th>
					                <th>Mobile </th>
					            </tr>
					        </tfoot>
		    			</table>
		    		</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#datatabledoctor').DataTable();
		} );
		$(document).ready(function() {
		    $('#datatablebook').DataTable();
		} );
	</script> 
</body>
</html>

