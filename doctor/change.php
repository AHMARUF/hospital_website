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

$password=md5(isset($_POST["confirm_password"])?$_POST["confirm_password"]:"");
$_SESSION["errro_mes"]="";
$id = $_SESSION["id"];

if (isset($_POST['submit'])) {
    $update=$mysqli->query("UPDATE `doctor` SET `password` = '$password' WHERE `doctor`.`id` = '$id'");
    if ($update) {
        // Redirect to page
        header("location: dashboard.php");
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
            <div class="col-md-6 mt-5" style="margin: auto;">
                <div class="row">
                    <div class="col-md-12">
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
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Password change</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Password<span class="text-danger">*</span> :</label>
                            <input  type="password" name="password" id="password" onchange='check_pass();' class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Confirm Password<span class="text-danger">*</span> :</label>
                            <input type="password" name="confirm_password" id="confirm_password" onchange='check_pass();' class="form-control">
                          </div>
                          <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit"  value="Submit"  id="submit" disabled/>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function check_pass() {
            if (document.getElementById('password').value ==
                    document.getElementById('confirm_password').value) {
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById('submit').disabled = true;
            }
        }
    </script>
</body>
</html>

