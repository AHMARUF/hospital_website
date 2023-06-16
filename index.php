<?php
// Include config file
require_once "config.php";

// Initialize the session
session_start();

// data inser 

$name=isset($_POST['name'])?$_POST['name']:"";
$subject=isset($_POST['subject'])?$_POST['subject']:"";
$email=isset($_POST['email'])?$_POST['email']:"";
$message=isset($_POST['message'])?$_POST['message']:"";

if (isset($_POST['contact'])) {

	$insert=$mysqli->query("INSERT INTO `contacts` (`name`, `subject`, `email`, `message`) VALUES ('$name', '$subject', '$email', '$message')");
    if($insert)
    {
      echo "<script>alert('New record created successfully');</script>";
    }
    else
    {
       echo "<script>alert('Data Add Unsuccess');</script>";
    }
  };


//settings
$insert=$mysqli->query("select * from settings where id='1'");
$fetcharry=$insert->fetch_array();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="admin/<?php echo $fetcharry[13]; ?>" type="image/gif" sizes="32x32">
	<title><?php echo $fetcharry[1]; ?></title>
	<!-- fontawesome css file link -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

	<!-- custom css file link -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- header section Start	 -->
<header class="header">
	<a href="#" class="logo"><img src="admin/<?php echo $fetcharry[12]; ?>" style="height: 40px; width: auto;"></a>
	<nav class="navbar">
		<a href="#home">Home</a>
		<a href="#services">Services</a>
		<a href="#about">about</a>
		<a href="#doctor">doctors</a>
		<!-- <a href="#book">book</a> -->
		<a href="#blog">blog</a>
		<a href="#contact">contact us</a>
	</nav>
	<div  id="menu-btn" class="fa fa-bars"></div>
</header>
<!-- header section End	 -->



<!-- home section Start -->
<section class="home" id="home">
	<div class="image">
		<img src="img/banner-1.png">
	</div>
	<div class="content">
		<h3>Stay Safe, Stay healthy</h3>
		<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, hic voluptas.</p>
		<a href="#contact" class="btn">contact us <span class="fa fa-chevron-right"></span></a>
	</div>
</section>
<!-- home section End -->


<!-- count-info section Start -->
<section class="count-info">
	<div class="info">
		<i class="fa fa-user-md"></i>
		<h3>150+</h3>
		<p>Doctors at work</p>
	</div>
	<div class="info">
		<i class="fa fa-users"></i>
		<h3>150+</h3>
		<p>satisfied patients</p>
	</div>
	<div class="info">
		<i class="fas fa-procedures"></i>
		<h3>150+</h3>
		<p>bed facilty</p>
	</div>
	<div class="info">
		<i class="fas fa-hospital"></i>
		<h3>150+</h3>
		<p>available hospitals</p>
	</div>
</section>
<!-- count-info section End	 -->


<!-- services section Start -->
<section class="services" id="services">
	<h1 class="heading">our <span>Services</span></h1>
	<div class="box-container">
		<div class="box">
			<i class="fa fa-stethoscope"></i>
			<h3>Free checkups</h3>
			<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
			<a href="#" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
		</div>
		<div class="box">
			<i class="fa fa-ambulance"></i>
			<h3>24/7 ambulance</h3>
			<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
			<a href="#" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
		</div>
		<div class="box">
			<i class="fa fa-user-md"></i>
			<h3>expert doctor</h3>
			<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
			<a href="#" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
		</div>
		<div class="box">
			<i class="fa fa-medkit"></i>
			<h3>medicines</h3>
			<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
			<a href="#" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
		</div>
		<div class="box">
			<i class="fa fa-procedures"></i>
			<h3>bad facility</h3>
			<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
			<a href="#" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
		</div>
		<div class="box">
			<i class="fa fa-heartbeat"></i>
			<h3>total care</h3>
			<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
			<a href="#" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
		</div>
	</div>
</section>
<!-- services section End -->



<!-- about section Start -->
<section class="about" id="about">
	<h1 class="heading"><span>about</span> us</h1>
	<div class="row">
		<div class="image">
			<img src="img/about.png" alt="img">
		</div>
		<div class="content">
			<h3>we take care of your healthy life</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Nam soluta, ut aliquam atque obcaecati. Ab.</p>
			<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis unde illo impedit non fuga exercitationem!</p>
			<a href="#" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
		</div>
	</div>
</section>
<!-- about section End	  -->


<!-- doctors section Start -->
<section class="doctor" id="doctor">
	<h1 class="heading">our <span>doctors</span></h1>
	<div class="box-container">
<?php
$inset=$mysqli->query("SELECT * FROM doctor ORDER BY `doctor`.`id` DESC LIMIT 6");
while($fetcharry_d=$inset->fetch_array())
        {	
?>
		<div class="box">
			<img src="admin/<?php echo $fetcharry_d[12]; ?>" alt="">
			<h3><?php echo $fetcharry_d[1]; ?></h3>
			<span><?php echo $fetcharry_d[4]; ?></span>
			<div class="share">
				<a href="#" class="fab fa-facebook-f"></a>
				<a href="#" class="fab fa-twitter"></a>
				<a href="#" class="fab fa-instagram"></a>
				<a href="#" class="fab fa-linkedin"></a>
			</div>
		</div>
<?php 
}
?>	
	</div>
