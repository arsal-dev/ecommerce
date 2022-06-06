<?php include './includes/header.php' ?>
<?php include './database/get_products.php' ?>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <h1>give your workout <br> a new style</h1>
                    <p> Success isn't always about greatness. It's about consistency. <br> Consistent hard work gives
                        success. greatnss will come up.</p>
                    <a href="" class="btn">explore now &#8594</a>
                </div>
                <div class="col-2">
                    <img src="./images/image1.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- ------------featured categories---------- -->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3"><img src="./images/category-1.jpg" alt=""></div>
                <div class="col-3"><img src="./images/category-2.jpg" alt=""></div>
                <div class="col-3"><img src="./images/category-3.jpg" alt=""></div>
            </div>
        </div>
    </div>
    <!-- ------------featured products---------- -->
    <div class="small-container">
        <h2 class="title">featured products</h2>
        <div class="row">
            <div class="col-4">
            <a href="p-details.php"><img src="./images/product-1.jpg" alt=""></a>
                <a href="p-details.php">
                    <h4>red printed t-shirt</h4>
                </a>
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

        <h2 class="title">latest products</h2>
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
                    <img class="product_image" src="./admin/uploads/<?php echo $row['product_thumbnail'] ?>" alt="">
                    <h4 class="fw-bold mt-1 product_title"><?php echo $row['product_title'] ?></h4>
                    <div class="rating mt-1 mb-2">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                    </div>
                    <p class="product_short_desc"><?php echo $row['product_short_desc'] ?></p>
                    <p class="price mt-2">$<?php echo $row['product_price'] ?></p>
                    <br>
                    <?php if($cookieExists) { ?>
                        <a href="./database/remove_from_cart.php?id=<?php echo $row['id']; ?>" class="btn-cart-remove">Remove From Cart</a>
                    <?php } else { ?>
                        <a href="./database/add_to_cart.php?id=<?php echo $row['id']; ?>" class="btn-cart">Add to Cart</a>
                    <?php } ?>
                    <button class="btn-buy">Buy Now</button>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- ----------------offer---------------- -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2 offer-img">
                    <img src="./images/exclusive.png">
                </div>
                <div class="col-2">
                    <p>Exclusively Available on Zyb Store</p>
                    <h1>smart band 4</h1>
                    <small>Lorem ipsum dolor sit amet consectetur, adipisicing elit.Recusandae veritatis aliquam fugiat
                        natus consequuntur hic eius facere!</small>
                    <a href="" class="btn">buy now &#8594</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------testimonial---------------- -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe, ut molestiae nesciunt quo
                        incidunt voluptas minus autem nemo repellat dignissimos iste excepturi eveniet! Quisquam
                        quibusdam voluptas officiis nam doloremque dolor.</p>
                    <div class="rating">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-half-stroke-solid.png" alt="">
                    </div>
                    <img class="img" src="./images/user-1.png" alt="">
                    <h3>alison parker</h3>
                </div>
                <div class="col-3">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe, ut molestiae nesciunt quo
                        incidunt voluptas minus autem nemo repellat dignissimos iste excepturi eveniet! Quisquam
                        quibusdam voluptas officiis nam doloremque dolor.</p>
                    <div class="rating">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-half-stroke-solid.png" alt="">
                    </div>
                    <img class="img" src="./images/user-2.png" alt="">
                    <h3>peter parker</h3>
                </div>
                <div class="col-3">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe, ut molestiae nesciunt quo
                        incidunt voluptas minus autem nemo repellat dignissimos iste excepturi eveniet! Quisquam
                        quibusdam voluptas officiis nam doloremque dolor.</p>
                    <div class="rating">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-solid.png" alt="">
                        <img src="./images/star-half-stroke-solid.png" alt="">
                    </div>
                    <img class="img" src="./images/user-3.png" alt="">
                    <h3>merry jane</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------brands---------------- -->
    <div class="brands">
        <div class="row">
            <div class="col-5"><img src="./images/logo-godrej.png" alt=""></div>
            <div class="col-5"><img src="./images/logo-oppo.png" alt=""></div>
            <div class="col-5"><img src="./images/logo-coca-cola.png" alt=""></div>
            <div class="col-5"><img src="./images/logo-paypal.png" alt=""></div>
            <div class="col-5"><img src="./images/logo-philips.png" alt=""></div>
        </div>
    </div>
<?php include './includes/footer.php' ?>