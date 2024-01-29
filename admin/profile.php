<?php
session_start();
include('../middleware/adminMiddlewere.php'); 
include('includes/header.php');
$id = $_SESSION['auth_user']['id'];
?>
<style>
    .card {
        width: 70%;
        height: 500px;
        background-color: #efefef;
        border: none;
        cursor: pointer;
        transition: all 0.5s;
    }

    .image img {
        transition: all 0.5s
    }

    .card:hover .image img {
        transform: scale(1.5)
    }

    .name {
        font-size: 31px;
        font-weight: bold
    }
    .idd, .idd h6 {
        padding-top: 17px;
        font-size: 20px;
        font-weight: 400;
        display: inline-flex;
    }

    .idd1 {
        font-size: 12px
    }

    .number {
        font-size: 22px;
        font-weight: bold
    }

    .follow {
        font-size: 12px;
        font-weight: 500;
        color: #444444
    }

    .btn1 {
        height: 40px;
        width: 150px;
        border: none;
        background-color: #000;
        color: #aeaeae;
        font-size: 15px
    }

    .text span {
        font-size: 13px;
        color: #545454;
        font-weight: 500
    }

    .icons i {
        font-size: 19px
    }

    hr .new1 {
        border: 1px solid
    }

    .join {
        font-size: 14px;
        color: #a0a0a0;
        font-weight: bold
    }
</style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>All Users</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php if(isset($_SESSION['message']))
            { 
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['message']);
            }?>    
            <div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
                <div class="card p-4">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                    <a href="editProfile.php?id=<?= $id; ?>" class="btn btn-primary" style="float: right; font-size: 19px; font-weight: 700;">Edit Profile</a>
                </div>
              <div class="card-body">
                <?php
                    $user = getProfile("users", $id);        
                    if(mysqli_num_rows($user) > 0)
                    {
                        foreach($user as $row)
                        { ?>
                        <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                            <button class="btn btn-secondary"> <img src="assets/dist/img/icon.png" alt="" height="100" width="100" /></button> 
                            <span class="name mt-3"><?= $row['firstname'].' '.$row['lastname'] ?></span> 
                            <span class="idd"><strong>Role:&nbsp;</strong> <?= $row['role']; ?></span> 
                            <span class="idd"><strong>Email Id:&nbsp;</strong> <?= $row['email']; ?></span> 
                            <span class="idd"><strong>Phone No:&nbsp;</strong> <?= $row['phone']; ?></span> 
                        </div> 
                        <?php
                        }
                    }
                ?>
              </div>
                </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include('includes/footer.php'); ?>