<?php include './includes/header.php' ?>
<?php include './database/insert_user.php';
if(!$role['userRead']){
    echo "<script>location.replace('./index.php');</script>";
}
$users = $conn->query("SELECT users.id, users.username, users.role_id, users.created_at, roles.role_name FROM users LEFT JOIN roles ON users.role_id = roles.id");
$roles = $conn->query("SELECT id, role_name FROM roles");
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
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
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Roles</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $num = 1; while($row = $users->fetch_assoc()){ ?>
                                                <tr>
                                                    <td><?php echo $num++ ?></td>
                                                    <td><?php echo $row['username'] ?></td>
                                                    <td><?php echo $row['role_name'] ?></td>
                                                    <td><?php echo $row['created_at'] ?></td>
                                                    <td><a href="./edit-user.php?edit_id=<?php echo $row['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="./database/delete_user.php?delete_id=<?php echo $row['id'] ?>" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Delete</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Users</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                        <div class="form-group">
                                            <label for="name">Username</label>
                                            <input type="text" id="name" name="username" placeholder="Username" value="<?php echo $username ?? '' ?>" class="form-control">
                                            <p class="text-danger"><?php echo $error['name'] ?? '' ?></p>
                                        </div> 
                                        <div class="form-group">
                                            <label for="pass">Password</label>
                                            <input type="password" id="pass" name="password" placeholder="Password" value="<?php echo $password ?? '' ?>" class="form-control">
                                            <p class="text-danger"><?php echo $error['password'] ?? '' ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="roles">Roles</label>
                                            <select name="role" class="form-control" id="roles">
                                                <?php while($row = $roles->fetch_assoc()){ ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['role_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary">
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