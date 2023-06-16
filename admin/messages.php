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



//delete 
if(isset($_GET["dltId"]))
{ 
  $delete=$mysqli->query("delete from contacts where id='".$_GET["dltId"]."'");
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
								<h5 class="card-title">All Messages</h5>
							</div>
							<div class="col-md-6 col-sm-6 col-6 text-right">
							</div>
						</div>
						<hr>
						<table id="datatabledoctor" class="table table-striped table-bordered">
					        <thead>
					            <tr>
					            	<th>SL</th>
					            	<th>Name</th>
					              <th>Subject</th>
					              <th>Email</th>
					              <th>Messages</th>
					              <th>Date</th>
					              <th>Action</th>
					            </tr>
					        </thead>
						    <tbody>
<?php
$i=1;
$inset=$mysqli->query("SELECT * FROM contacts ORDER BY `contacts`.`id` DESC");
while($fetcharry=$inset->fetch_array())
        {	
?>
						        <tr>
						        	<td><?php echo $i; ?></td>
						            <td><?php echo $fetcharry[1]; ?></td>
						            <td><?php echo $fetcharry[2]; ?></td>
						            <td> <?php echo $fetcharry[3]; ?></td>
						            <td><?php echo $fetcharry[4]; ?></td>
						            <td><?php echo $fetcharry[5]; ?></td>
						            <td>
						            	<a href="messages.php?dltId=<?php echo $fetcharry[0];?>" class="btn btn-danger" name="dltId"><i class="far fa-trash-alt"></i></a>
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
					            	<th>Name</th>
					              <th>Subject</th>
					              <th>Email</th>
					              <th>Messages</th>
					              <th>Date</th>
					              <th>Action</th>
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
	</script>
</body>
</html>


