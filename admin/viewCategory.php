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
            <h1>All Users Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users Data</li>
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
                <h3 class="card-title">All User Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-stripe">
                  <thead>
                  <tr>
                    <th>category Name</th>
                    <th>Slug</th>
                    <th>category H1</th>
                    <th>category H2</th>
                    <th>Description</th>
                    <th>Short Description</th>
                    <th>Display Type</th>
                    <th>Priority</th>
                    <th>Related Search</th>
                    <th>Category Image</th>
                    <th>Category Banner Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $user = getState("category");                 
                    if(mysqli_num_rows($user) > 0)
                    {
                        foreach($user as $row)
                        { ?>
                          <tr>
                            <td><?= $row['name']?></td>
                            <td><?= $row['slug']?></td>
                            <td><?= $row['category_h1']?></td>
                            <td><?= $row['category_h2']?></td>
                            <td><?= $row['description']?></td>
                            <td><?= $row['short_description']?></td>
                            <td><?= $row['display_type']?></td>
                            <td><?= $row['priority'] == 1 ? 'yes':'no' ?></td>
                            <td><?= $row['related_searches']?></td>
                            <td><img src="../uploads/<?= $row['category_image']?>" style="width:150px;height:100px;"></td>
                            <td><img src="../uploads/<?= $row['category_banner_image']?>" style="width:150px;height:100px;"></td>
                            <td>
                              <ul style="display: flex;list-style: none;">
                                <li style="padding: 8px;">
                                  <a  class="" 
                                  href="editCategory.php?id=<?= $row['id']; ?>"> 
                                  <i class="fa fa-edit" style="font-size:24px;color:blue;"></i>
                                  </a>
                                </li>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="category_id" value="<?= $row['id']; ?>">
                                    <button type="submit" class="btn btn-dnager" name="delete_category"><i class="fa fa-trash" style="font-size:24px;color:red;"></i></button>
                                </form>
                              </ul>
                            </td>
                          </tr>
                          <?php
                        }
                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>category Name</th>
                    <th>Slug</th>
                    <th>category H1</th>
                    <th>category H2</th>
                    <th>Description</th>
                    <th>Short Description</th>
                    <th>Display Type</th>
                    <th>Priority</th>
                    <th>Related Search</th>
                    <th>Category Image</th>
                    <th>Category Banner Image</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
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