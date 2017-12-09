<?php
require 'config/config.php';


if(isset($_POST['id'])){

	$company_name = $_SESSION['company_name'];
	$id = $_POST['id'];

	//  query to update data

	$result  = mysqli_query($con , "SELECT id,level FROM questions WHERE company_name = '$company_name' ");
	$output = array();

	while($row = mysqli_fetch_array($result)){
		$data["question_id"] = $row['id'];
		$data["level"] = $row['level'];
		array_push($output, $data);
	}

	echo json_encode($output);
}
?>