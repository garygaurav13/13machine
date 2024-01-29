<?php
session_start();
include('../middleware/adminMiddlewere.php'); 
include('includes/header.php');
?>
<div class="wrapper container">
    <div class="py-5">
        <div class="row">
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><h4><b>Create Sub-Admin</b></h4></div>
                        <div class="col-md-6"><a href="subAdmin.php" class="btn btn-primary" style="float: right; font-size: 19px; font-weight: 700;">View</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstname" class="form-label">Firstname</label>
                                <input type="text" name="firstname" class="form-control" placeholder="Enter your first name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="form-label">Lastname</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Enter Your name">
                            </div>
                        </div>
                      
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter Your username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Your email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Your number" >
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Your password" id="exampleInputPassword1">
                        </div>
                        <button type="submit" name="subAdminSubmit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>