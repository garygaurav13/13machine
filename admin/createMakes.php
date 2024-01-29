<?php
session_start();
include('../middleware/adminMiddlewere.php'); 
include('includes/header.php');
?>
<div class="wrapper container">
    <div class="py-5"></div>
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
                        <div class="col-md-6"><h4><b>Create Product Makes</b></h4></div>
                        <div class="col-md-6"><a href="makes.php" class="btn btn-primary" style="float: right; font-size: 19px; font-weight: 700;">View</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post">
                        <div class="mb-3">
                            <label for="makes" class="form-label">Makes Name</label>
                            <input type="text" name="makes" class="form-control" placeholder="Enter Makes Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="role">Status</label>
                            <select class="form-control" name="status">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <button type="submit" name="makesSubmit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>