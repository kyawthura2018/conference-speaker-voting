<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <?php
        $speaker = $_SESSION['admin'];
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
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <?php
                  $sql = "SELECT * FROM questions WHERE speakerid = '$speaker'";
                  $query = $conn->query($sql);

                  echo "<h3>".$query->num_rows."</h3>";
                  ?>

                  <p>No. of Questions</p>
                </div>
                <div class="icon">
                  <i class="fa fa-tasks"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php
                  $sql = "SELECT * FROM voters";
                  $query = $conn->query($sql);

                  echo "<h3>".$query->num_rows."</h3>";
                  ?>

                  <p>Total Voters</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->

      </section>
      <!-- right col -->
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h4>Vote Results<h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <th>No</th>
                      <th>Title</th>
                      <th>Publish Date</th>
                      <th>Agree</th>
                      <th>Disagree</th>
                    </thead>
                    <tbody>
                      <?php
                        //$sql = "SELECT *, candidates.firstname AS canfirst, candidates.lastname AS canlast, voters.firstname AS votfirst, voters.lastname AS votlast FROM votes LEFT JOIN positions ON positions.id=votes.position_id LEFT JOIN candidates ON candidates.id=votes.candidate_id LEFT JOIN voters ON voters.id=votes.voters_id ORDER BY positions.priority ASC";
                        $sql = "SELECT * FROM questions WHERE publishdate IS NOT NULL and speakerid = '$speaker'";
                        $query = $conn->query($sql);
                        $n = 1;
                        while($row = $query->fetch_assoc()){
                          echo "
                            <tr>
                              <td>".$n++."</td>
                              <td>".$row['title']."</td>
                              <td>".$row['publishdate']."</td>
                              <td>".$row['agree']."</td>
                              <td>".$row['disagree']."</td>
                            </tr>
                          ";
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    </div>
    <?php include 'includes/footer.php'; ?>

  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>
</body>
</html>
