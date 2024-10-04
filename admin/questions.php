<?php include 'includes/session.php'; ?>
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
                <li class="breadcrumb-item active">Questions</li>
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
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a class="btn btn-info btn-sm" href="#addnew" data-toggle="modal">
                    <i class="fas fa-plus">
                    </i>
                    New
                  </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-striped">
                    <thead>
                      <th>Title</th>
                      <th style="width:50%;">Description</th>
                      <th style="width:24%;">Tools</th>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM questions WHERE publishdate IS NULL and speakerid = '$speaker' ORDER BY priority ASC";
                      $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                        echo "
                        <tr>
                        <td>".$row['title']."</td>
                        <td>".$row['description']."</td>
                        <td>
                        <button class='btn btn-primary btn-sm publish btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Publish</button>
                        <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                        <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                        </td>
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
    <?php include 'includes/positions_modal.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>
  $(function(){
    $(document).on('click', '.edit', function(e){
      e.preventDefault();
      $('#edit').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click', '.delete', function(e){
      e.preventDefault();
      $('#delete').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click', '.publish', function(e){
      e.preventDefault();
      $('#publish').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

  });

  function getRow(id){
    $.ajax({
      type: 'POST',
      url: 'positions_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('.id').val(response.id);
        $('#edit_description').val(response.description);
        $('#edit_title').val(response.title);
        $('.description').html(response.description);
        $('.title').html(response.title);
      }
    });
  }
</script>
</body>
</html>
