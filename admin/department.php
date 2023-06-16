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
$department_name=isset($_POST['department_name'])?$_POST['department_name']:"";
$description =isset($_POST['description'])?$_POST['description']:"";
$status=isset($_POST['status'])?$_POST['status']:"";

if (isset($_POST['save'])) {
	$insert=$mysqli->query("insert into department (`name`,`description`,`status`) values('$department_name','$description','$status')");
    if($insert)
    {
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
  $delete=$mysqli->query("delete from department where id='".$_GET["dltId"]."'");
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
								<h5 class="card-title">Department list</h5>
							</div>
							<div class="col-md-6 col-sm-6 col-6 text-right">
								<button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-success">Add Department</button>
							</div>
						</div>
						<hr>
						<table id="Department" class="table table-striped table-bordered">
					        <thead>
					            <tr>
					                <th>SL</th>
					                <th>Department</th>
					                <th>Description</th>
					                <th>Status</th>
					                <th>Action</th>
					            </tr>
					        </thead>
						    <tbody>
<?php
$i=1;
$inset=$mysqli->query("SELECT * FROM department ORDER BY `department`.`id` DESC");
while($fetcharry=$inset->fetch_array())
        {	
?>
						        <tr>
						            <td><?php echo $i;?></td>
						            <td><?php echo $fetcharry[1];?></td>
						            <td><?php echo $fetcharry[2];?></td>
						            <td>
						            	<?php 
						            		if ($fetcharry[3]==1) {
						            			echo "<span class='badge bg-success'>Active</span>";
						            		}else{
						            			echo "<span class='badge bg-danger'>Unactive</span>";
						            		}
						            	?>
						            </td>
						            <td><a href="department_eidt.php?editId=<?php echo $fetcharry[0];?>" class="btn btn-primary" name="eitbtn"><i class="far fa-edit"></i></a> <a href="department.php?dltId=<?php echo $fetcharry[0];?>" class="btn btn-danger" name="dltId"><i class="far fa-trash-alt"></i></a></td>
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
					                <th>Description</th>
					                <th>Status</th>
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
			        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form method="POST">
			          <div class="form-group">
			            <label for="recipient-name" class="col-form-label">Department Name <span class="text-danger">*</span> :</label>
			            <input type="text" name="department_name" class="form-control" id="recipient-name">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="col-form-label">Description :</label>
			            <textarea name="description" class="form-control" id="message-text"></textarea>
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="col-form-label">Status :</label> &nbsp;
			            <input type="radio" name="status" value="1">&nbsp;Active&nbsp;&nbsp;
			            <input type="radio" name="status" value="0">&nbsp;Inactive
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
		    $('#Department').DataTable();
		} );

		
	</script>
</body>
</html>


