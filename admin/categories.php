<?php include './includes/header.php' ?>
<?php include './database/insert_category.php';
$sql = $conn->query("SELECT * FROM product_categories");
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
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
                                    <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
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
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $num = 1; ?>
                                            <?php while($row = mysqli_fetch_assoc($sql)){ ?>
                                                <tr>
                                                    <?php $edit_id = "update-". $row['id']; ?>
                                                    <td><?php echo $num++ ?></td>
                                                    <td id="name-<?php echo $row['id'] ?>" class="<?php echo "edits-". $row['id']; ?>"><?php echo $row['category_name'] ?></td>
                                                    <td id="slug-<?php echo $row['id'] ?>" class="<?php echo "edits-". $row['id']; ?>"><?php echo $row['category_slug'] ?></td>
                                                    <td><?php echo $row['created_at'] ?></td>
                                                    <td><button class="edit btn btn-primary" id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i> Edit</button>

                                                    <a class="update btn btn-primary d-none" id="<?php echo $edit_id ?>"><i class="fa fa-edit"></i> Update</a>

                                                    <button id="<?php echo $row['id'] ?>" data-toggle="modal" data-target="#deleteModal" class="remove btn btn-danger mx-3"><i class="fas fa-trash-alt"></i> Remove</button></td>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Add Categories</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                        <div class="form-group">
                                            <label for="name">Category Name</label>
                                            <input type="text" id="name" name="category_name" placeholder="Category Name" value="<?php echo $name ?? '' ?>" class="form-control">
                                            <p class="text-danger"><?php echo $error['name'] ?? '' ?></p>
                                        </div> 
                                        <div class="form-group">
                                            <label for="slug">Category Slug</label>
                                            <input type="text" id="slug" name="category_slug" placeholder="Category Slug" value="<?php echo $slug ?? '' ?>" class="form-control">
                                            <p class="text-danger"><?php echo $error['slug'] ?? '' ?></p>
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
            <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Click 'Remove' to delete the data
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-danger" id="mdl_dlt">Remove</a>
      </div>
    </div>
  </div>
</div>
<script>
    // remove
    removeCategory();
    function removeCategory(){
        let remove = document.querySelectorAll('.remove');
        for(let i = 0; i < remove.length; i++){
            remove[i].addEventListener('click', function(){
                document.getElementById('mdl_dlt').setAttribute('href', 'database/delete_category.php?id='+this.id);
            });
        }
    }

    // edit
    editData();
    function editData(){
        let edit = document.querySelectorAll('.edit');
        for(let i = 0; i < edit.length; i++){
            edit[i].addEventListener('click', function(){
                id = this.id;
                let selector = '.edits-' + id;
                let editable = document.querySelectorAll(selector);
                for(let i = 0; i < editable.length; i++){
                    editable[i].setAttribute('contenteditable', 'true');
                }
                editable[0].focus();
                let updateId = 'update-'+id;
                document.getElementById(updateId).classList.remove('d-none');
                this.classList.add('d-none');
                this.parentElement.innerHTML += '<button class="cancel btn btn-secondary">Cancel</button>';
                // cancel
                let cancel = document.querySelectorAll('.cancel');
                for(let i = 0; i < cancel.length; i++){
                    cancel[i].addEventListener('click', function(){
                        let sibling = this.parentElement.previousSibling.previousSibling.previousSibling.previousSibling;
                        sibling_id = sibling.classList[0];
                        let sbls = document.querySelectorAll('.'+sibling_id);
                        for(let i = 0; i < sbls.length; i++){
                            sbls[i].setAttribute('contenteditable', 'false');
                        }
                        cancel[i].remove();
                        update_id = sibling_id.split('-')[1];
                        document.getElementById(update_id).classList.remove('d-none');
                        document.getElementById(updateId).classList.add('d-none');
                        editData();
                    });
                    updateData();
                    removeCategory();
                }
            });
        }
    }
    // update
    function updateData(){
        let update = document.querySelectorAll('.update');
        for(let i = 0; i < update.length; i++){
            update[i].addEventListener('click', function(){
                let id = this.id.split('-')[1];
                let name = document.getElementById('name-'+id).innerHTML;
                let slug = document.getElementById('slug-'+id).innerHTML;

                this.setAttribute('href', `./database/update_category.php?name=${name}&slug=${slug}&id=${id}`);
            });
        }
    }
</script>
<?php include './includes/footer.php' ?>