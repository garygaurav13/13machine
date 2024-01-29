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
                        $user = getById("countries", $id);
                        if(mysqli_num_rows($user) > 0)
                        {
                            $data = mysqli_fetch_array($user);
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><h4><b>Edit Country</b></h4></div>
                                        <div class="col-md-6"><a href="countries.php" class="btn btn-primary" style="float: right; font-size: 19px; font-weight: 700;">View</a></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="userId" value="<?= $data['id']; ?>">
                                        <div class="mb-3">
                                            <label for="shortname" class="form-label">Country Code Name</label>
                                            <input type="text" name="shortname" class="form-control" value="<?= $data['shortname']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Country Name</label>
                                            <input type="text" class="form-control" name="name" value="<?= $data['name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phonecode" class="form-label">Country Phonecode</label>
                                            <input type="text" name="phonecode" class="form-control" value="<?= $data['phonecode']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="editCountrySubmit" value="submit" class="btn btn-primary">Submit</button>
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