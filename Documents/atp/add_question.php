<?php
require 'config/config.php';
//Decalring variables to prevent errors

//print_r($_POST);

$question = ""; //Company Name
$option_1 = "";
$option_2 = "";
$option_3 = "";
$option_4 = "";
$company_name = $_SESSION['company_name'];

$correct_option = "" ;
$level = ""; //password2


//if registet button i s pressed start handling the form
if(isset($_POST['submit_question'])){
	//Registeration form values
	$question = $_POST['question']; 
	
	$option_1 = $_POST['op1']; 
	$option_2 = $_POST['op2']; 
	$option_3 = $_POST['op3']; 
	$option_4 = $_POST['op4']; 

	$correct_option =  $_POST['answer'];
	$level =  $_POST['level'];

	


	$query = mysqli_query($con,"INSERT INTO questions VALUES('', 
		'$company_name', '$question', '$option_1','$option_2','$option_3'
       ,'$option_4','$correct_option','$level')");

	header("Location: admin_home.php");
	
}
 

?>