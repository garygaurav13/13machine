  <?php $username = $_SESSION['auth_user']['firstname']; ?>
  <style>
    ul.navbar-nav.ml-auto {
      margin-right: 41px;
      margin-bottom: 13px;
    }
    li.nav-item.dropdown a img {
      margin-right: 17px;
    }
    li.nav-item.dropdown a {
      font-size: 23px;
    }
    .dropdown-menu.dropdown-menu-lg.dropdown-menu-right.show a {
      font-size: 16px;
    }
  </style>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
<?php
// phpinfo();
?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" style="color: #000;font-weight: bold; text-transform: capitalize;">
          <img src="assets/dist/img/icon.png" alt="" width="40px"><?php echo $username; ?> <i class="fa fa-chevron-down" style="font-size:16px"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="profile.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> View Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="../logout.php" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <?php print_r($_SESSION['auth_user']['role']); ?>
