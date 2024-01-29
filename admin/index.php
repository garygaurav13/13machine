<?php
session_start();
include('../middleware/adminMiddlewere.php'); 
include('includes/header.php');
?>
    <div class="wrapper container">
        <div class="py-5">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <?php if(isset($_SESSION['message']))
                    { 
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                    }?>  
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('includes/footer.php'); ?>