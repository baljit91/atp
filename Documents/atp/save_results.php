
<?php
require 'config/config.php';

echo 'data not updated';

if(isset($_POST['score'])){



	$company_id      =$_SESSION['company_id'];
	$company_name  = $_SESSION['company_name'];
	$user_id = $_SESSION['id'];

	$score = $_POST['score'];
	$total_questions = $_POST['total_questions'];
	$correct = $_POST['correct'];
	$wrong = $_POST['wrong'];
	$easy_correct = $_POST['easy_correct'];
	$medium_correct = $_POST['medium_correct'];
	$hard_correct = $_POST['hard_correct'];
	$unanswered = $_POST['unanswered'];
	$total_easy = $_POST['total_easy'];
	$total_medium = $_POST['total_medium'];
	$total_hard = $_POST['total_hard'];
	$fname = $_SESSION['first_name'];
	$lname = $_SESSION['last_name'];
	$user_email = $_SESSION['email'];


	

	//  query to insert data

	$query = mysqli_query($con,"INSERT INTO test VALUES('', '$user_id', '$company_id ', '$score','$correct','$wrong', '$easy_correct', 
		'$medium_correct', '$hard_correct', '$unanswered','$total_questions','$total_easy',
		'$total_medium','$total_hard', '$user_email', '$fname ','$lname ','$company_name ' )");

	if($query){
		echo 'data inserted';
	}

}
?>
