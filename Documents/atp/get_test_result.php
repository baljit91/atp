<?php
require 'config/config.php';



if(isset($_POST['id'])){

	
	$test_id = $_POST['id'];

	//  query to update data

	$result  = mysqli_query($con , "SELECT * FROM test WHERE test_id = '$test_id' ");

	while($row = mysqli_fetch_array($result)){
		$data["score"] = $row['score'];
		$data["correct_answers"] = $row['correct_answers'];
		$data["wrong_answers"] = $row['wrong_answers'];
		$data["unanswered"] = $row['unanswered'];
		$data["total_questions"] = $row['total_questions'];

		$data["easy_correct"] = $row['easy_correct'];
		$data["medium_correct"] = $row['medium_correct'];
		$data["hard_correct"] = $row['hard_correct'];
		$data["total_easy"] = $row['total_easy'];
		$data["total_medium"] = $row['total_medium'];
		$data["total_hard"] = $row['total_hard'];
	}

	echo json_encode($data);
}
?>