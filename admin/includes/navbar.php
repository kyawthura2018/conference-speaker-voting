<!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="modal" href="#profile">
            <i class="fas fa-user-alt"></i>
            Profile
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-sign-out-alt"></i>
            Logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
<?php include 'includes/profile_modal.php'; ?>
