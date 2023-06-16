<?php  
// Include config file
require_once "../config.php";

// Initialize the session
session_start();

//back button 
if (isset($_POST['back'])) {
	header("location: blog.php");
}

//eidt Get id 

  if(isset($_GET["editId"])) { 
  	$insert=$mysqli->query("select * from blogs where id='".$_GET["editId"]."'");
  	$fetcharry=$insert->fetch_array();
  	
  }


// data 
$_SESSION["errro_mes"]="";
$_SESSION["Update_mess"]=""; 
$id=isset($_POST['id'])?$_POST['id']:"";
$title=isset($_POST['title'])?$_POST['title']:"";
$description =isset($_POST['description'])?$_POST['description']:"";
$status=isset($_POST['status'])?$_POST['status']:"";

//update 

  if (isset($_POST['update'])) {
  	$update=$mysqli->query("UPDATE `blogs` SET `title` = '$title', `description` = '$description',`status` = '$status' WHERE `blogs`.`id` = '$id'");
  	if ($update) {
  		$_SESSION["Update_mess"] = "Record Updated successfully.";
  		if($_SESSION["Update_mess"]){
  			header("location: blog.php");
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
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-8" style="margin: auto;">
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
						<h5 class="card-title">Eidt Department</h5>
					</div>
					<div class="card-body">
						<form method="POST">
							<input type="hidden" name="id" value="<?php echo $fetcharry[0]; ?>">
			          <div class="form-group">
			            <label for="recipient-name" class="col-form-label">Title<span class="text-danger">*</span> :</label>
			            <input type="text" name="title" class="form-control" id="recipient-name" value="<?php echo $fetcharry[1]; ?>">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="col-form-label">Description :</label>
			            <textarea rows="7" name="description" class="form-control" id="message-text"><?php echo $fetcharry[2]; ?></textarea>
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="col-form-label">Status :</label> &nbsp;
			            <input type="radio" name="status" value="1" <?php if($fetcharry[5]=='1'){ echo "checked=checked";}  ?>/>&nbsp;Active&nbsp;&nbsp;
			            <input type="radio" name="status" value="0" <?php if($fetcharry[5]=='0'){ echo "checked=checked";}  ?>/>&nbsp;Inactive
			          </div>
					</div>
					<div class="card-footer">
						<button name="back" type="submit" class="btn btn-secondary">Back</button>
				        <button name="update" type="submit" class="btn btn-primary">Update</button>
				      </div>
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
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#Department').DataTable();
		} );

		
	</script>
</body>
</html>