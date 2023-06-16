<?php
// Include config file
require_once "../config.php";

// Initialize the session
session_start();

//back button 
if (isset($_POST['back'])) {
	header("location: patient.php");
}

//eidt Get id 

  if(isset($_GET["editId"])) { 
  	$insert=$mysqli->query("select * from patient where id='".$_GET["editId"]."'");
  	$fetcharry=$insert->fetch_array();
  	
  }


//difine value
$id=isset($_POST['id'])?$_POST['id']:"";
$name=isset($_POST['name'])?$_POST['name']:"";
$number=isset($_POST['number'])?$_POST['number']:"";
$blood_group=isset($_POST['blood_group'])?$_POST['blood_group']:"";
$gender=isset($_POST['gender'])?$_POST['gender']:"";
$date_of_birth=isset($_POST['date'])?$_POST['date']:"";
$address=isset($_POST['address'])?$_POST['address']:"";
$status=isset($_POST['status'])?$_POST['status']:"";
$_SESSION["Update_mess"] = "";
$_SESSION["errro_mes"] = "";

//update 
  if (isset($_POST['update'])) {
  	$update=$mysqli->query("UPDATE `patient` SET `name` = '$name', `mobile` = '$number',`blood_group` = '$blood_group',`gender` = '$gender',`date_of_birth` = '$date_of_birth',`address` = '$address',`status` = '$status' WHERE `patient`.`id` = '$id'");
  	if ($update) {
  		$_SESSION["Update_mess"] = "Record Updated successfully.";
  		if($_SESSION["Update_mess"]){
  			header("location: patient.php");
  		}
  		//header("location: department.php");
  	}else{
  		$_SESSION["errro_mes"] = "Failed to insert new record";
  	}
  	
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
	<div class="container">
		<div class="row">
			<div class="col-md-8 mt-5">
				<div class="row">
					<?php if ($_SESSION["Update_mess"]) { ?>
					<div class="col-md-12">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						  <strong> <i class=" fa fa-solid fa-check"></i></strong> <?php echo $_SESSION["Update_mess"]; ?>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
					</div>
					<?php } ?>
					<?php if ($_SESSION["errro_mes"]) { ?>
					<div class="col-md-12">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <strong> <i class=" fa fa-solid fa-check"></i></strong> 
						  <?php echo $_SESSION["errro_mes"]; ?>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
					</div>
				<?php } ?>
				</div>
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Eidt Patient</h3>
					</div>
					<div class="card-body">
				<form method="POST" enctype="multipart/form-data" >
					<input type="hidden" name="id" value="<?php echo $fetcharry[0];?>">
			           <div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Name<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="name" type="text" class="form-control" id="colFormLabel" value="<?php echo $fetcharry[2];?>">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Mobile No<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="number" type="text" class="form-control" id="colFormLabel" value="<?php echo $fetcharry[3];?>">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Address<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<textarea name="address" type="email" class="form-control" id="colFormLabel" placeholder="Address"><?php echo $fetcharry[7];?></textarea>
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Date of Birth<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="date" type="date" class="form-control" id="colFormLabel" value="<?php echo $fetcharry[6];?>">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Sex<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		 <input <?php if($fetcharry[5]==1) echo "checked"?> type="radio" name="gender" value="1">&nbsp;Male&nbsp;&nbsp;
			             	  <input <?php if($fetcharry[5]==2) echo "checked"?> type="radio" name="gender" value="2">&nbsp;Female
					    	</div>
					  	</div>
			            <div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Blood Group<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="blood_group">
							       <option selected>Choose...</option>
							       <option <?php if($fetcharry[4]==1) echo "selected"?> value="1">A+</option>
							       <option <?php if($fetcharry[4]==2) echo "selected"?> value="2">A-</option>
							       <option <?php if($fetcharry[4]==3) echo "selected"?> value="3">B+</option>
							       <option <?php if($fetcharry[4]==4) echo "selected"?> value="4">B-</option>
							       <option <?php if($fetcharry[4]==5) echo "selected"?> value="5">O+</option>
							       <option <?php if($fetcharry[4]==6) echo "selected"?> value="6">O-</option>
							       <option <?php if($fetcharry[4]==7) echo "selected"?> value="7">AB+</option>
							       <option <?php if($fetcharry[4]==8) echo "selected"?> value="8">AB-</option>
							    </select>
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Status</label>
					    	<div class="col-sm-9">
					      		<input <?php if($fetcharry[9]=='1'){ echo "checked=checked";}  ?> type="radio" name="status" value="1">&nbsp;Active&nbsp;&nbsp;
			            	<input <?php if($fetcharry[9]=='0'){ echo "checked=checked";}  ?> type="radio" name="status" value="0">&nbsp;Inactive
					    	</div>
					  	</div>
			        
			      </div>
			      <div class="card-footer">
			        <button type="submit" name="back" class="btn btn-secondary">Back</button>
			        <button name="update" type="submit" class="btn btn-primary">Update</button>
			      </div>
			      </form>
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
	</script>
</body>
</html>