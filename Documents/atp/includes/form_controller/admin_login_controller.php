<?php 

if(isset($_POST['login_button'])){

	$email = filter_var($_POST['log_email'],FILTER_SANITIZE_EMAIL);
	$_SESSION['log_email'] = $email; //store email to session
	$password = md5($_POST['log_password']);  //get password


	$check_database_query = mysqli_query($con, "SELECT * FROM company WHERE email='$email' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query); // get the resulting subtable 

	if($check_login_query == 1){
		$row = mysqli_fetch_array($check_database_query);
		$company_name = $row['company_name'];


		$_SESSION['company_name'] = $company_name;
		header("Location: admin_home.php");
		exit();
	}

	else{
		array_push($error_array, "Email or password was incorrect <br>");
	}
}

 ?>