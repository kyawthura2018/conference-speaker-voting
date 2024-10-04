<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$description = $_POST['description'];
		$title = $_POST['title'];

		$sql = "UPDATE questions SET description = '$description', title = '$title' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Question updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: questions.php');

?>
