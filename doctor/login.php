<?php 

// Include config file
require_once "../config.php";

session_start();


$email=isset($_POST["email"])?$_POST["email"]:"";
$password=md5(isset($_POST["password"])?$_POST["password"]:"");


$inset=$mysqli->query("SELECT * FROM doctor where email='$email' and password='$password'");
$fetcharry=$inset->fetch_array();

if(isset($_POST["login"]))
{
  if($fetcharry[2]==$email && $fetcharry[3]==$password)
  {
  	// Store data in session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $fetcharry[0];
    $_SESSION["username"] = $username;

    // Redirect user to welcome page
    header("location: index.php");
  }
  else
  {
    $message = "Invalid username or password.";
		echo "<script type='text/javascript'>alert('$message');</script>";
  }
}

//settings
$insert=$mysqli->query("select * from settings where id='1'");
$fetcharry=$insert->fetch_array();
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
	<title><?php echo $fetcharry[1]; ?> | Sign in</title>
</head>
<body>
	<div class="container-fluid">
		<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <form method="POST">
          <div class="card-body p-5 text-center">
            <h3 class="mb-5">Sign in</h3>
            <div class="form-outline mb-4">
              <input name="email" type="email" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Email" />
            </div>

            <div class="form-outline mb-4">
              <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Password" />
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
	</div>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>

