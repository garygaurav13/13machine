<?php
session_start();
include('../middleware/adminMiddlewere.php'); 
include('includes/header.php');
?>
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
                                    <h4>Edit User</h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" class="input" name="userId" value="<?= $data['id'] ?>"></input>
                                                <label for="status">Status</label>
                                                <label for="role">Role</label>
                                                <select class="form-control" name="status" >
                                                    <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>
                                                    <option value="active">Active</option>
                                                    <option value="deactive">Deactivate</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="role">Role</label>
                                                <select class="form-control" name="role" >
                                                    <option value="<?= $data['role'] ?>"><?= $data['role'] ?></option>
                                                    <option value="dealer">Dealer</option>
                                                    <option value="customer">Customer</option>
                                                </select>
                                            </div><br>
                                            <div class="col-md-12">
                                                <label></label>
                                                <div class="sub"></div>
                                                <button class="btn btn-primary" name="updateStatusRole" value="submit">Update Status/Role</button>
                                            </div>
                                        </div>
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
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>