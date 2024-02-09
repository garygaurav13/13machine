<?php
session_start();
include('../middleware/adminMiddlewere.php'); 
include('includes/header.php');
?>
<div class="wrapper container">
    <div class="row justify-content-center">
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
                // $product = getById("products", $id);
                $product = groupconcatenate('product_images','products',$id);
                if(mysqli_num_rows($product) > 0)
                {
                $data = mysqli_fetch_array($product);
                ?>

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><b>Update Product</b></h4>
                        </div>
                        <div class="col-md-6"><a href="viewProduct.php" class="btn btn-primary"
                                style="float: right; font-size: 19px; font-weight: 700;">View Products</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="productId" value="<?= $data['id']; ?>">
                        <input type="hidden" id="selected_state" value="<?= $data['state']; ?>">

                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" value="<?= $data['name']; ?>" name="name" required class="form-control"></input>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" value="<?= $data['slug']; ?>" name="slug" required class="form-control"
                                placeholder="Enter Slug"></input>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" name="description" required class="form-control" rows="7"
                                placeholder="Enter description"><?= $data['description']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="admin_note" class="form-label">Admin Note</label>
                            <textarea type="text" name="admin_note" required class="form-control" rows="7"
                                placeholder="Enter admin_note"><?= $data['admin_note']; ?></textarea>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <label for="sales_price" class="form-label">Sales Price</label>
                                <input type="text" value="<?= $data['sales_price']; ?>" name="sales_price" required
                                    class="form-control" placeholder="Enter your sales_price">
                            </div>
                            <div class="col-md-4">
                                <label for="inventory" class="form-label">Inventory</label>
                                <input type="number" value="<?= $data['inventory']; ?>" name="inventory" required
                                    class="form-control" placeholder="Enter inventory">
                            </div>
                            <div class="col-md-4">
                                <label for="vin_number" class="form-label">Vin Number</label>
                                <input type="text" value="<?= $data['vin_number']; ?>" name="vin_number" required
                                    class="form-control" placeholder="Enter Vin-Number">
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <select required class="form-control" name="status">
                                    <option value="pending" <?= $data['status'] == 'pending'?'selected':''; ?> >Pending</option>
                                    <option value="in_stock" <?= $data['status'] == 'in_stock'?'selected':''; ?> >In stock</option>
                                    <option value="out_of_stock" <?= $data['status'] == 'out_of_stock'?'selected':''; ?> >Out Of Stock</option>
                                    <option value="on_backorder" <?= $data['status'] == 'on_backorder'?'selected':''; ?> >On Backorder</option>
                                    <option value="deactive" <?= $data['status'] == 'deactive'?'selected':''; ?> >Deactivate</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="is_sold" class="form-label">Is Sold</label>
                                <select required class="form-control" name="is_sold">
                                    <option value="y" <?= $data['is_sold'] == 'y'?'selected':'';?>  >Yes</option>
                                    <option value="n" <?= $data['is_sold'] == 'n'?'selected':'';?>>No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="on_sale" class="form-label">On Sale</label>
                                <select required class="form-control" name="on_sale">
                                    <option value="y" <?= $data['on_sale'] == 'y'?'selected':'';?>>Yes</option>
                                    <option value="n" <?= $data['on_sale'] == 'n'?'selected':'';?>>No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="bullet_proof" class="form-label">Bullet Proof</label>
                                <select required class="form-control" name="bullet_proof">
                                    <option value="y" <?= $data['bullet_proof'] == 'y'?'selected':'';?>>Yes</option>
                                    <option value="n" <?= $data['bullet_proof'] == 'n'?'selected':'';?>>No</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" value="<?= $data['image']; ?>" name="image[]" accept="image/*"
                                    multiple>
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
                                            <option value="<?= $row['id'] ?>" <?= $row['id'] == $data['primary_category_id']?'selected':''; ?>  ><?= $row['name'] ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <?php
                        $imageARR = explode(",",$data['product_image']);
                            if(!empty($data['product_image'])){
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" value="<?= $data['product_image']; ?>" name="image_name" >
                                <label for="image" class="form-label">uploaded Product Image</label>
                                <div id="image_main_div">
                                    <?php foreach($imageARR as $value){?>
                                    <div class="image_div">
                                        <img class="product_image" src="../uploads/<?= trim($value)?>"/>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php
                            }
                        ?>


                        <div class="row">
                            <div class="col-md-4">
                                <label for="machine_condition" class="form-label">Machine Condition</label>
                                <select required class="form-control" name="machine_condition">
                                    <option value="used" <?= $data['machine_condition'] == 'used'?'selsected':''; ?>>Used</option>
                                    <option value="new" <?= $data['machine_condition'] == 'new'?'selsected':''; ?>>New</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="auction_scope" class="form-label">Auction Scope</label>
                                <select required class="form-control" name="auction_scope">
                                    <option value="public_inventory" <?= $data['auction_scope'] == 'public_inventory'?'selsected':''; ?> >Public Inventory</option>
                                    <option value="dealer_wholesale_program" <?= $data['auction_scope'] == 'dealer_wholesale_program'?'selsected':''; ?> >Dealer Wholesale Program</option>
                                    <option value="both"  <?= $data['auction_scope'] == 'both'?'selsected':''; ?> >Both</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="certified" class="form-label">Certified</label>
                                <select required class="form-control" value="<?= $data['certified']; ?>"
                                    name="certified">
                                    <option value="y" <?= $data['certified'] == 'y'?'selsected':''; ?> >Yes</option>
                                    <option value="n" <?= $data['certified'] == 'n'?'selsected':''; ?> >No</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="make" class="form-label">Make</label>
                                <input type="text" value="<?= $data['make']; ?>" name="make" required
                                    class="form-control" placeholder="Enter make"></input>
                            </div>
                            <div class="col-md-4">
                                <label for="model" class="form-label">model</label>
                                <input type="text" value="<?= $data['model']; ?>" name="model" required
                                    class="form-control" placeholder="Enter model"></input>
                            </div>
                            <div class="col-md-4">
                                <label for="manufacture_year" class="form-label">Manufacture Year</label>
                                <input type="text" value="<?= $data['manufacture_year']; ?>" name="manufacture_year"
                                    required class="form-control" placeholder="Enter Year"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="machine_current_location" class="form-label">Machine Current
                                    Location</label>
                                <input type="text" value="<?= $data['machine_current_location']; ?>"
                                    name="machine_current_location" required class="form-control"
                                    placeholder="Enter Location"></input>
                            </div>



                            <div class="col-md-4">
                                <label for="country">Select Country</label>
                                <select required class="form-control" name="country" id="productCountry">
                                    <label for="role">Countries</label>
                                    <?php $user = getCountries("countries");
                                    if (mysqli_num_rows($user) > 0) {
                                        foreach ($user as $row) { ?>
                                    <option value="<?= $row['id'] ?>"
                                        <?= $row['id']== $data['country'] ? 'selected':'' ?>><?= $row['name']; ?>
                                    </option>
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
                                <input type="text" value="<?= $data['horsepower']; ?>" name="horsepower" required
                                    class="form-control" placeholder="Enter Horsepower"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="text" value="<?= $data['weight']; ?>" name="weight" required
                                    class="form-control" placeholder="Enter Weight"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="length" class="form-label">length</label>
                                <input type="text" value="<?= $data['length']; ?>" name="length" required
                                    class="form-control" placeholder="Enter length"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="width" class="form-label">Width</label>
                                <input type="text" value="<?= $data['width']; ?>" name="width" required
                                    class="form-control" placeholder="Enter Width"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="mileage" class="form-label">Mileage</label>
                                <input type="text" value="<?= $data['mileage']; ?>" name="mileage" required
                                    class="form-control" placeholder="Enter Mileage"></input>
                            </div>
                            <div class="col-md-4">
                                <label for="drive" class="form-label">Drive</label>
                                <input type="text" value="<?= $data['drive']; ?>" name="drive" required
                                    class="form-control" placeholder="Enter Drive"></input>
                            </div>
                            <div class="col-md-4">
                                <label for="number_of_speed" class="form-label">Number Of Speed</label>
                                <input type="text" value="<?= $data['number_of_speed']; ?>" name="number_of_speed"
                                    required class="form-control" placeholder="Enter Number Of Speed"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="suspension" class="form-label">Suspension</label>
                                <input type="text" value="<?= $data['suspension']; ?>" name="suspension" required
                                    class="form-control" placeholder="Enter suspension"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="fuel_type" class="form-label">Fuel Type</label>
                                <input type="text" value="<?= $data['fuel_type']; ?>" name="fuel_type" required
                                    class="form-control" placeholder="Enter fuel_type"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="engine" class="form-label">Engine</label>
                                <input type="text" value="<?= $data['engine']; ?>" name="engine" required
                                    class="form-control" placeholder="Enter engine"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="sleeper_type" class="form-label">Sleeper Type</label>
                                <input type="text" value="<?= $data['sleeper_type']; ?>" name="sleeper_type" required
                                    class="form-control" placeholder="Enter Sleeper Type"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="lift_capacity" class="form-label">Lift Capacity</label>
                                <input type="text" value="<?= $data['lift_capacity']; ?>" name="lift_capacity" required
                                    class="form-control" placeholder="Enter Lift Capacity"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="lift_height" class="form-label">Lift Height</label>
                                <input type="text" value="<?= $data['lift_height']; ?>" name="lift_height" required
                                    class="form-control" placeholder="Enter Lift Height"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="type_of_neck" class="form-label">Type Of Neck</label>
                                <input type="text" value="<?= $data['type_of_neck']; ?>" name="type_of_neck" required
                                    class="form-control" placeholder="Enter Type Of Neck"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="floor_type" class="form-label">Floor Type</label>
                                <input type="text" value="<?= $data['floor_type']; ?>" name="floor_type" required
                                    class="form-control" placeholder="Enter Floor Type"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="retail_contact_name" class="form-label">Retail Contact Name</label>
                                <input type="text" name="retail_contact_name" required class="form-control"
                                    placeholder="Enter Retail Contact Name" value="<?= $data['retail_contact_name']; ?>"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="Phone" class="form-label">Phone</label>
                                <input type="text" name="Phone" required class="form-control"
                                    placeholder="Enter Phone" value="<?= $data['phone']; ?>"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" required class="form-control"
                                    placeholder="Enter Location" value="<?= $data['location']; ?>"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="cab" class="form-label">Cab</label>
                                <input type="text" name="cab" required class="form-control"
                                    placeholder="Enter cab"  value="<?= $data['cab']; ?>"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="transmission" class="form-label">Transmission</label>
                                <input type="text" name="transmission" required class="form-control"
                                    placeholder="Enter Transmission"  value="<?= $data['transmission']; ?>"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="transmission_type" class="form-label">Transmission Type</label>
                                <input type="text" name="transmission_type" required class="form-control"
                                    placeholder="Enter Transmission Type"  value="<?= $data['transmission_type']; ?>"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="axie" class="form-label">AXIE</label>
                                <input type="text" name="axie" required class="form-control"
                                    placeholder="Enter axie"  value="<?= $data['axle']; ?>"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="composition" class="form-label">Composition</label>
                                <input type="text" name="composition" required class="form-control"
                                    placeholder="Enter Composition"  value="<?= $data['composition']; ?>"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="liftgate" class="form-label">Liftgate</label>
                                <input type="text" name="liftgate" required class="form-control"
                                    placeholder="Enter Liftgate" value="<?= $data['liftgate']; ?>"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="extendable" class="form-label">Extendable</label>
                                <input type="text" name="extendable" required class="form-control"
                                    placeholder="Enter Extendable" value="<?= $data['extendable']; ?>"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="equipment" class="form-label">Equipment</label>
                                <input type="text" name="equipment" required class="form-control"
                                    placeholder="Enter Equipment" value="<?= $data['equipment']; ?>"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="serial" class="form-label">Serial</label>
                                <input type="text" name="serial" required class="form-control"
                                    placeholder="Enter Serial" value="<?= $data['serial']; ?>"></input>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="drive_type" class="form-label">Drive Type</label>
                                <input type="text" name="drive_type" required class="form-control"
                                    placeholder="Enter Drive Type" value="<?= $data['drive_type']; ?>"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="listing_type" class="form-label">Listing Type</label>
                                <input type="text" name="listing_type" required class="form-control"
                                    placeholder="Enter Listing Type" value="<?= $data['listing_type']; ?>"></input>
                            </div>
                            <div class="col-md-3">
                                <label for="rops_type" class="form-label">Rops Type</label>
                                <input type="text" name="rops_type" required class="form-control"
                                    placeholder="Enter rops Type" value="<?= $data['rops_type']; ?>"></input>
                            </div>
                        </div><br>


                        <br>
                        <div class="mb-3">
                            <button type="submit" name="updateProductsSubmit"
                                class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
                }

            }
            else
            {
                echo "Id Missing From URL";
            } 
            ?>
        </div>
    </div>
</div>
<style>

img.product_image {
    width: 178px;
    height: 160px;
    margin: 7px;
    margin-bottom: -2px;
}
div#image_main_div {
    display: flex;
}
</style>
<?php include('includes/footer.php'); ?>