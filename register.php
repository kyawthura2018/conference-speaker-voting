<?php
	include 'includes/conn.php';

	if(isset($_POST['register'])){
    $username = $_POST['username'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$filename = $_FILES['photo']['name'];
    $created = date("Y/m/d");
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);
		}

		$sql = "INSERT INTO admin (username, password, firstname, lastname, photo, created_on) VALUES ('$username', '$password', '$firstname', '$lastname', '$filename','$created')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Speaker added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: register_speaker.php');
?>
