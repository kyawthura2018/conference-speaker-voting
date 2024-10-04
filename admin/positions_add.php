<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$description = $_POST['description'];
		$title = $_POST['title'];
		$speaker = $_SESSION['admin'];

		$sql = "SELECT * FROM questions ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;

		$sql = "INSERT INTO questions (title,description,publishdate,priority,speakerid,agree,disagree) VALUES ( '$title','$description', null, '$priority', '$speaker', 0, 0)";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Questions added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: questions.php');
?>
