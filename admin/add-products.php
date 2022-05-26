<?php include './includes/header.php' ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">All Products</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                                <div class="card-body p-5">
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="title">Product Title</label>
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Product Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Product Category</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="short_desc">Product Short Desc</label>
                                            <input type="text" id="short_desc" name="short_desc" class="form-control" placeholder="Product short_desc">
                                        </div>
                                        <div class="form-group">
                                            <label for="long_desc">Product Long Desc</label>
                                            <textarea name="long_desc" id="long_desc" cols="30" rows="10" class="form-control" placeholder="Enter Log Desc"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="thumb">Product Thumbnail</label>
                                            <input type="file" id="thumb" name="thumb" class="form-control" accept="image/png, image/jpeg" placeholder="Product thumb">
                                        </div>
                                        <div class="form-group">
                                            <label for="thumb">Product Images (Must be 3)</label>
                                            <input type="file" id="thumb" name="thumb" class="form-control" multiple accept="image/png, image/jpeg" placeholder="Product thumb">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Product Price</label>
                                            <input type="number" id="price" name="price" class="form-control" placeholder="Product price">
                                        </div>
                                        <div class="form-group">
                                            <label for="qty">Product Quantity</label>
                                            <input type="number" id="qty" name="qty" class="form-control" placeholder="Product qty">
                                        </div>
                                        <div class="form-group">
                                            <label for="discount">Product Discount</label>
                                            <input type="number" id="discount" name="discount" class="form-control" placeholder="Product discount">
                                        </div>
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