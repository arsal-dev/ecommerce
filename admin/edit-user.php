<?php include './includes/header.php' ?>
<?php
include './database/db_connect.php';
$id = $_GET['edit_id'];
$user = $conn->query("SELECT users.id, users.username, users.role_id, users.created_at, roles.role_name FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE users.id = $id");
$user = $user->fetch_assoc();
$roles = $conn->query("SELECT id, role_name FROM roles");
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
                    </div>
                    <div id="js_alert" class="alert alert-success alert-dismissible fade hide" role="alert">
                        <span id="success_alert"></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
                        <!-- Pie Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Users</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form id="form-user">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="user_id" value="<?php echo $user['id'] ?>">
                                            <label for="name">Username</label>
                                            <input type="text" id="name" name="username" placeholder="Username" value="<?php echo $user['username'] ?>" class="form-control">
                                        </div> 
                                        <div class="form-group">
                                            <label for="pass">Password</label>
                                            <input type="password" id="pass" name="password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="roles">Roles</label>
                                            <select name="role" class="form-control" id="roles">
                                                <?php while($row = $roles->fetch_assoc()){ ?>
                                                    <?php if($row['id'] == $user['role_id']){ ?>
                                                        <option selected value="<?php echo $row['id']; ?>"><?php echo $row['role_name']; ?></option>
                                                    <?php } else {  ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['role_name']; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <script>
                document.getElementById('form-user').addEventListener('submit', function(e){
                    e.preventDefault();
                    const user_id = document.getElementById('user_id').value;
                    const name = document.getElementById('name').value;
                    const pass = document.getElementById('pass').value;
                    const role = document.getElementById('roles').value;

                    let obj = {user_id, name, pass, role};
                    submitData(obj);
                });

                async function submitData(obj){
                    let response = await fetch('./database/edit_user.php', {
                        method: 'POST',
                        body: JSON.stringify(obj)
                    });
                    let res = await response.text();
                    res = JSON.parse(res);
                    if(res.code == 400){
                        const alert = document.getElementById('js_alert');
                        alert.classList.replace('hide', 'show');
                        alert.classList.replace('alert-success', 'alert-danger');
                        document.getElementById('success_alert').innerHTML = res.error;
                    }
                    else {
                        location.replace('./users.php');
                    }
                }
            </script>
<?php include './includes/footer.php' ?>