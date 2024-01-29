<?php session_start(); ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
      <a class="navbar-brand" href="#">Machinerytrader</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <?php 
          if(isset($_SESSION['auth']))
          { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?= $_SESSION['auth_user']['firstname']; ?>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  <li><a class="dropdown-item" href="admin/">Dashboard</a></li>
                </ul>
              </li>
            <?php  
          }
          else
          { ?>
            <!-- <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li> -->
            <?php  
          }
        ?>
      </ul>
    </div>
  </div>
</nav>