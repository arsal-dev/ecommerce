<?php include './includes/header.php' ?>
<?php
    include './database/db_connect.php';
    if(!$role['roleRead']){
        echo "<script>location.replace('./index.php');</script>";
    }
    if(isset($_POST['submit'])){
        $roleName = $_POST['roleName'];
        $productRead = (isset($_POST['productRead'])) ? 1 : 0;
        $productAdd = (isset($_POST['productAdd'])) ? 1 : 0;
        $productUpdate = (isset($_POST['productUpdate'])) ? 1 : 0;
        $productDelete = (isset($_POST['productDelete'])) ? 1 : 0;
        $categoryRead = (isset($_POST['categoryRead'])) ? 1 : 0;
        $categoryAdd = (isset($_POST['categoryAdd'])) ? 1 : 0;
        $categoryUpdate = (isset($_POST['categoryUpdate'])) ? 1 : 0;
        $categoryDelete = (isset($_POST['categoryDelete'])) ? 1 : 0;
        $userRead = (isset($_POST['userRead'])) ? 1 : 0;
        $userAdd = (isset($_POST['userAdd'])) ? 1 : 0;
        $userUpdate = (isset($_POST['userUpdate'])) ? 1 : 0;
        $userDelete = (isset($_POST['userDelete'])) ? 1 : 0;
        $roleRead = (isset($_POST['roleRead'])) ? 1 : 0;
        $roleAdd = (isset($_POST['roleAdd'])) ? 1 : 0;
        $roleUpdate = (isset($_POST['roleUpdate'])) ? 1 : 0;
        $roleDelete = (isset($_POST['roleDelete'])) ? 1 : 0;


        if(empty($roleName)){
            $error['insert'] = 'Please Enter Role Name';
        }
        else {;
            $sql = $conn->query("INSERT INTO `roles`(`role_name`, `productRead`, `productAdd`, `productUpdate`, `productDelete`, `categoryRead`, `categoryAdd`, `categoryUpdate`, `categoryDelete`, `userRead`, `userAdd`, `userUpdate`, `userDelete`, `roleRead`, `roleAdd`, `roleUpdate`, `roleDelete`) VALUES ('$roleName','$productRead','$productAdd','$productUpdate','$productDelete','$categoryRead','$categoryAdd','$categoryUpdate','$categoryDelete','$userRead','$userAdd','$userUpdate','$userDelete','$roleRead','$roleAdd','$roleUpdate','$roleDelete')");
    
            (!$conn->error) ? $success['insert'] = 'Role Created Successfully' : $error['insert'] = $conn->error; 
        }
    }
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Roles</h1>
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
                                <hr>
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Roles</th>
                                                <th>Read</th>
                                                <th>Add</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Products</td>
                                                <td><input type="checkbox" class="form-control" name="productRead" id="productRead"></td>
                                                <td><input type="checkbox" class="form-control" name="productAdd" id="productAdd"></td>
                                                <td><input type="checkbox" class="form-control" name="productUpdate" id="productUpdate"></td>
                                                <td><input type="checkbox" class="form-control" name="productDelete" id="productDelete"></td>
                                            </tr>
                                            <tr>
                                                <td> Categories</td>
                                                <td><input type="checkbox" class="form-control" name="categoryRead" id="categoryRead"></td>
                                                <td><input type="checkbox" class="form-control" name="categoryAdd" id="categoryAdd"></td>
                                                <td><input type="checkbox" class="form-control" name="categoryUpdate" id="categoryUpdate"></td>
                                                <td><input type="checkbox" class="form-control" name="categoryDelete" id="categoryDelete"></td>
                                            </tr>
                                            <tr>
                                                <td>Users</td>
                                                <td><input type="checkbox" class="form-control" name="userRead" id="userRead"></td>
                                                <td><input type="checkbox" class="form-control" name="userAdd" id="userAdd"></td>
                                                <td><input type="checkbox" class="form-control" name="userUpdate" id="userUpdate"></td>
                                                <td><input type="checkbox" class="form-control" name="userDelete" id="userDelete"></td>
                                            </tr>
                                            <tr>
                                                <td>Roles</td>
                                                <td><input type="checkbox" class="form-control" name="roleRead" id="roleRead"></td>
                                                <td><input type="checkbox" class="form-control" name="roleAdd" id="roleAdd"></td>
                                                <td><input type="checkbox" class="form-control" name="roleUpdate" id="roleUpdate"></td>
                                                <td><input type="checkbox" class="form-control" name="roleDelete" id="roleDelete"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <input type="text" name="roleName" placeholder="Enter Role Name" class="form-control col-4">
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary">Add Role</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include './includes/footer.php' ?>