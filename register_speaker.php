<?php
session_start();
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
	<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>CF</b> Voting System</a>
  </div>


	<?php
	if(isset($_SESSION['error'])){
		echo "
		<div class='callout callout-danger text-center mt20'>
		<p>".$_SESSION['error']."</p>
		</div>
		";
		unset($_SESSION['error']);
	}
	if(isset($_SESSION['success'])){
		echo "
		<div class='callout callout-success text-center mt20'>
		<p>".$_SESSION['success']."</p>
		</div>
		";
		unset($_SESSION['success']);
	}
	?>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new speaker</p>

      <form action="register.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name = "username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Firstname" name = "firstname" required>
        </div>
				<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Lastname" name = "lastname" required>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name = "password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="file" id="photo" name="photo">
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="register">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
		</div>
</div>

  <?php include 'includes/scripts.php' ?>
</body>
</html>
