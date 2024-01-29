<?php
session_start();
include('../middleware/adminMiddlewere.php'); 
include('includes/header.php');
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-stripe">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Admin Note</th>
                    <th>Sales Price</th>
                    <th>Inventory</th>
                    <th>Vin Number</th>
                    <th>Status</th>
                    <th>Is Sold</th>
                    <th>On Sale</th>
                    <th>Bullet Proof</th>
                    <th>Primary Category</th>
                    <th>Machine Condition</th>
                    <th>Auction Scope</th>
                    <th>Certified</th>
                    <th>Make</th>
                    <th>model</th>
                    <th>Manufacture Year</th>
                    <th>Machine Current Location</th>
                    <th>Select Country</th>
                    <th>Select State</th>
                    <th>Horsepower</th>
                    <th>Weight</th>
                    <th>length</th>
                    <th>Width</th>
                    <th>Mileage</th>
                    <th>Drive</th>
                    <th>Number Of Speed</th>
                    <th>Suspension</th>
                    <th>Fuel Type</th>
                    <th>Engine</th>
                    <th>Lift Capacity</th>
                    <th>Lift Height</th>
                    <th>Type Of Neck</th>
                    <th>Floor Type</th>
                    <th>Retail Contact Name</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Cab</th>
                    <th>Transmission</th>
                    <th>Transmission Type</th>
                    <th>axle</th>
                    <th>Liftgate</th>
                    <th>Extendable</th>
                    <th>Equipment</th>
                    <th>serial</th>
                    <th>composition</th>
                    <th>Drive Type</th>
                    <th>Listing Type</th>
                    <th>Rops Type</th>
                    <th>Product Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    // $user = getState("products"); 
                    $product_data = getProductsjoinData('products','product_images','category');               
                    if(mysqli_num_rows($product_data) > 0)
                    {
                        foreach($product_data as $row)
                        { ?>
                          <tr>
                            <td><?= $row['name']?></td>
                            <td><?= $row['slug']?></td>
                            <td><?= $row['description']?></td>
                            <td><?= $row['admin_note']?></td>
                            <td><?= $row['sales_price']?></td>
                            <td><?= $row['inventory']?></td>
                            <td><?= $row['vin_number']?></td>
                            <td><?= $row['status']?></td>
                            <td><?= $row['is_sold']?></td>
                            <td><?= $row['on_sale']?></td>
                            <td><?= $row['bullet_proof']?></td>
                            <td><?= $row['category_name']?></td>
                            <td><?= $row['machine_condition']?></td>
                            <td><?= $row['auction_scope']?></td>
                            <td><?= $row['certified']?></td>
                            <td><?= $row['make']?></td>
                            <td><?= $row['model']?></td>
                            <td><?= $row['manufacture_year']?></td>
                            <td><?= $row['machine_current_location']?></td>
                            <td><?= $row['country']?></td>
                            <td><?= $row['state']?></td>
                            <td><?= $row['horsepower']?></td>
                            <td><?= $row['weight']?></td>
                            <td><?= $row['length']?></td>
                            <td><?= $row['width']?></td>
                            <td><?= $row['mileage']?></td>
                            <td><?= $row['drive']?></td>
                            <td><?= $row['number_of_speed']?></td>
                            <td><?= $row['suspension']?></td>
                            <td><?= $row['fuel_type']?></td>
                            <td><?= $row['engine']?></td>
                            <td><?= $row['lift_capacity']?></td>
                            <td><?= $row['lift_height']?></td>
                            <td><?= $row['type_of_neck']?></td>
                            <td><?= $row['floor_type']?></td>
                            <td><?= $row['retail_contact_name']?></td>
                            <td><?= $row['phone']?></td>
                            <td><?= $row['location']?></td>
                            <td><?= $row['cab']?></td>
                            <td><?= $row['transmission']?></td>
                            <td><?= $row['transmission_type']?></td>
                            <td><?= $row['axle']?></td>
                            <td><?= $row['liftgate']?></td>
                            <td><?= $row['extendable']?></td>
                            <td><?= $row['equipment']?></td>
                            <td><?= $row['serial']?></td>
                            <td><?= $row['composition']?></td>
                            <td><?= $row['drive_type']?></td>
                            <td><?= $row['listing_type']?></td>
                            <td><?= $row['rops_type']?></td>
                            <td><img src="../uploads/<?= $row['product_image']?>" style="width:150px;height:100px;"></td></td>
                            <td><?= $row['created_at']; ?></td>
                            <td><?= $row['updated_at'] ?></td>
                            <td>
                              <ul style="display: flex;list-style: none;">
                                <li style="padding: 8px;">
                                  <a  class="" 
                                  href="editProduct.php?id=<?= $row['id']; ?>"> 
                                  <i class="fa fa-edit" style="font-size:24px;color:blue;"></i>
                                  </a>
                                </li>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                                    <button type="submit" class="btn btn-dnager" name="delete_product"><i class="fa fa-trash" style="font-size:24px;color:red;"></i></button>
                                </form>
                              </ul>
                            </td>
                          </tr>
                        <?php
                        }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include('includes/footer.php'); ?>