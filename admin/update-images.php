<?php include './includes/header.php'; 
    include './database/db_connect.php';
    include './database/update_images.php';


    if(!isset($_POST['update'])){
        $edit_id = $_GET['edit_id'];
        $sql = $conn->query("SELECT id, product_thumbnail, product_images FROM products WHERE id = $edit_id");
        $product_images = $sql->fetch_assoc();
        $prd_imgs = explode(',',$product_images['product_images']);
    }
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
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $edit_id ?? $id ?>">
                            <input type="hidden" name="product_thumb" value="<?php echo $product_images['product_thumbnail']; ?>">
                            <div class="form-group">
                                <label for="thumb">Product Thumbnail</label>
                                <input type="file" id="thumb" name="thumb" class="form-control" accept="image/png, image/jpeg" placeholder="Product thumb">
                            </div>
                            <div class="form-group">
                                <label for="images">Product Images (Must be 3)</label>
                                <input type="file" id="images" name="images[]" class="form-control" multiple accept="image/png, image/jpeg" placeholder="Product images">
                            </div>
                            <input type="submit" name="update" class="btn btn-primary" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Product Thumbnail</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body p-5">
                        <img class="img-fluid" src="./uploads/<?php echo $product_images['product_thumbnail'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Product Images</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body p-5">
                        <div class="row">
                        <?php for($i = 0; $i < count($prd_imgs); $i++){ ?>
                            <div class="col-lg-4">
                                <img src="./uploads/<?php echo $prd_imgs[$i] ?>" class="img-fluid">
                            </div>
                        <?php } ?>
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