<?php
session_start();
if(isset($_SESSION['admin'])){
  header('location: admin/home.php');
}

if(isset($_SESSION['voter'])){
  header('location: home.php');
}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>CF</b> Voting System
    </div>
    <div class="card">
      <div class="login-card-body">
        <p class="login-box-msg">Enter room to share your opinion</p>

        <form action="login.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Speaker's ID" required>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fas fa-sign-in-alt"></i> Sign In</button>
            </div>
            <div class="col-12">
            <div class="social-auth-links text-center mb-3">
              <p>- OR -</p>
              <a href="speakerlist.php" class="btn btn-block btn-info">
                <i class="fab fa-connectdevelop"></i> View as Opinions Sharer
              </a>
              <a href="register_speaker.php">
                Register Speaker
              </a>
            </div>
          </div>
          </div>
        </form>
      </div>
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
    ?>
  </div>

  <?php include 'includes/scripts.php' ?>
</body>
</html>
