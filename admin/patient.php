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



// data inser 
$image = "";
$name=isset($_POST['name'])?$_POST['name']:"";
$Patient_ID =strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
$number=isset($_POST['number'])?$_POST['number']:"";
$blood_group=isset($_POST['blood_group'])?$_POST['blood_group']:"";
$gender=isset($_POST['gender'])?$_POST['gender']:"";
$date_of_birth=isset($_POST['date'])?$_POST['date']:"";
$address=isset($_POST['address'])?$_POST['address']:"";
$status=isset($_POST['status'])?$_POST['status']:"";

if (isset($_POST['save'])) {
	$img_name= uniqid();
    $image="patient/$img_name.jpg";
    

	$insert=$mysqli->query("INSERT INTO `patient` (`patient_id`, `name`, `mobile`, `blood_group`, `gender`, `date_of_birth`, `address`, `images`, `status`) VALUES ('$Patient_ID', '$name', '$number', '$blood_group', '$gender', '$date_of_birth', '$address', '$image', '$status')");
    if($insert)
    {
    	move_uploaded_file($_FILES['image']['tmp_name'],$image);
      echo "<script>alert('New record created successfully');</script>";
    }
    else
    {
       echo "<script>alert('Failed to insert new record');</script>";
    }
  };

//delete 
if(isset($_GET["dltId"]))
{ 
  $delete=$mysqli->query("delete from patient where id='".$_GET["dltId"]."'");
  if($delete)
    {
      echo "<script>alert('Record Delete successfully.');</script>";
    }
    else
    {
       echo "<script>alert('Failed to insert new record');</script>";
    }
};
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
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-6">
								<h5 class="card-title">Patient list</h5>
							</div>
							<div class="col-md-6 col-sm-6 col-6 text-right">
								<button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-success">Add Patient</button>
							</div>
						</div>
						<hr>
						<table id="datatabledoctor" class="table table-striped table-bordered">
					        <thead>
					            <tr>
					            	<th>SL</th>
					            	<th>Image</th>
					                <th>Name</th>
					                <th>Patient ID</th>
					                <th>Date of Birth</th>
					                <th>Mobile </th>
					                <th>Address</th>
					                <th>Action</th>
					            </tr>
					        </thead>
						    <tbody>
<?php
$i=1;
$inset=$mysqli->query("SELECT * FROM patient ORDER BY `patient`.`id` DESC");
while($fetcharry=$inset->fetch_array())
        {	
?>
						        <tr>
						        	<td><?php echo $i; ?></td>
						        	<td><img class="img-fluid" src="<?php echo $fetcharry[8]; ?>" style="height: 100px; width: 100px;"></td>
						            <td><?php echo $fetcharry[2]; ?></td>
						            <td><?php echo $fetcharry[1]; ?></td>
						            <td><?php echo $fetcharry[6]; ?></td>
						            <td><?php echo $fetcharry[3]; ?></td>
						            <td><?php echo $fetcharry[7]; ?></td>
						            <td>
						            	<a href="view_patient.php?viewId=<?php echo $fetcharry[0];?>" class="btn btn-success" name="viewID"><i class="far fa-eye"></i></a>
						            	<a href="patient_eidt.php?editId=<?php echo $fetcharry[0];?>" class="btn btn-primary" name="eitbtn"><i class="far fa-edit"></i></a>
						            	<a href="patient.php?dltId=<?php echo $fetcharry[0];?>" class="btn btn-danger" name="dltId"><i class="far fa-trash-alt"></i></a>
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
					            	<th>Image</th>
					                <th>Name</th>
					                <th>Patient ID</th>
					                <th>Date of Birth</th>
					                <th>Mobile </th>
					                <th>Address</th>
					                <th>Action</th>
					            </tr>
					        </tfoot>
		    			</table>
		    		</div>
				</div>
			</div>


			<!-- Modal -->
			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form method="POST" enctype="multipart/form-data" >
			           <div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Name<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="name" type="text" class="form-control" id="colFormLabel" placeholder="name">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Mobile No<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="number" type="text" class="form-control" id="colFormLabel" placeholder="Mobile No">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Address<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<textarea name="address" type="email" class="form-control" id="colFormLabel" placeholder="Address"></textarea>
					    	</div>
					  	</div>
					  	
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Picture<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="image" type="file" class="form-control">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Date of Birth<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="date" type="date" class="form-control" id="colFormLabel" placeholder="YYYY-MM-DD">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Sex<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		 <input type="radio" name="gender" value="1">&nbsp;Male&nbsp;&nbsp;
			             	  <input type="radio" name="gender" value="0">&nbsp;Female
					    	</div>
					  	</div>
			            <div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Blood Group<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="blood_group">
							       <option selected>Choose...</option>
							       <option value="1">A+</option>
							       <option value="2">A-</option>
							       <option value="3">B+</option>
							       <option value="4">B-</option>
							       <option value="5">O+</option>
							       <option value="6">O-</option>
							       <option value="7">AB+</option>
							       <option value="8">AB-</option>
							    </select>
					    	</div>
					  	</div>
					  	
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Status</label>
					    	<div class="col-sm-9">
					      		<input type="radio" name="status" value="1">&nbsp;Active&nbsp;&nbsp;
			            		<input type="radio" name="status" value="0">&nbsp;Inactive
					    	</div>
					  	</div>
			        
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button name="save" type="submit" class="btn btn-primary">Save</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
			<!--End Modal -->
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


