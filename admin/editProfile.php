<?php
session_start();
include('../middleware/adminMiddlewere.php'); 
include('includes/header.php');
?>
<style>
.mb-3, .my-3 {
    padding-right: 15px;
}
</style>
<div class="wrapper container">
    <div class="py-5">
        <div class="row">
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
                <?php
                    if(isset($_GET['id']))
                    {
                        $id =$_GET['id'];
                        $user = getById("users", $id);

                        if(mysqli_num_rows($user) > 0)
                        {
                            $data = mysqli_fetch_array($user);
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><h4><b>Edit Profile</b></h4></div>
                                        <div class="col-md-6"><a href="profile.php" class="btn btn-primary" style="float: right; font-size: 19px; font-weight: 700;">View</a></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="userId" value="<?= $data['id']; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="firstname" class="form-label">Firstname</label>
                                                <input type="text" name="firstname" class="form-control" value="<?= $data['firstname']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="lastname" class="form-label">Lastname</label>
                                                <input type="text" name="lastname" class="form-control" value="<?= $data['lastname']; ?>">
                                            </div>
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" value="<?= $data['username']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email" value="<?= $data['email']; ?>" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="number" name="phone" class="form-control" value="<?= $data['phone']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-control" name="role" >
                                                <option value="<?= $data['role'] ?>"><?= $data['role'] ?></option>
                                                <option value="dealer">Dealer</option>
                                                <option value="customer">Customer</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-control" name="status" >
                                                <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>
                                                <option value="active">Active</option>
                                                <option value="deactive">Deactivate</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="profileSubmit" value="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                    }
                    else
                    {
                        echo "Id Missing From URL";
                    }
                ?>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><h4><b>Password</b></h4></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post">
                            <input type="hidden" name="userId" value="<?= $data['id']; ?>">
                        
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmPassword">
                            </div>
                            
                            <button type="submit" name="passwordSubmit" value="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>