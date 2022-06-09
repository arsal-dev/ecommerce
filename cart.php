<?php include './includes/header.php';
    session_start();
?>
    <!-- ----------------cart items details---------------- -->
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>subtotal</th>
                <th>remove</th>
            </tr>
            <?php 
                 if(isset($_COOKIE['cart_products'])){
                    $cookieProducts = json_decode($_COOKIE['cart_products'], true);
                    foreach($cookieProducts as $pro){ ?>
                    <tr>
                        <td>
                            <div class="cart-info"><img src="./admin/uploads/<?php echo $pro['product_thumbnail'] ?>">
                            <div>
                                <p><?php echo $pro['product_title']; ?></p>
                                <small>price: $<?php echo $pro['product_price'] ?></small>
                                <br>
                                <a href="">remove</a>
                            </div>
                            </div>
                        </td>
                        <td><input type="number" id="<?php echo $pro['id'] ?>" price="<?php echo $pro['product_price'] ?>" qty="<?php echo $pro['product_quantity'] ?>" class="user_quantity" value="<?php echo $pro['userQty']; ?>"></td>
                        <td class="price"><?php echo $pro['product_price'] * $pro['userQty'] ?></td>
                        <td><a href="./database/remove_from_cart.php?id=<?php echo $pro['id']; ?>" style="border:1px solid #fd2e26; padding: 7px;
                            background: none;">X</a></td>
                    </tr>
                <?php } } ?>
        </table>
        <div class="total-price">
            <table>
                <tr>
                    <td>subtotal</td>
                    <td id="subTotal">$135.50</td>
                </tr>
                <tr>
                    <td>Delivery Charges</td>
                    <td>$35.50</td>
                </tr>
                <tr>
                    <td>total</td>
                    <td id="finalPrice">$176</td>
                </tr>
            </table>
        </div>
        <?php if(isset($_SESSION['customer'])){ ?>
            <a href="./customer/my-orders.php?order=true" class="btn">buy now</a>
        <?php } else { ?>
                <a href="./account.php?order=true" class="btn">buy now</a>
        <?php } ?>
    </div>    
    <script>
        let subTotal = document.getElementById('subTotal');
        let user_quantity = document.querySelectorAll('.user_quantity');
        let finalPrice = document.getElementById('finalPrice');
        for(let i = 0; i < user_quantity.length; i++){
            user_quantity[i].addEventListener('change', function(){
                let thisValue = parseInt(this.value);
                let thisQty = parseInt(this.getAttribute('qty'));
                if(thisValue > thisQty){
                    this.value = this.getAttribute('qty');
                }
                let price = this.getAttribute('price');
                this.parentElement.nextSibling.nextSibling.innerHTML = price * this.value;
                calculateSubPrice();
                $obj = {
                    id: this.id,
                    qty: this.value
                }

                updateCart($obj);
            });
        }

        // update cart
        async function updateCart($obj){
            $response = await fetch('./database/updateCart.php',{
                method: 'POST',
                body: JSON.stringify($obj)
            });

            $res = await $response.text();
            console.log($res);
        }

        // calculate subtotal
        calculateSubPrice();
        function calculateSubPrice(){
            let subPrice = 0;
            document.querySelectorAll('.price').forEach((value, key) => {
                console.log(subPrice);
                subPrice = subPrice + parseInt(value.innerHTML);
                subTotal.innerHTML = '$'+subPrice;
                finalPrice.innerHTML = subPrice + 35.50;
            })
        }
    </script>
<?php include './includes/footer.php' ?>