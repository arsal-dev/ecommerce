<?php include './includes/header.php'; 
    include './database/db_connect.php';
    include './database/edit_product.php';
    $result = $conn->query("SELECT id, category_name FROM product_categories") or die($conn->error);
    $edit_id = $_GET['edit_id'];

    $sql = $conn->query("SELECT * FROM products WHERE id = $edit_id");
    $product = $sql->fetch_assoc();
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Product</h1>
        </div>

        <?php if(isset($success['insert'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Congrats!</strong> <?php echo $success['insert']; ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <?php if(isset($error['empty'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> <?php echo $error['empty']; ?>.
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
                        <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body p-5">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <div class="form-group">
                                <label for="title">Product Title</label>
                                <input type="text" id="title" name="title" value="<?php echo $product['product_title'] ?>" class="form-control" placeholder="Product Title">
                            </div>
                            <div class="form-group">
                                <label for="category">Product Category</label>
                                <select name="category" id="category" class="form-control">
                                    <?php while($row = $result->fetch_assoc()){ ?>
                                        <?php if($row['id'] == $product['product_category']){ ?>
                                            <option selected value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="short_desc">Product Short Desc</label>
                                <input type="text" id="short_desc" name="short_desc" value="<?php echo $product['product_short_desc'] ?>" class="form-control" placeholder="Product short_desc">
                            </div>
                            <div class="form-group">
                                <label for="long_desc">Product Long Desc</label>
                                <textarea name="long_desc" id="long_desc" cols="30" rows="10" class="form-control" placeholder="Enter Log Desc"><?php echo $product['product_long_desc'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Product Price</label>
                                <input type="number" id="price" name="price" value="<?php echo $product['product_price'] ?>" class="form-control" placeholder="Product price">
                            </div>
                            <div class="form-group">
                                <label for="qty">Product Quantity</label>
                                <input type="number" id="qty" name="qty" value="<?php echo $product['product_quantity'] ?>" class="form-control" placeholder="Product qty">
                            </div>
                            <div class="form-group">
                                <label for="discount">Product Discount (0 = no discount | in %)</label>
                                <input type="number" id="discount" name="discount" value="<?php echo $product['discount'] ?>" class="form-control" placeholder="Product discount">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
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