</section>
<!-- doctors section End   -->



<!-- book section Start --
<section class="book" id="book">
	<h1 class="heading"><span>book</span> now</h1>
	<div class="row">
		<div class="image">
			<img src="img/banner-2.png" alt="">
		</div>
		<form action="">
			<h3>book appointment</h3>
			<input type="text" placeholder="Your name" class="box">
			<input type="number" placeholder="Your number" class="box">
			<input type="email" placeholder="Your email" class="box">
			<input type="date" class="box">
			<input type="submit" value="book now" class="btn">
		</form>
	</div>
</section>
-- book section End   -->





<!-- blog section Start -->
<section class="blog" id="blog">
	<h1 class="heading">our <span>blogs</span></h1>
	<div class="box-container">
<?php
$inset=$mysqli->query("SELECT * FROM blogs ORDER BY `blogs`.`id` DESC LIMIT 6");
while($fetcharry_b=$inset->fetch_array())
        {	
?>
		<div class="box">
			<div class="image">
				<img src="admin/<?php echo $fetcharry_b[4]; ?>"alt="">
			</div>
			<div class="content">
				<div class="icon">
					<a href="#"><i class="far fa-calendar-alt"></i> <?php echo $fetcharry_b[3]; ?></a>
					<a href="#"><i class="far fa-user"></i> by admin</a>
				</div>
				<h3><?php echo $fetcharry_b[1]; ?></h3>
				<p><?php echo substr($fetcharry_b[2],0, 57);?>....</p>
				<a href="" class="btn"> learn more <span class="fas fa-chevron-right"></span></a>
			</div>
		</div>
<?php 
} 
?>	
	</div>
</section>
<!-- blog section End	-->



<!-- contact section Start -->
<section class="contact" id="contact">
	<h1 class="heading"><span>contact</span> us</h1>
	<div class="row">
		<div class="map">
			<iframe src="<?php echo $fetcharry[6]; ?>" allowfullscreen="" loading="lazy"></iframe>
		</div>
		<form method="POST">
			<h3>contact</h3>
			<input type="text" name="name" placeholder="Your name" class="box" required>
			<input type="text" name="subject" placeholder="Subject" class="box" required>
			<input type="email" name="email" placeholder="Your email" class="box" required>
			<textarea class="box" name="message" placeholder="message"></textarea>
			<input type="submit" name="contact" value="submit" class="btn" required>
		</form>
	</div>
</section>
<!-- contact section End   -->



<!-- footer section Start -->
<section class="footer">
	<div class="box-container">
		<div class="box">
			<h3>quick links</h3>
			<a href="#"><i class="fas fa-chevron-right"></i> Home</a>
			<a href="#"><i class="fas fa-chevron-right"></i> Services</a>
			<a href="#"><i class="fas fa-chevron-right"></i> about</a>
			<a href="#"><i class="fas fa-chevron-right"></i> doctors</a>
			<!-- <a href="#"><i class="fas fa-chevron-right"></i> book</a> -->
			<a href="#"><i class="fas fa-chevron-right"></i> blogs</a>
		</div>
		<div class="box">
			<h3>our services</h3>
			<a href="#"><i class="fas fa-chevron-right"></i> dental care</a>
			<a href="#"><i class="fas fa-chevron-right"></i> message therapy</a>
			<a href="#"><i class="fas fa-chevron-right"></i> cardioloty</a>
			<a href="#"><i class="fas fa-chevron-right"></i> diagnosis</a>
			<a href="#"><i class="fas fa-chevron-right"></i> ambulance service</a>
		</div>
		<div class="box">
			<h3>contact info</h3>
			<a href="#"><i class="fas fa-phone"></i> <?php echo $fetcharry[4]; ?></a>
			<a href="#"><i class="fas fa-envelope"></i> <?php echo $fetcharry[3]; ?></a>
			<a href="#"><i class="fas fa-map-marker-alt"></i> <?php echo $fetcharry[5]; ?> </a>
		</div>
		<div class="box">
			<h3>follow us</h3>
			<a href="<?php echo $fetcharry[7]; ?>"><i class="fab fa-facebook-f"></i> facebook</a>
			<a href="<?php echo $fetcharry[9]; ?>"><i class="fab fa-twitter"></i> twitter</a>
			<a href="<?php echo $fetcharry[8]; ?>"><i class="fab fa-instagram"></i> instagram</a>
			<a href="<?php echo $fetcharry[10]; ?>"><i class="fab fa-linkedin"></i> linkedin</a>
			<a href="<?php echo $fetcharry[11]; ?>"><i class="fab fa-pinterest"></i> pinterest</a>
		</div>
	</div>
	<div class="credit"> <?php echo $fetcharry[14]; ?></div>
</section>
<!-- footer section End	  -->

	<!-- custom js file link -->
	<script type="text/javascript" src="js/script.js"></script> 
</body>
</html>