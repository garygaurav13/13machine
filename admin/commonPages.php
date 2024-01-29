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
                    <h1>Common-Pages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Common-pages</li>
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
                                    <h4><b>Create Common-Pages</b></h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="name" class="form-label">Page Title</label>
                                        <input type="text" name="page_title" required class="form-control"
                                            placeholder="Enter Page Title"></input>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" name="slug" required class="form-control"
                                            placeholder="Enter slug"></input>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="slug" class="form-label">Template</label>
                                        <input type="text" name="template" value="<?= $data['template']?>" required class="form-control" placeholder="Enter template"></input>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="role">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="<?= $data['status']?>"><?= $data['status']?></option>
                                            <option value="active">Active</option>
                                            <option value="deactive">Deactive</option>
                                        </select>
                                    </div>
                                </div><br>
                                
                                <div class="mb-3">
                                        <label for="slug" class="form-label">Page content</label>
                                        <textarea type="text" name="page_content" rows="5" class="form-control" placeholder="Enter Page Content"><?= $data['page_content']?></textarea>
                                </div><br>
                                <div class="mb-3">
                                    <button type="submit" value="submit" name="createCommonPagesSubmit"
                                        class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4><b>Common Pages</b></h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover table-stripe">
                                <thead>
                                    <tr>
                                        <th>Page Title</th>
                                        <th>Slug</th>
                                        <th>Template</th>
                                        <th>Page content</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user = getState("common_pages");                 
                                    if(mysqli_num_rows($user) > 0)
                                    {
                                        foreach($user as $row)
                                        { ?>
                                        <tr>
                                            <td><?= $row['page_title']?></td>
                                            <td><?= $row['slug']?></td>
                                            <td><?= $row['template']?></td>
                                            <td><?= $row['page_content']?></td>
                                            <td><?= $row['status']?></td>
                                            <td>
                                                <ul style="display: flex;list-style: none;">
                                                    <li style="padding: 8px;">
                                                        <a  class=""  href="editCommonpage.php?id=<?= $row['id']; ?>"> 
                                                        <i class="fa fa-edit" style="font-size:24px;color:blue;"></i>
                                                    </a>
                                                    </li>
                                                    <form action="code.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                        <button type="submit" class="btn btn-dnager" name="delete_commonPage"><i class="fa fa-trash" style="font-size:24px;color:red;"></i></button>
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

</div>
<style>
      .menu_edit{
        background-color: white;
        border: 0px;
      }
</style>
<?php include('includes/footer.php'); ?>