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
                        $user = getTestimonialID("testimonials", $id);

                        if(mysqli_num_rows($user) > 0)
                        {
                            $data = mysqli_fetch_array($user);
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Testimonial</h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="post">      
                                        <input type="hidden" name="userId" value="<?= $id ?>">            
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" value="<?= $data['title'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea type="text" class="form-control" name="description" rows="7"><?= $data['description'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" >
                                                <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>
                                                <option value="active">Active</option>
                                                <option value="pending">Pending</option>
                                                <option value="deactive">Deactive</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="updateTestimonial" value="submit" class="btn btn-primary">Submit</button>
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