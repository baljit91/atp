<?php
require 'config/config.php';

echo 'data not updated';

if(isset($_POST['que_id'])){

	
	$que_id = $_POST['que_id'];

	//  query to update data

	$result  = mysqli_query($con , "SELECT * FROM questions WHERE id = '$que_id' ");

	while($row = mysqli_fetch_array($result)){
		$data["question"] = $row['question'];
		$data["option_1"] = $row['option_1'];
		$data["option_2"] = $row['option_2'];
		$data["option_3"] = $row['option_3'];
		$data["option_4"] = $row['option_4'];

		$data["correct_option"] = $row['correct_option'];
		$data["level"] = $row['level'];
	}

	echo json_encode($data);
}
?>