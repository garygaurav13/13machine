<?php
session_start();
include('../middleware/adminMiddlewere.php');
include('includes/header.php');
?>
<div class="wrapper container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php if (isset($_SESSION['message'])) {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                unset($_SESSION['message']);
            } ?>
            <?php
                    if(isset($_GET['id']))
                    {
                        $id =$_GET['id'];
                        $category = getById("category", $id);

                        if(mysqli_num_rows($category) > 0)
                        {
                            $data = mysqli_fetch_array($category);
                            ?>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><b>Edit Category</b></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="cat_id" value="<?= $data['id'] ?>"/>
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" name="name" required class="form-control"
                                    placeholder="Enter Category name" value="<?= $data['name'] ?>"></input>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" required class="form-control"
                                    placeholder="Enter Slug" value="<?= $data['slug'] ?>"></input>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Category H1</label>
                                <input type="text" name="cat_h1" required class="form-control"
                                    placeholder="Enter Category H1" value="<?= $data['category_h1'] ?>"></input>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Category H2</label>
                                <input type="text" name="cat_h2" required class="form-control"
                                    placeholder="Enter Category H2" value="<?= $data['category_h2'] ?>"></input>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea type="text" name="description" required class="form-control" rows="7"
                                    placeholder="Enter description"><?= $data['description'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Short Description</label>
                                <textarea type="text" name="shortdescription" required class="form-control" rows="7"
                                    placeholder="Enter short  description"><?= $data['short_description'] ?></textarea>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sales_price" class="form-label">Display Type</label>
                                    <div class="radio_div" style="display:flex;">
                                        <div class="form-label" style="margin-right: 10px;">
                                            <input type="radio" id="html" name="dsiplay_type" value="default" <?= $data['display_type']=='default'?'checked':'' ?>>
                                            <label for="html">Default</label>
                                        </div>
                                        <div class="form-label" style="margin-right: 10px;">
                                            <input type="radio" id="css" name="dsiplay_type" value="products" <?= $data['display_type']=='products'?'checked':'' ?>>
                                            <label for="css">Products</label>
                                        </div>
                                        <div class="form-label" style="margin-right: 10px;">
                                            <input type="radio" id="javascript" name="dsiplay_type"
                                                value="subcategories" <?= $data['display_type']=='subcategories'?'checked':'' ?>>
                                            <label for="javascript">Subcategories</label>
                                        </div>
                                        <div class="form-label" style="margin-right: 10px;">
                                            <input type="radio" id="javascript" name="dsiplay_type" value="both" <?= $data['display_type']=='both'?'checked':'' ?>>
                                            <label for="javascript">BotH</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">


                                    <label for="is_sold" class="form-label">Priority</label>
                                    <div class="radio_div" style="display:flex;">
                                        <div class="form-label" style="margin-right: 10px;">
                                            <input type="radio" id="html" name="Priority" value="1" <?= $data['priority']=='1'?'checked':'' ?>>
                                            <label for="html">Yes</label>
                                        </div>
                                        <div class="form-label" style="margin-right: 10px;">
                                            <input type="radio" id="css" name="Priority" value="0" <?= $data['priority']=='0'?'checked':'' ?>>
                                            <label for="css">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="status" ccreateProductslass="form-label">Status</label>
                                    <select required class="form-control" name="status">
                                        <option value="active" <?= $data['status']=='active'?'selected':'' ?> >Active</option>
                                        <option value="deactive" <?= $data['status']=='deactive'?'selected':'' ?>>Not Active</option>
                                        <option value="pending" <?= $data['status']=='pending'?'selected':'' ?> >Pending</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inventory" class="form-label">Related Search</label>
                                    <input type="text" name="related_search" required class="form-control"
                                        placeholder="Enter Realted Search" value="<?= $data['related_searches'] ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="on_sale" class="form-label">Category Image</label>
                                    <input type="file" name="image" accept="image/*" value="<?= $data['category_image'] ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="bullet_proof" class="form-label">Category Bnaner Image</label>
                                    <input type="file" name="image_banner" accept="image/*" value="<?= $data['category_banner_image'] ?>">
                                </div>
                            </div><br>

                            <div class="mb-3">
                                <button type="submit" value="submit" name="updateCategorySubmit"
                                    class="btn btn-primary">Submit</button>
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
    <?php include('includes/footer.php'); ?>