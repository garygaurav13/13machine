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
                            <h4><b>Create Product</b></h4>
                        </div>
                        <div class="col-md-6"><a href="viewProduct.php" class="btn btn-primary"
                                style="float: right; font-size: 19px; font-weight: 700;">View Products</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data" id="createProducts">
                        <input type="hidden" id="selected_state" value="0">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Your name"></input>
                            <span class="error" id="nameError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control"
                                placeholder="Enter Slug"></input>
                            <span class="error" id="slugError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" id="description" name="description" class="form-control" rows="7"
                                placeholder="Enter description"></textarea>
                            <span class="error" id="descriptionError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="admin_note" class="form-label">Admin Note</label>
                            <textarea type="text" id="adminnote" name="admin_note" class="form-control" rows="7"
                                placeholder="Enter admin_note"></textarea>
                            <span class="error" id="admin_noteError"></span>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <label for="sales_price" class="form-label">Sales Price</label>
                                <input type="text" name="sales_price" id="sales_price" class="form-control"
                                    placeholder="Enter your sales_price">
                                <span class="error" id="salePriceError"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="inventory" class="form-label">Inventory</label>
                                <input type="number" name="inventory" id="inventory" class="form-control"
                                    placeholder="Enter inventory">
                                <span class="error" id="inventoryError"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="vin_number" class="form-label">Vin Number</label>
                                <input type="text" name="vin_number" id="vin_number" class="form-control"
                                    placeholder="Enter Vin-Number">
                                <span class="error" id="vinNumberError"></span>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="pending">Pending</option>
                                    <option value="in_stock">In stock</option>
                                    <option value="out_of_stock">Out Of Stock</option>
                                    <option value="on_backorder">On Backorder</option>
                                    <option value="deactive">Deactivate</option>
                                </select>
                                <span class="error" id="statusError"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="is_sold" class="form-label">Is Sold</label>
                                <select class="form-control" id="is_sold" name="is_sold">
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </select>
                                <span class="error" id="is_solderror"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="on_sale" class="form-label">On Sale</label>
                                <select class="form-control" id="on_sale" name="on_sale">
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </select>
                                <span class="error" id="on_saleError"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="bullet_proof" class="form-label">Bullet Proof</label>
                                <select class="form-control" id="bullet_proof" name="bullet_proof">
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </select>
                                <span class="error" id="bullet_proofError"></span>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" id="image" name="image[]" accept="image/*" multiple>
                                <span class="error_image" id="image-Error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="primary_category_id" class="form-label">Primary Category</label>
                                <select class="form-control" id="primary_category" name="primary_category_id">
                                    <?php
                                    $user = getState("category");                 
                                    if(mysqli_num_rows($user) > 0)
                                    {
                                        foreach($user as $row)
                                        { ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="error" id="primary_category-Error"></span>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="machine_condition" class="form-label">Machine Condition</label>
                                <select class="form-control" id="machine_condition" name="machine_condition">
                                    <option value="used">Used</option>
                                    <option value="new">New</option>
                                </select>
                                <span class="error" id="machine_condition-Error"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="auction_scope" class="form-label">Auction Scope</label>
                                <select class="form-control" id="auction_scope" name="auction_scope">
                                    <option value="public_inventory">Public Inventory</option>
                                    <option value="dealer_wholesale_program">Dealer Wholesale Program</option>
                                    <option value="both">Both</option>
                                </select>
                                <span class="error" id="auction_scope-Error"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="certified" class="form-label">Certified</label>
                                <select class="form-control" id="certified" name="certified">
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </select>
                                <span class="error" id="certified-Error"></span>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="make" class="form-label">Make</label>
                                <select class="form-control" id="make" name="make">
                                    <?php
                                    $user = getAllData("makes");                 
                                    if(mysqli_num_rows($user) > 0)
                                    {
                                        foreach($user as $row)
                                        { ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['makes'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="error" id="make-Error"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="model" class="form-label">model</label>
                                <select class="form-control" id="model" name="model">
                                    <?php
                                    $user = getAllData("models");                 
                                    if(mysqli_num_rows($user) > 0)
                                    {
                                        foreach($user as $row)
                                        { ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['models'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="error" id="model-Error"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="manufacture_year" class="form-label">Manufacture Year</label>
                                <input type="text" name="manufacture_year" id="manufacture_year" class="form-control"
                                    placeholder="Enter Year"></input>
                                <span class="error" id="manufacture_year-Error"></span>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="machine_current_location" class="form-label">Machine Current
                                    Location</label>
                                <input type="text" name="machine_current_location" id="machine_current_location"
                                    class="form-control" placeholder="Enter Location"></input>
                                <span class="error" id="machine_current_location-Error"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="country">Select Country</label>
                                <select id="" class="form-control" name="country" id="productCountry">
                                    <label for="role">Countries</label>
                                    <?php $user = getCountries("countries");
                                    if (mysqli_num_rows($user) > 0) {
                                        foreach ($user as $row) { ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name']; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="state">Select State</label>
                                <select id="" class="form-control" name="state" id="productStates">

                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="horsepower" class="form-label">Horsepower</label>
                                <input type="text" name="horsepower" id="horsepower" class="form-control"
                                    placeholder="Enter Horsepower"></input>
                                <span class="error" id="horsepower-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="text" name="weight" id="weight" class="form-control"
                                    placeholder="Enter Weight"></input>
                                <span class="error" id="weight-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="length" class="form-label">length</label>
                                <input type="text" name="length" id="length" class="form-control"
                                    placeholder="Enter length"></input>
                                <span class="error" id="length-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="width" class="form-label">Width</label>
                                <input type="text" name="width" id="width" class="form-control"
                                    placeholder="Enter Width"></input>
                                <span class="error" id="width-Error"></span>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="mileage" class="form-label">Mileage</label>
                                <input type="text" name="mileage" id="mileage" class="form-control"
                                    placeholder="Enter Mileage"></input>
                                <span class="error" id="mileage-Error"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="drive" class="form-label">Drive</label>
                                <input type="text" name="drive" id="drive" class="form-control"
                                    placeholder="Enter Drive"></input>
                                <span class="error" id="drive-Error"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="number_of_speed" class="form-label">Number Of Speed</label>
                                <input type="text" name="number_of_speed" id="number_of_speed" class="form-control"
                                    placeholder="Enter Number Of Speed"></input>
                                <span class="error" id="number_of_speed-Error"></span>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="suspension" class="form-label">Suspension</label>
                                <input type="text" name="suspension" id="suspension" class="form-control"
                                    placeholder="Enter suspension"></input>
                                <span class="error" id="suspension-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="fuel_type" class="form-label">Fuel Type</label>
                                <input type="text" name="fuel_type" id="fuel_type" class="form-control"
                                    placeholder="Enter fuel_type"></input>
                                <span class="error" id="fuel_type-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="engine" class="form-label">Engine</label>
                                <input type="text" name="engine" id="engine" class="form-control"
                                    placeholder="Enter engine"></input>
                                <span class="error" id="engine-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="sleeper_type" class="form-label">Sleeper Type</label>
                                <input type="text" name="sleeper_type" id="sleeper_type" class="form-control"
                                    placeholder="Enter Sleeper Type"></input>
                                <span class="error" id="sleeper_type-Error"></span>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="lift_capacity" class="form-label">Lift Capacity</label>
                                <input type="text" name="lift_capacity" id="lift_capacity" class="form-control"
                                    placeholder="Enter Lift Capacity"></input>
                                <span class="error" id="lift_capacity-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="lift_height" class="form-label">Lift Height</label>
                                <input type="text" name="lift_height" id="lift_height" class="form-control"
                                    placeholder="Enter Lift Height"></input>
                                <span class="error" id="lift_height-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="type_of_neck" class="form-label">Type Of Neck</label>
                                <input type="text" name="type_of_neck" id="type_of_neck" class="form-control"
                                    placeholder="Enter Type Of Neck"></input>
                                <span class="error" id="type_of_neck-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="floor_type" class="form-label">Floor Type</label>
                                <input type="text" name="floor_type" id="floor_type" class="form-control"
                                    placeholder="Enter Floor Type"></input>
                                <span class="error" id="floor_type-Error"></span>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="retail_contact_name" class="form-label">Retail Contact Name</label>
                                <input type="text" name="retail_contact_name" id="retail_contact_name"
                                    class="form-control" placeholder="Enter Retail Contact Name"></input>
                                <span class="error" id="retail_contact_name-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="Phone" class="form-label">Phone</label>
                                <input type="text" name="Phone" id="Phone" class="form-control"
                                    placeholder="Enter Phone"></input>
                                <span class="error" id="Phone-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" id="location" class="form-control"
                                    placeholder="Enter Location"></input>
                                <span class="error" id="location-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="cab" class="form-label">Cab</label>
                                <input type="text" name="cab" id="cab" class="form-control"
                                    placeholder="Enter cab"></input>
                                <span class="error" id="cab-Error"></span>
                            </div>
                        </div><br>


                        <div class="row">
                            <div class="col-md-3">
                                <label for="transmission" class="form-label">Transmission</label>
                                <input type="text" name="transmission" id="transmission" class="form-control"
                                    placeholder="Enter Transmission"></input>
                                <span class="error" id="transmission-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="transmission_type" class="form-label">Transmission Type</label>
                                <input type="text" name="transmission_type" id="transmission_type" class="form-control"
                                    placeholder="Enter Transmission Type"></input>
                                <span class="error" id="transmission_type-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="axie" class="form-label">AXIE</label>
                                <input type="text" name="axie" id="axie" class="form-control"
                                    placeholder="Enter axie"></input>
                                <span class="error" id="axie-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="composition" class="form-label">Composition</label>
                                <input type="text" name="composition" id="composition" class="form-control"
                                    placeholder="Enter Composition"></input>
                                <span class="error" id="composition-Error"></span>

                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="liftgate" class="form-label">Liftgate</label>
                                <select class="form-control" id="liftgate" name="liftgate">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="extendable" class="form-label">Extendable</label>
                                <select class="form-control" id="extendable" name="extendable">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="equipment" class="form-label">Equipment</label>
                                <select class="form-control" id="equipment" name="equipment">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="serial" class="form-label">Serial</label>
                                <input type="text" name="serial" id="serial" class="form-control"
                                    placeholder="Enter Serial"></input>
                                <span class="error" id="serial-Error"></span>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="drive_type" class="form-label">Drive Type</label>
                                <input type="text" name="drive_type" id="drive_type" class="form-control"
                                    placeholder="Enter Drive Type"></input>
                                <span class="error" id="drive_type-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="listing_type" class="form-label">Listing Type</label>
                                <input type="text" name="listing_type" id="listing_type" class="form-control"
                                    placeholder="Enter Listing Type"></input>
                                <span class="error" id="listing_type-Error"></span>
                            </div>
                            <div class="col-md-3">
                                <label for="rops_type" class="form-label">Rops Type</label>
                                <input type="text" name="rops_type" id="rops_type" class="form-control"
                                    placeholder="Enter rops Type"></input>
                                <span class="error" id="rops_type-Error"></span>
                            </div>
                        </div><br>
                        <div class="mb-3">
                            <button type="submit" value="submit" name="createProductSubmit"
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

.error {
    color: red;
    font-weight: 600;
    font-size: 18px;
}
</style>
<?php include('includes/footer.php'); ?>
