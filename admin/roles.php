<?php include './includes/header.php' ?>
<?php include './database/insert_category.php';
$sql = $conn->query("SELECT * FROM roles");
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Roles</h1>
                        <a href="./add-roles.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-pen fa-sm text-white-50"></i> Add Roles</a>
                    </div>
                    <?php if(isset($success['insert'])) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Congrats!</strong> <?php echo $success['insert']; ?>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <?php if(isset($error['insert'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo $error['insert']; ?>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">All Roles</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Roles</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>tdtdtdtdtdtdtdt</td>
                                                <td>tdtdtdtdtdtdtdt</td>
                                                <td>tdtdtdtdtdtdtdt</td>
                                                <td>tdtdtdtdtdtdtdt</td>
                                                <td>tdtdtdtdtdtdtdt</td>
                                                <td>tdtdtdtdtdtdtdt</td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include './includes/footer.php' ?>