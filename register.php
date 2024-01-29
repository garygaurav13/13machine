<?php 
session_start();    
if(isset($_SESSION['auth'])){
    $_SESSION['message'] ="You are already logged In";
    header('Location: index.php');
    exit();
}
include('includes/header.php'); ?>

<div class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if(isset($_SESSION['message']))
            { 
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['message']);
            }?>    
            <div class="card">
                <div class="card-header">
                    <h4>Registeration Form</h4>
                </div>
                <div class="card-body">
                <form action="function/authcode.php" method="post">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Enter your first name">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Enter Your name">
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
                    <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>


<?php include('includes/footer.php'); ?>