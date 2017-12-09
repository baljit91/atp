<?php

//Decalring variables to prevent errors

$company_name = ""; //Company Name
$em = ""; // email
$em2 = ""; // email2

$password = "" ;//password
$password2 = ""; //password2
$date = "";  //sign up date
$error_array = array();//holds error message
$profile_pic  = "";

//if registet button i s pressed start handling the form
if(isset($_POST['register_button'])){
	//Registeration form values
	$company_name = strip_tags($_POST['company_name']); //remove html tags
	$company_name = str_replace(' ', '', $company_name);  //remove spaces
	$company_name = ucfirst(strtolower($company_name)); //upper case first
	$_SESSION['company_name'] = $company_name;

	


	$em = strip_tags($_POST['reg_email']); //remove html tags
	$em = str_replace(' ', '', $em);  //remove spaces
	$em = ucfirst(strtolower($em)); //upper case first
	$_SESSION['reg_email'] = $em;

	$em2 = strip_tags($_POST['reg_email2']); //remove html tags
	$em2 = str_replace(' ', '', $em2);  //remove spaces
	$em2 = ucfirst(strtolower($em2)); //upper case first
	$_SESSION['reg_email2'] = $em2;

	$password = strip_tags($_POST['reg_password']); //remove html tags
	$password2 = strip_tags($_POST['reg_password2']); //remove html tags

	$date = date("Y-m-d"); //current date


	if($em == $em2){
		//emails in valid format
		if(filter_var($em,FILTER_VALIDATE_EMAIL)){
			$em = filter_var($em,FILTER_VALIDATE_EMAIL);

			//Check if email already exists
			$e_check = mysqli_query($con,"SELECT email FROM company WHERE email = '$em'");

			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0){
				array_push($error_array, "Email already in use <br>");
			}
		}
		else{
			array_push($error_array, "Invalid email Format <br>");
		}
	}
	else{
		array_push($error_array, "Emails don't match <br>");
	}




	if(strlen($company_name) > 25 || strlen($company_name) < 2){
		array_push($error_array, "Your first name must be between 2 and 25 characters <br>");
	}

	
	if($password != $password2){

		array_push($error_array, "Your passwords do not match <br>");
	}
	else{
		if(preg_match(('/[^A-Za-z0-9]/'), $password)){
			array_push($error_array, "Your password can only contain english characters or numbers <br>");
		}
	}

	if(strlen($password) > 30 || strlen($password) < 5){
		array_push($error_array, "Your password must be between 5 and 30 characters <br>");
	}

	if(empty($error_array)){
		$password = md5($password); //Encrypt password before sending to database

		//Genearte username by concatinating by firstname and lastname


		//Profile picture assignment
		$rand = rand(1,2); //Random number
		if($rand == 1){
			$profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";
		}
		else if($rand == 2){
			$profile_pic = "assets/images/profile_pics/defaults/head_emerald.png";
		}


		$query = mysqli_query($con,"INSERT INTO company VALUES('', '$company_name', '$em', '$password','$profile_pic','')");

		array_push($error_array, "<span style='color:#14C800;'>You're all set! Go ahead and log in!</span><br>");

		//Clear Session varibales

		$_SESSION['company_name'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";


		
	}
	
}
 

?>