<?php include './includes/header.php' ?>
<?php include './database/get_products.php' ?>
    <div class="small-container">
        <div class="row row-2">
            <h2>All Products</h2>
            <select>
                <option>default sorting</option>
                <option>sort by price</option>
                <option>sort by popularity</option>
                <option>sort by rating</option>
                <option>sort by sale</option>
            </select>
        </div>
        <div class="row">
        <?php while($row = $products->fetch_assoc()){ ?>
            <?php
                    $cookieExists = false;
                    if(isset($_COOKIE['cart_products'])){
                        $cookieProducts = json_decode($_COOKIE['cart_products'], true);
                        foreach($cookieProducts as $pro){
                            if($row['id'] == $pro['id']){
                                $cookieExists = true;
                                break;
                            }
                        }
                    }
                ?>
            <div class="col-4">
                <a href="p-details.php?id=<?php echo $row['id'] ?>">
                    <img src="./admin/uploads/<?php echo $row['product_thumbnail'] ?>">
                    <h4><?php echo $row['product_title'] ?></h4>
                </a>
                <p class="mb-4">$<?php echo $row['product_price'] ?></p>
                <?php if($cookieExists) { ?>
                    <a href="./database/remove_from_cart.php?id=<?php echo $row['id']; ?>" class="btn-cart-remove">Remove From Cart</a>
                <?php } else { ?>
                    <a href="./database/add_to_cart.php?id=<?php echo $row['id']; ?>" class="btn-cart">Add to Cart</a>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

        <!-- <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594</span>
        </div> -->
    </div>

<?php include './includes/footer.php' ?>