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
            <h1>Subscribers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subscribers</li>
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
                <h3 class="card-title">Subscribers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-stripe">
                  <thead>
                  <tr>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $user = getSubscribers("subscribers");                 
                    if(mysqli_num_rows($user) > 0)
                    {
                        foreach($user as $row)
                        { ?>
                            <tr>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['category']; ?></td>
                            <td><?= $row['status']; ?></td>
                            <td><?= $row['created_at']; ?></td>
                            <td><?= $row['updated_at']; ?></td>
                            <td>
                              <ul style="display: flex;list-style: none;">
                                <li style="padding: 8px;">
                                  <a  class="" 
                                  href="editsubscriber.php?id=<?= $row['id']; ?>"> 
                                  <i class="fa fa-edit" style="font-size:24px;color:blue;"></i>
                                  </a>
                                </li>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                                    <button type="submit" class="btn btn-dnager" name="delete_subscribers"><i class="fa fa-trash" style="font-size:24px;color:red;"></i></button>
                                </form>
                              </ul>
                            </td>
                          </tr>
                        <?php
                        }
                    }
                    else
                    {

                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
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