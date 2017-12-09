<?php
require 'config/config.php';

echo 'data not updated';

if(isset($_POST['que_id'])){

	
	$que_id = $_POST['que_id'];

	//  query to update data

	$result  = mysqli_query($con , "SELECT correct_option,level FROM questions WHERE id = '$que_id' ");

	while($row = mysqli_fetch_array($result)){
		$data["answer"] = $row['correct_option'];
		$data["level"] = $row['level'];
	}

	echo json_encode($data);
}
?>