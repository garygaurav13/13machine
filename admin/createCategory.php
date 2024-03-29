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
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><b>Create Category</b></h4>
                        </div>
                        <div class="col-md-6"><a href="viewCategory.php" class="btn btn-primary"
                                style="float: right; font-size: 19px; font-weight: 700;">View Category</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data" id="createCategory">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Category name"></input>
                                <span class="error" id="name-Error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control"
                                placeholder="Enter Slug"></input>
                                <span class="error" id="slug-Error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Category H1</label>
                            <input type="text" name="cat_h1" id="cat_h1" class="form-control"
                                placeholder="Enter Category H1"></input>
                                <span class="error" id="cat_h1-Error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Category H2</label>
                            <input type="text" name="cat_h2" id="cat_h2" class="form-control"
                                placeholder="Enter Category H2"></input>
                                <span class="error" id="cat_h2-Error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" name="description" id="description" class="form-control" rows="7"
                                placeholder="Enter description"></textarea>
                                <span class="error" id="description-Error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Short Description</label>
                            <textarea type="text" name="shortdescription" id="shortdescription" class="form-control" rows="7"
                                placeholder="Enter short  description"></textarea>
                                <span class="error" id="shortdescription-Error"></span>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label for="sales_price" class="form-label">Display Type</label>
                                <div class="radio_div" style="display:flex;">
                                    <div class="form-label" style="margin-right: 10px;">
                                        <input class="display_type" type="radio" id="Default" name="dsiplay_type" value="default">
                                        <label for="html">Default</label>
                                    </div>
                                    <div class="form-label" style="margin-right: 10px;">
                                        <input class="display_type" type="radio" id="Products" name="dsiplay_type" value="products">
                                        <label for="css">Products</label>
                                    </div>
                                    <div class="form-label" style="margin-right: 10px;">
                                        <input class="display_type" type="radio" id="Subcategories" name="dsiplay_type" value="subcategories">
                                        <label for="javascript">Subcategories</label>
                                    </div>
                                    <div class="form-label" style="margin-right: 10px;">
                                        <input class="display_type" type="radio" id="BotH" name="dsiplay_type" value="both">
                                        <label for="javascript">BotH</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="is_sold" class="form-label">Priority</label>
                                <div class="radio_div" style="display:flex;">
                                    <div class="form-label" style="margin-right: 10px;">
                                        <input type="radio" id="html" name="Priority" value="0">
                                        <label for="html">Yes</label>
                                    </div>
                                    <div class="form-label" style="margin-right: 10px;">
                                        <input type="radio" id="css" name="Priority" value="1">
                                        <label for="css">No</label>
                                    </div>
                                </div>
                                <span class="error" id="rops_type-Error"></span>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="status" ccreateProductslass="form-label">Status</label>
                                <select id="" class="form-control" name="status">
                                    <option value="active">Active</option>
                                    <option value="deactive">Not Active</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                            <label for="inventory" class="form-label">Related Search</label>
                                <input type="text" name="related_search" id="related_search" class="form-control"
                                    placeholder="Enter Realted Search">
                                    <span class="error" id="related_search-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="on_sale" class="form-label">Category Image</label>
                                <input type="file" name="image" accept="image/*"  id="image">
                                <span class="error" id="image-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="bullet_proof" class="form-label">Category Bnaner Image</label>
                                <input type="file" name="image_banner" accept="image/*"  id="image_banner">
                                <span class="error" id="image_banner-Error"></span>
                            </div>
                        </div><br>
                        
                        <div class="mb-3">
                            <button type="submit" value="submit" name="createCategorySubmit"
                                class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
#image-Error {
    color: red;
    font-weight: 600;
    font-size: 18px;
    display: flex;
}
.error{
    color: red;
    font-weight: 600;
    font-size: 18px; 
}
</style>
<?php include('includes/footer.php'); ?>