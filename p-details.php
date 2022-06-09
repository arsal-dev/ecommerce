<?php include './includes/header.php' ?>
<?php

    include './database/db_connect.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = $conn->query("SELECT * FROM products WHERE id = $id");

        $product = $sql->fetch_assoc();

        $img_arr = explode(',',$product['product_images']);

        array_push($img_arr, $product['product_thumbnail']);
    }


?>
    
    <!-- ----------------Single Product Details---------------- -->
    <div class="small-container single-product">
        <div class="col-2">
            <div class="row">
                <div class="col-2">
                    <img src="./admin/uploads/<?php echo $product['product_thumbnail']; ?>" width="100%" id="productImg">
                    <div class="s-row">
                        <?php for($i = 0; $i < count($img_arr); $i++){ ?>
                            <div class="s-img">
                                <img src="./admin/uploads/<?php echo $img_arr[$i]; ?>" width="100%" class="smallImg">
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-2">
                    <p>Home / T-Shirt</p>
                    <h1><?php echo $product['product_title'] ?></h1>
                    <h4>$<?php echo $product['product_price'] ?></h4>
                    <!-- <select>
                        <option>select size</option>
                        <option>small</option>
                        <option>medium</option>
                        <option>large</option>
                        <option>XL</option>
                        <option>XXL</option>
                    </select> -->
                    <!-- <input type="number" value="1"> -->
                    <?php
                        $cookieExists = false;
                        if(isset($_COOKIE['cart_products'])){
                            $cookieProducts = json_decode($_COOKIE['cart_products'], true);
                            foreach($cookieProducts as $pro){
                                if($product['id'] == $pro['id']){
                                    $cookieExists = true;
                                    break;
                                }
                            }
                        }
                    ?>
                    <?php if($cookieExists) { ?>
                        <a href="./database/remove_from_cart.php?id=<?php echo $product['id']; ?>" class="btn-cart-remove">Remove From Cart</a>
                    <?php } else { ?>
                        <a href="./database/add_to_cart.php?id=<?php echo $product['id']; ?>" class="btn-cart">Add to Cart</a>
                    <?php } ?>
                    <!-- <a href="" class="btn">add to cart</a> -->
                    <h3 class="mt-4">product details</h3>
                    <br>
                    <p><?php echo $product['product_long_desc'] ?></p>
                </div>
            </div>
        </div>
    </div>
        <!-- ----------------Reviews---------------- -->
    
    
        <div class="small-container">
            <div class="row row-2">
                <h2>reviews</h2>
                <div class="ratings">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-half-stroke-solid.png" alt="">
                </div>
            </div>
            <textarea name="text" id="review" cols="30" rows="10"></textarea>
        </div>
    <!-- ----------------title---------------- -->
    <div class="small-container">
        <div class="row row-2">
            <h2>related products</h2>
                <p>View More</p>
        </div>
    </div>
    
    <!-- ----------------products---------------- -->
    
    <div class="small-container">
        <div class="row">
            <div class="col-4">
                <img src="./images/product-1.jpg" alt="">
                <h4>red printed t-shirt</h4>
                <div class="rating">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-half-stroke-solid.png" alt="">
                </div>
                <p>49.50$</p>
            </div>
            <div class="col-4">
                <img src="./images/product-2.jpg" alt="">
                <h4>black sneakers</h4>
                <div class="rating">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                </div>
                <p>40.50$</p>
            </div>
            <div class="col-4">
                <img src="./images/product-3.jpg" alt="">
                <h4>gray sneakers</h4>
                <div class="rating">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-half-stroke-solid.png" alt="">
                </div>
                <p>45.50$</p>
            </div>
            <div class="col-4">
                <img src="./images/product-4.jpg" alt="">
                <h4>blue printed t-shirt</h4>
                <div class="rating">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                    <img src="./images/star-solid.png" alt="">
                </div>
                <p>49.50$</p>
            </div>
        </div>
    </div>
    <?php include './includes/footer.php' ?>