<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition layout-top-nav">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<div class="wrapper">
		<script>

		$(document).ready(function(){

			$('.btn-vote').click(function(){

				var questionid = $(this).next('.question_id').text();

				var vote_type = $(this).next().next('.vote_type').text();
				window.location='vote.php?question_id='+questionid+'&&vote_type='+vote_type;

			});
		});
		</script>

		<?php include 'includes/navbar.php'; ?>
		<?php include 'includes/functions.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">
					<?php
					$speaker = $_SESSION['speakerid'];
					$parse = parse_ini_file('admin/config.ini', FALSE, INI_SCANNER_RAW);
					$title = $parse['election_title'];
					?>
					<h1 class="page-header text-center title"><b><?php echo strtoupper($title);
					?></b></h1>

					<?php
					if(isset($_SESSION['error'])){
						echo "
						<div class='alert alert-danger alert-dismissible'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<h4><i class='icon fa fa-warning'></i> Error!</h4>
						".$_SESSION['error']."
						</div>
						";
						unset($_SESSION['error']);
					}
					if(isset($_SESSION['success'])){
						echo "
						<div class='alert alert-success alert-dismissible'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<h4><i class='icon fa fa-check'></i> Success!</h4>
						".$_SESSION['success']."
						</div>
						";
						unset($_SESSION['success']);
					}
					?>

					<div class="row">
						<?php
						$qids = "";
						if(isset($_SESSION['votedqid']))
						{
							$qids = $_SESSION['votedqid'];
						}
						$voter_id_array = explode(",",$qids);

						$sql = "SELECT * FROM questions WHERE publishdate IS NOT NULL and speakerid = '$speaker'";
						$result = $conn->query($sql);

						while($row = $result -> fetch_assoc()){
							?>
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title m-0"><i class="fas fa-ribbon"></i><b><?php echo $row['title']; ?></b></h5>
										<div class="card-tools">
											<span class="badge bg-info"><?php echo $row['agree']; ?> <i class="far fa-thumbs-up"></i></span>
											<span class="badge bg-primary"><?php echo $row['disagree']; ?> <i class="far fa-thumbs-down"></i></span>
										</div>
									</div>
									<div class="card-body">

										<p class="card-text">
											<?= $row['description']; ?>
										</p>
										<?php

										if(!in_array($row['id'],$voter_id_array)){
											?>
											<button class="btn btn-success btn-vote">Agree</button>
											<span class="question_id" style="display:none;"><?php echo $row['id'];?></span>
											<span class="vote_type" style="display:none;">agree</span>
											<button class="btn btn-danger btn-vote">Disagree</button>
											<span class="question_id" style="display:none;"><?php echo $row['id'];?></span>
											<span class="vote_type" style="display:none;">disagree</span>
										<?php } ?>
									</div>
								</div>
							</div>
							<!-- /.col-md-6 -->
							<?php
						}
						?>
					</div>
				</section>

			</div>
		</div>

		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
</body>
</html>
