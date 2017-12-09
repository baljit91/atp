
<?php
require 'config/config.php';

echo 'data not updated';

if(isset($_POST['email'])){

	$company_name = $_POST['company_name'];
	$company_details = $_POST['company_details'];
	$email = $_POST['email'];
	
	$id = $_POST['id'];

	//  query to update data

	$result  = mysqli_query($con , "UPDATE company SET company_name='$company_name' , company_details='$company_details' , email = '$email'
	 WHERE id='$id'");
	if($result){
		echo 'data updated';
	}

}
?>
