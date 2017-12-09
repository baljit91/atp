
<?php
require 'config/config.php';

echo 'data not updated';

if(isset($_POST['email'])){

	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$zipcode = $_POST['zipcode'];
	$university = $_POST['university'];
	$university_state = $_POST['university_state'];
	$year_of_completion = $_POST['year_of_completion'];
	$id = $_POST['id'];

	//  query to update data

	$result  = mysqli_query($con , "UPDATE users SET first_name='$firstName' , last_name='$lastName' , email = '$email',
		address = '$address', state = '$state' , city = '$city', zipcode = '$zipcode', university = '$university',
		university_state = '$university_state' , year_of_completion = '$year_of_completion'
	 WHERE id='$id'");
	if($result){
		echo 'data updated';
	}

}
?>
