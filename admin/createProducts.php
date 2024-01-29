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
                    <form action="code.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="selected_state" value="0">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" required class="form-control"
                                placeholder="Enter Your name"></input>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" required class="form-control"
                                placeholder="Enter Slug"></input>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" name="description" required class="form-control" rows="7"
                                placeholder="Enter description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="admin_note" class="form-label">Admin Note</label>
                            <textarea type="text" name="admin_note" required class="form-control" rows="7"
                                placeholder="Enter admin_note"></textarea>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <label for="sales_price" class="form-label">Sales Price</label>
                                <input type="text" name="sales_price" required class="form-control"
                                    placeholder="Enter your sales_price">
                            </div>
                            <div class="col-md-4">
                                <label for="inventory" class="form-label">Inventory</label>
                                <input type="number" name="inventory" required class="form-control"
                                    placeholder="Enter inventory">
                            </div>
                            <div class="col-md-4">
                                <label for="vin_number" class="form-label">Vin Number</label>
                                <input type="text" name="vin_number" required class="form-control"
                                    placeholder="Enter Vin-Number">
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <select required class="form-control" name="status">
                                    <option value="pending">Pending</option>
                                    <option value="in_stock">In stock</option>
                                    <option value="out_of_stock">Out Of Stock</option>
                                    <option value="on_backorder">On Backorder</option>
                                    <option value="deactive">Deactivate</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="is_sold" class="form-label">Is Sold</label>
                                <select required class="form-control" name="is_sold">
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="on_sale" class="form-label">On Sale</label>
                                <select required class="form-control" name="on_sale">
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="bullet_proof" class="form-label">Bullet Proof</label>
                                <select required class="form-control" name="bullet_proof">
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" name="image[]" accept="image/*" multiple required>
                            </div>
                            <div class="col-md-6">
                                <label for="primary_category_id" class="form-label">Primary Category</label>
                                <select required class="form-control" name="primary_category_id">
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
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="machine_condition" class="form-label">Machine Condition</label>
                                <select required class="form-control" name="machine_condition">
                                    <option value="used">Used</option>
                                    <option value="new">New</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="auction_scope" class="form-label">Auction Scope</label>
                                <select required class="form-control" name="auction_scope">
                                    <option value="public_inventory">Public Inventory</option>
                                    <option value="dealer_wholesale_program">Dealer Wholesale Program</option>
                                    <option value="both">Both</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="certified" class="form-label">Certified</label>
                                <select required class="form-control" name="certified">
                                    <option value="y">Yes</option>
                                    <option value="n">No</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="make" class="form-label">Make</label>
                                <input type="text" name="make" required class="form-control"
                                    placeholder="Enter make"></input>
                            </div>
                            <div class="col-md-4">
                                <label for="model" class="form-label">model</label>
                                <input type="text" name="model" required class="form-control"
                                    placeholder="Enter model"></input>
                            </div>
                            <div class="col-md-4">
                                <label for="manufacture_year" class="form-label">Manufacture Year</label>
                                <input type="text" name="manufacture_year" required class="form-control"
                                    placeholder="Enter Year"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="machine_current_location" class="form-label">Machine Current
                                    Location</label>
                                <input type="text" name="machine_current_location" required class="form-control"
                                    placeholder="Enter Location"></input>
                            </div>
                            <div class="col-md-4">
                                <label for="country">Select Country</label>
                                <select required class="form-control" name="country" id="productCountry">
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
                                <select required class="form-control" name="state" id="productStates">

                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="horsepower" class="form-label">Horsepower</label>
                                <input type="text" name="horsepower" required class="form-control"
                                    placeholder="Enter Horsepower"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="text" name="weight" required class="form-control"
                                    placeholder="Enter Weight"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="length" class="form-label">length</label>
                                <input type="text" name="length" required class="form-control"
                                    placeholder="Enter length"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="width" class="form-label">Width</label>
                                <input type="text" name="width" required class="form-control"
                                    placeholder="Enter Width"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="mileage" class="form-label">Mileage</label>
                                <input type="text" name="mileage" required class="form-control"
                                    placeholder="Enter Mileage"></input>
                            </div>
                            <div class="col-md-4">
                                <label for="drive" class="form-label">Drive</label>
                                <input type="text" name="drive" required class="form-control"
                                    placeholder="Enter Drive"></input>
                            </div>
                            <div class="col-md-4">
                                <label for="number_of_speed" class="form-label">Number Of Speed</label>
                                <input type="text" name="number_of_speed" required class="form-control"
                                    placeholder="Enter Number Of Speed"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="suspension" class="form-label">Suspension</label>
                                <input type="text" name="suspension" required class="form-control"
                                    placeholder="Enter suspension"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="fuel_type" class="form-label">Fuel Type</label>
                                <input type="text" name="fuel_type" required class="form-control"
                                    placeholder="Enter fuel_type"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="engine" class="form-label">Engine</label>
                                <input type="text" name="engine" required class="form-control"
                                    placeholder="Enter engine"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="sleeper_type" class="form-label">Sleeper Type</label>
                                <input type="text" name="sleeper_type" required class="form-control"
                                    placeholder="Enter Sleeper Type"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="lift_capacity" class="form-label">Lift Capacity</label>
                                <input type="text" name="lift_capacity" required class="form-control"
                                    placeholder="Enter Lift Capacity"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="lift_height" class="form-label">Lift Height</label>
                                <input type="text" name="lift_height" required class="form-control"
                                    placeholder="Enter Lift Height"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="type_of_neck" class="form-label">Type Of Neck</label>
                                <input type="text" name="type_of_neck" required class="form-control"
                                    placeholder="Enter Type Of Neck"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="floor_type" class="form-label">Floor Type</label>
                                <input type="text" name="floor_type" required class="form-control"
                                    placeholder="Enter Floor Type"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="retail_contact_name" class="form-label">Retail Contact Name</label>
                                <input type="text" name="retail_contact_name" required class="form-control"
                                    placeholder="Enter Retail Contact Name" ></input>
                            </div>
                            <div class="col-md-3">
                                <label for="Phone" class="form-label">Phone</label>
                                <input type="text" name="Phone" required class="form-control"
                                    placeholder="Enter Phone" ></input>
                            </div>
                            <div class="col-md-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" required class="form-control"
                                    placeholder="Enter Location" ></input>
                            </div>
                            <div class="col-md-3">
                                <label for="cab" class="form-label">Cab</label>
                                <input type="text" name="cab" required class="form-control"
                                    placeholder="Enter cab"  ></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="transmission" class="form-label">Transmission</label>
                                <input type="text" name="transmission" required class="form-control"
                                    placeholder="Enter Transmission"  ></input>
                            </div>
                            <div class="col-md-3">
                                <label for="transmission_type" class="form-label">Transmission Type</label>
                                <input type="text" name="transmission_type" required class="form-control"
                                    placeholder="Enter Transmission Type"  ></input>
                            </div>
                            <div class="col-md-3">
                                <label for="axie" class="form-label">AXIE</label>
                                <input type="text" name="axie" required class="form-control"
                                    placeholder="Enter axie"  ></input>
                            </div>
                            <div class="col-md-3">
                                <label for="composition" class="form-label">Composition</label>
                                <input type="text" name="composition" required class="form-control"
                                    placeholder="Enter Composition"  ></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="liftgate" class="form-label">Liftgate</label>
                                <input type="text" name="liftgate" required class="form-control"
                                    placeholder="Enter Liftgate" ></input>
                            </div>
                            <div class="col-md-3">
                                <label for="extendable" class="form-label">Extendable</label>
                                <input type="text" name="extendable" required class="form-control"
                                    placeholder="Enter Extendable" ></input>
                            </div>
                            <div class="col-md-3">
                                <label for="equipment" class="form-label">Equipment</label>
                                <input type="text" name="equipment" required class="form-control"
                                    placeholder="Enter Equipment" ></input>
                            </div>
                            <div class="col-md-3">
                                <label for="serial" class="form-label">Serial</label>
                                <input type="text" name="serial" required class="form-control"
                                    placeholder="Enter Serial" ></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="drive_type" class="form-label">Drive Type</label>
                                <input type="text" name="drive_type" required class="form-control"
                                    placeholder="Enter Drive Type" ></input>
                            </div>
                            <div class="col-md-3">
                                <label for="listing_type" class="form-label">Listing Type</label>
                                <input type="text" name="listing_type" required class="form-control"
                                    placeholder="Enter Listing Type" ></input>
                            </div>
                            <div class="col-md-3">
                                <label for="rops_type" class="form-label">Rops Type</label>
                                <input type="text" name="rops_type" required class="form-control"
                                    placeholder="Enter rops Type" ></input>
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
<?php include('includes/footer.php'); ?>