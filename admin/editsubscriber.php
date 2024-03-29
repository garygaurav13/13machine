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
                        $id = $_GET['id'];
                        $user = getById("subscribers", $id);
                        if(mysqli_num_rows($user) > 0)
                        {
                            $data = mysqli_fetch_array($user);
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><h4><b>Edit Subscribers</b></h4></div>
                                        <div class="col-md-6"><a href="subscribers.php" class="btn btn-primary" style="float: right; font-size: 19px; font-weight: 700;">View</a></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="userId" value="<?= $data['id']; ?>">
                                        <!-- <input type="hidden" name="updated_at" value="< ?= $data['updated_at']; ?>"> -->
                                        <div class="mb-3">
                                            <label for="shortname" class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control" value="<?= $data['email']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Category</label>
                                            <input type="text" class="form-control" name="category" value="<?= $data['category']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-control" name="status" >
                                                <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>
                                                <option value="active">Active</option>
                                                <option value="deactive">Deactivate</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="editSubscribersSubmit" value="submit" class="btn btn-primary">Submit</button>
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