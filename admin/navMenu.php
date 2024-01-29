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
                    <h1>Navbar Menus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Navmenu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
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
                                    <h4><b>Create Menu</b></h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Menu Name</label>
                                    <input type="text" name="menuname" required class="form-control"
                                        placeholder="Enter Menu name"></input>
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Menu Link</label>
                                    <input type="text" name="menulink" required class="form-control"
                                        placeholder="Enter Menu Link"></input>
                                </div><br>
                                <div class="mb-3">
                                    <button type="submit" value="submit" name="createMenuSubmit"
                                        class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4><b>All Menu</b></h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover table-stripe">
                                <thead>
                                    <tr>
                                        <th>Menu Name</th>
                                        <th>Menu Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user = getState("header_menu");                 
                                    if(mysqli_num_rows($user) > 0)
                                    {
                                        foreach($user as $row)
                                        { ?>
                                        <tr>
                                            <td><?= $row['menu_title']?></td>
                                            <td><?= $row['menu_link']?></td>
                                            <td>
                                                <ul style="display: flex;list-style: none;">
                                                    <li style="padding: 8px;">
                                                        <button class="btn btn-primary menu_edit" m_id="<?= $row['id']; ?>"
                                                            menu_name="<?= $row['menu_title']?>"
                                                            menu_link="<?= $row['menu_link']?>">
                                                            <i class="fa fa-edit" style="font-size:24px;color:blue;"></i>
                                                        </button>
                                                    </li>
                                                    <form action="code.php" method="post">
                                                        <input type="hidden" name="menu_id" value="<?= $row['id']; ?>">
                                                        <button type="submit" class="btn btn-dnager" name="delete_menu"><i class="fa fa-trash" style="font-size:24px;color:red;"></i></button>
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
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Nev-Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="menuID" name="menuID" required class="form-control"></input>
                        <div class="mb-3">
                            <label for="name" class="form-label">Menu Name</label>
                            <input type="text" id="updatemenuname" name="updatemenuname" class="form-control"
                                placeholder="Enter Menu name"></input>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Menu Link</label>
                            <input type="text" id="updatemenulink" name="updatemenulink" required class="form-control"
                                placeholder="Enter Menu Link"></input>
                        </div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
      .menu_edit{
        background-color: white;
        border: 0px;
      }
</style>
<?php include('includes/footer.php'); ?>