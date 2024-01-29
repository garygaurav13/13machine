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
                        $commonPage = getById("common_pages", $id);
                        if(mysqli_num_rows($commonPage) > 0)
                        {
                            $data = mysqli_fetch_array($commonPage);
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><h4><b>Edit Common-Page</b></h4></div>
                                        <div class="col-md-6"><a href="commonPages.php" class="btn btn-primary" style="float: right; font-size: 19px; font-weight: 700;">View</a></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="userId" value="<?= $data['id']; ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="name" class="form-label">Page Title</label>
                                                <input type="text" name="page_title" value="<?= $data['page_title']?>" required class="form-control" placeholder="Enter Page Title"></input>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" name="slug" value="<?= $data['slug']?>" required class="form-control" placeholder="Enter slug"></input>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="slug" class="form-label">Template</label>
                                                <input type="text" name="template" value="<?= $data['template']?>" required class="form-control" placeholder="Enter template"></input>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="role">Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="<?= $data['status']?>"><?= $data['status']?></option>
                                                    <option value="active">Active</option>
                                                    <option value="deactive">Deactive</option>
                                                </select>
                                            </div>
                                        </div><br>
                                        
                                        <div class="mb-3">
                                                <label for="slug" class="form-label">Page content</label>
                                                <textarea type="text" name="page_content" rows="5" class="form-control" placeholder="Enter Page Content"><?= $data['page_content']?></textarea>
                                        </div><br>
                                        <div class="mb-3">
                                            <button type="submit" value="submit" name="updateCommonPagesSubmit" class="btn btn-primary">Submit</button>
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