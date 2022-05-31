<?php include './includes/header.php';
include './database/db_connect.php';
$sql = $conn->query('SELECT products.*, product_categories.category_name FROM products LEFT JOIN product_categories ON products.product_category = product_categories.id');
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Products</h1>
            <a href="./add-products.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-pen fa-sm text-white-50"></i> Add Products</a>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Thumbnail</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Discription</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Thumbnail</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Discription</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php while($row = $sql->fetch_assoc()){ ?>
                                    <tr>
                                        <td><img class="img-fluid" width="100px" src="./uploads/<?php echo $row['product_thumbnail'] ?>"></td>
                                        <td><?php echo $row['product_title'] ?></td>
                                        <td><?php echo $row['category_name'] ?></td>
                                        <td><?php echo $row['product_short_desc'] ?></td>
                                        <td><?php echo $row['product_price'] ?></td>
                                        <td><?php echo $row['product_quantity'] ?></td>
                                        <td><?php echo $row['discount'] ?></td>
                                        <td><a href="./edit-product.php?edit_id=<?php echo $row['id']?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a><a href="./update-images.php?edit_id=<?php echo $row['id']?>" class="btn btn-primary mx-2"><i class="fa fa-edit"></i> Update Images</a><a href="./database/delete_product.php?delete_id=<?php echo $row['id']?>&thumb=<?php echo $row['product_thumbnail'] ?>&images=<?php echo $row['product_images'] ?>" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Delete</a></td>
                                    </tr>
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
<?php include './includes/footer.php' ?>