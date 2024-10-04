<?php
session_start();
include 'includes/conn.php';
//generate voters id
$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$unique_id = substr(str_shuffle($set), 0, 6);
if(isset($_SESSION['voter'])){
  header('location: home.php');
}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition layout-top-nav">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <div class="wrapper">
    <span id="unique_id_store" hidden><?= $unique_id; ?></span>
    <script>
    $(document).ready(function (){
      var checkStorage = localStorage.getItem('unique_id');
      var unique_id = '';
      if(checkStorage != null){
        unique_id = checkStorage;
      }
      var generated_id = $('#unique_id_store').text();
      $('.btnview').click(function (){
        var speaker_id = $(this).next('.speaker_user').text();
        if(checkStorage == null){
          localStorage.setItem('unique_id',generated_id);
          window.location='speakercheck.php?id='+generated_id+'&&speaker_id='+speaker_id;
        }
        else {
          window.location='speakercheck.php?id='+unique_id+'&&speaker_id='+speaker_id;
        }
      });
    });
    </script>
    <?php include 'includes/navbarforspeaker.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Speakers</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
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
            $sql = "SELECT * FROM admin ORDER BY username ASC";
            $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){?>


              <div class="col-md-3">
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img alt="Avatar" class="profile-user-img img-fluid img-circle" src="<?php echo (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg'; ?>">
                    </div>

                    <h3 class="profile-username text-center"><?php echo $row['firstname']." ".$row['lastname'];?></h3>

                    <p class="text-muted text-center">Software Engineer</p>

                    <h5 class="text-muted text-center">Title</h5>

                    <h6 class="text-muted text-center"><span class="badge badge-success">In Progress</span></h6>

                    <button name="speaker" class="btn btn-primary btn-block btnview" id="viewbtn" value="<?= $row['username']; ?>"><b>View</b></button>
                    <span class="speaker_user" style="display: none;"><?php echo $row['username'];?></span>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>

            <?php }?>
        </div>
        <!-- /.card -->
      </section>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

</body>
</html>
