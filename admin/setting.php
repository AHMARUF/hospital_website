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

$applicationtitle=isset($_POST['applicationtitle'])?$_POST['applicationtitle']:"";
$description=isset($_POST['description'])?$_POST['description']:"";
$email=isset($_POST['email'])?$_POST['email']:"";
$number=isset($_POST['number'])?$_POST['number']:"";
$address=isset($_POST['address'])?$_POST['address']:"";
$GoogleMap=isset($_POST['GoogleMap'])?$_POST['GoogleMap']:"";
$Facebook=isset($_POST['Facebook'])?$_POST['Facebook']:"";
$Instagram=isset($_POST['Instagram'])?$_POST['Instagram']:"";
$Copyright_Text=isset($_POST['Copyright_Text'])?$_POST['Copyright_Text']:"";
$Twitter=isset($_POST['Twitter'])?$_POST['Twitter']:"";
$linkedin=isset($_POST['linkedin'])?$_POST['linkedin']:"";
$pinterest=isset($_POST['pinterest'])?$_POST['pinterest']:"";

if (isset($_POST['save'])) {
	$logo_name= "logo";
  $logo="app/$logo_name.png";

  $favicon_name= "favicon";
  $favicon="app/$favicon_name.png";
    

	$insert=$mysqli->query("UPDATE `settings` SET `applicationtitle`='$applicationtitle', `description`='$description', `email`='$email',`number`='$number', `address`='$address', `GoogleMap`='$GoogleMap', `Facebook`='$Facebook', `Instagram`='$Instagram', `Twitter`='$Twitter', `linkedin`='$linkedin', `pinterest`='$pinterest', `logo`='$logo', `favicon`='$favicon', `Copyright_Text`='$Copyright_Text' WHERE `settings`.`id` = '1'");
    if($insert)
    {
    	move_uploaded_file($_FILES['logo']['tmp_name'],$logo);
    	move_uploaded_file($_FILES['favicon']['tmp_name'],$favicon);
      echo "<script>alert('Record Update successfully');</script>";
    }
    else
    {
       echo "<script>alert('');</script>";
    }
  };
//Get 

  	$insert=$mysqli->query("select * from settings where id='1'");
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
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Settings</h5>
					</div>
					<div class="card-body">
						<form method="POST" enctype="multipart/form-data" >
			        <div class="form-group row">
					    	<label for="applicationtitle" class="col-sm-3 col-form-label">Application Title<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="applicationtitle" type="text" class="form-control" id="applicationtitle" value="<?php echo $fetcharry[1] ?>">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="description" class="col-sm-3 col-form-label">Description</label>
					    	<div class="col-sm-9">
					    		<textarea name="description" class="form-control" id="description"><?php echo $fetcharry[2] ?></textarea>
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="email" class="col-sm-3 col-form-label">Email Address<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="email" type="email" class="form-control" id="email" value="<?php echo $fetcharry[3] ?>">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="address" class="col-sm-3 col-form-label">Address<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<textarea name="address" class="form-control" id="address" placeholder="Address"><?php echo $fetcharry[5] ?></textarea>
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="number" class="col-sm-3 col-form-label">Mobile No<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="number" type="text" class="form-control" id="number" value="<?php echo $fetcharry[4] ?>">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="Copyright_Text" class="col-sm-3 col-form-label">Copyright Text<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<textarea name="Copyright_Text" class="form-control" id="Copyright_Text" ><?php echo $fetcharry[14] ?></textarea>
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="favicon" class="col-sm-3 col-form-label">Favicon<span class="text-danger">*</span></label>
					    	<div class="col-sm-6">
					      		<input id="favicon" name="favicon" type="file" class="form-control" style="border: none;">
					    	</div>
					    	<div class="col-sm-3">
					      		<img src="<?php echo $fetcharry[13] ?>">
					    	</div>
					  	</div>

					  	<div class="form-group row">
					    	<label for="logo" class="col-sm-3 col-form-label">Logo<span class="text-danger">*</span></label>
					    	<div class="col-sm-6">
					      		<input id="logo" name="logo" type="file" class="form-control" style="border: none;">
					    	</div>
					    	<div class="col-sm-3">
					      		<img src="<?php echo $fetcharry[12] ?>">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="GoogleMap" class="col-sm-3 col-form-label">Google Map<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<textarea id="GoogleMap" name="GoogleMap" class="form-control"><?php echo $fetcharry[6] ?> </textarea>
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="Facebook" class="col-sm-3 col-form-label">Facebook URL<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input id="Facebook" name="Facebook" type="text" class="form-control" value="<?php echo $fetcharry[7] ?>">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="Instagram" class="col-sm-3 col-form-label">Instagram  URL<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input id="Instagram" name="Instagram" type="text" class="form-control" value="<?php echo $fetcharry[8] ?>">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="Twitter" class="col-sm-3 col-form-label">Twitter  URL<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input id="Twitter" name="Twitter" type="text" class="form-control" value="<?php echo $fetcharry[9] ?>">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="linkedin" class="col-sm-3 col-form-label">Linkedin  URL<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input id="linkedin" name="linkedin" type="text" class="form-control" value="<?php echo $fetcharry[10] ?>">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="pinterest" class="col-sm-3 col-form-label">Pinterest  URL<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input id="pinterest" name="pinterest" type="text" class="form-control" value="<?php echo $fetcharry[11] ?>">
					    	</div>
					  	</div>
			      </div>
			      <div class="card-footer">
			        <button name="save" type="submit" class="btn btn-primary">UPDATE</button>
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
</body>
</html>


