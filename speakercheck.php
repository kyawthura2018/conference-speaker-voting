<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_GET['speaker_id'])&&isset($_GET['id'])){
		$username = $_GET['speaker_id'];
		$voterid = $_GET['id'];

		$sql = "SELECT * FROM voters WHERE voterid = '$voterid'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			//$_SESSION['error'] = 'Cannot find account with the username';
			$vsql = "INSERT INTO voters (voterid,votedquestions) VALUES ('$voterid','')";
			if($conn->query($vsql)){
				$_SESSION['speakerid'] = $username;
				$_SESSION['voter'] = $voterid;
				$_SESSION['success'] = 'Position added successfully';
			}else{
				$_SESSION['error'] = 'Cannot Created';
			}
		}
		else{
			$_SESSION['speakerid'] = $username;
			$_SESSION['voter'] = $voterid;
			while ($row = $query->fetch_assoc()) {
				$_SESSION['votedqid'] = $row['votedquestions'];
			}
		}

	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: speakerlist.php');

?>
