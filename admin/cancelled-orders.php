<?php include './includes/header.php' ?>
<?php
    $sql = $conn->query("SELECT orders.*, customers.name FROM orders LEFT JOIN customers ON orders.customer_id = customers.id") or die($conn->error);
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-around mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cancelled Orders</h1>
                        <a href="./cancelled-orders.php" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                    class="fas fa-shopping-cart fa-sm text-white-50"></i> Cancelled Orders</a>
                    <a href="./peding-cancelation.php" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                    class="fas fa-shopping-cart fa-sm text-white-50"></i> Pending Cancellation</a>
                    <a href="./returned-orders.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-shopping-cart fa-sm text-white-50"></i> Returned Orders</a>
                    <a href="./deliverd-orders.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-shopping-cart fa-sm text-white-50"></i> Deliverd Orders</a>
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
                                    <h6 class="m-0 font-weight-bold text-primary">New Orders</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer</th>
                                                <th>Products</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $num = 1; ?>
                                            <?php while($row = mysqli_fetch_assoc($sql)){ ?>
                                                <?php if($row['status'] == 'Order Canceled'){ ?>
                                                <tr>
                                                    <td><?php echo $num++ ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['products'] ?></td>
                                                    <td><?php echo $row['total_price'] ?></td>
                                                    <td><?php echo $row['status'] ?></td>
                                                    <td><?php echo $row['created_at'] ?></td>
                                                    <td>
                                                        <form action="./database/order_update.php" method="POST">
                                                            <select name="order_status" class="form-control">
                                                                <option value="Order Accepted">Order Accepted</option>
                                                                <option value="Order Deliverd">Order Deliverd</option>
                                                            </select>
                                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                            <input type="submit" name="order_update" class="btn btn-primary my-2" value="Update">
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            <?php } ?>
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
<?php include './includes/footer.php' ?>