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



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';


// data inser 
$image = "";
$name=isset($_POST['name'])?$_POST['name']:"";
$email =isset($_POST['email'])?$_POST['email']:"";
$password=substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
$password_d = md5($password);
$designation=isset($_POST['designation'])?$_POST['designation']:"";
$department=isset($_POST['department'])?$_POST['department']:"";
$address=isset($_POST['address'])?$_POST['address']:"";
$number=isset($_POST['number'])?$_POST['number']:"";
$date_of_birth=isset($_POST['date'])?$_POST['date']:"";
$gender=isset($_POST['gender'])?$_POST['gender']:"";
$blood_group=isset($_POST['blood_group'])?$_POST['blood_group']:"";
$education=isset($_POST['education'])?$_POST['education']:"";
$status=isset($_POST['status'])?$_POST['status']:"";

if (isset($_POST['save'])) {
	$img_name= uniqid();
    $image="doctor/$img_name.jpg";
    

	$insert=$mysqli->query("INSERT INTO `doctor` (`name`, `email`, `password`, `designation`, `department`, `address`, `number`, `date_of_birth`, `gender`, `blood_group`, `education`, `image`, `status`) VALUES ('$name', '$email', '$password_d', '$designation', '$department', '$address', '$number', '$date_of_birth', '$gender', '$blood_group', '$education', '$image', '$status')");
    if($insert)
    {
    	move_uploaded_file($_FILES['image']['tmp_name'],$image);
      echo "<script>alert('New record created successfully');</script>";
    }
    else
    {
       echo "<script>alert('Failed to insert new record');</script>";
    }

    $date = date("d-m-Y");
    $email = $_POST['email'];
    $subject = "Account Information: $name ";
    $message = "Hi! <br> Name: ".$name ."<br> Email: ". $email."<br> Passwrod: ".$password."<br> Number: ".$number ."<br> Date: ".$date."<br><br> Thanks <br>Hospital Management";
    

    //Load composer's autoloader

    $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'amdadulhasan133@gmail.com';     
        $mail->Password = 'Marufkazi0055';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('amdadulhasan133@gmail.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('amdadulhasan133@gmail.com');
        
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
		


       $_SESSION['result'] = 'Message has been sent';
	   $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }
	
	header("location: doctor.php");
  };

//delete 
if(isset($_GET["dltId"]))
{ 
  $delete=$mysqli->query("delete from doctor where id='".$_GET["dltId"]."'");
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
								<h5 class="card-title">Doctors list</h5>
							</div>
							<div class="col-md-6 col-sm-6 col-6 text-right">
								<button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-success">Add Doctor</button>
							</div>
						</div>
						<hr>
						<table id="datatabledoctor" class="table table-striped table-bordered">
					        <thead>
					            <tr>
					            	<th>SL</th>
					            	<th>Image</th>
					                <th>Name</th>
					                <th>Department</th>
					                <th>Mobile </th>
					                <th>Address</th>
					                <th>Action</th>
					            </tr>
					        </thead>
						    <tbody>
<?php
$i=1;
$inset=$mysqli->query("SELECT * FROM doctor ORDER BY `doctor`.`id` DESC");
while($fetcharry=$inset->fetch_array())
        {	
?>
						        <tr>
						        	<td><?php echo $i; ?></td>
						        	<td><img class="img-fluid" src="<?php echo $fetcharry[12]; ?>" style="height: 100px; width: 100px;"></td>
						            <td><?php echo $fetcharry[1]; ?></td>
						            <td>
<?php 
$dId = $fetcharry[5];
$insert=$mysqli->query("select * from department where id='".$dId."'");
$fetcharry_d=$insert->fetch_array();
echo $fetcharry_d[1];
?>
						            </td>
						            <td><?php echo $fetcharry[6]; ?></td>
						            <td><?php echo $fetcharry[7]; ?></td>
						            <td>
						            	<a href="view_doctor.php?viewId=<?php echo $fetcharry[0];?>" class="btn btn-success" name="viewId"><i class="far fa-eye"></i></a>
						            	<a href="doctor_eidt.php?editId=<?php echo $fetcharry[0];?>" class="btn btn-primary" name="eitbtn"><i class="far fa-edit"></i></a> 
						            	<a href="doctor.php?dltId=<?php echo $fetcharry[0];?>" class="btn btn-danger" name="dltId"><i class="far fa-trash-alt"></i></a>
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
					                <th>Department</th>
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
			        <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
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
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Email Address<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="email" type="email" class="form-control" id="colFormLabel" placeholder="Email">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Designation<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="designation" type="text" class="form-control" id="colFormLabel" placeholder="Designation">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Department<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="department">
							       <option selected>Choose...</option>
<?php
$inset=$mysqli->query("SELECT * FROM department ORDER BY `department`.`id` DESC");
while($fetcharry=$inset->fetch_array())
        {	
?>
							       <option value="<?php echo $fetcharry[0];?>"><?php echo $fetcharry[1];?></option>
<?php }?>
							    </select>
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Address<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<textarea name="address" type="email" class="form-control" id="colFormLabel" placeholder="Address"></textarea>
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Mobile No<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<input name="number" type="text" class="form-control" id="colFormLabel" placeholder="Mobile No" max="11">
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
					    	<label for="colFormLabel" class="col-sm-3 col-form-label">Education/Degree<span class="text-danger">*</span></label>
					    	<div class="col-sm-9">
					      		<textarea name="education" type="text" class="form-control" id="colFormLabel" placeholder="Education/Degree"></textarea>
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


