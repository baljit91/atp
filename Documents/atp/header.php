
<?php 

require 'config/config.php';

if(isset($_SESSION['username'])){
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con,"SELECT * FROM users WHERE username = '$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);

	$_SESSION['first_name'] = $user['first_name'];
	$_SESSION['last_name'] = $user['last_name'];
	$_SESSION['email'] = $user['email'];
	$_SESSION['id'] = $user['id'];
	$userid = $user['id'];

}
else{
	header("Location: register.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to ATP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript"  src="assets/js/user_profile.js"></script>
	<script type="text/javascript"  src="assets/js/test.js"></script>
	<script type="text/javascript"  src="assets/js/jcrop_bits.js"></script>
	<script type="text/javascript"  src="assets/js/jquery.Jcrop.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/user_profile.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.Jcrop.css">
</head>
<body>
	<div class="top_bar">
		<div class="logo">
			<a href="index.php">Adaptive Testing Portal</a>
		</div>

		<nav>
			<span>(Student Login)</span>
			<span style="color: #fff; margin: 0 6px;">|</span>
			<a href="#">
				<?php echo $user['first_name']; ?>
			</a>
			<span style="color: #fff; margin: 0 6px;">|</span>
			<a href="includes/logout.php">
				Logout
			</a>
			

		</nav>
	</div>
<div class="wrapper">
	
