<?php
 include("header.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
		if(!empty($_POST['Search'])){
			$company_name = $_POST['Search'];
			$_SESSION['company_id'] = $company_name;
			 $query = "SELECT * FROM company WHERE company_name = '$company_name'";
			 $result = mysqli_query($con, $query);


			while($row = mysqli_fetch_array($result)) {
				$_SESSION['company_id'] = $row['id'];
				$_SESSION['company_name'] = $row['company_name']
			?>

			<a href="test_display.php"><?php echo $row['company_name'],$_SESSION['company_id']; ?></a>

		<?php }

		}else{
			header("Location: profile.php?error=Fields%20required!");
		}


	?>

<a href="profile.php">done</a>
</body>
</html>