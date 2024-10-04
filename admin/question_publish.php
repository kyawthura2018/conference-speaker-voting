<?php
	include 'includes/session.php';

	if(isset($_POST['publish'])){
		$id = $_POST['id'];
    $date = date("Y/m/d");
		$sql = "UPDATE questions SET publishdate = '$date' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Questions published successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: questions.php');

?>
