<?php

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $short_desc = $_POST['short_desc'];
        $long_desc = $_POST['long_desc'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $discount = $_POST['discount'];

        if(empty($title)){
            $error['empty'] = 'Please Enter Product Title';
        }
        elseif(empty($short_desc)){
            $error['empty'] = 'Please Enter Product short Desc';
        }
        elseif(empty($long_desc)){
            $error['empty'] = 'Please Enter Product Long Desc';
        }
        elseif(empty($price)){
            $error['empty'] = 'Please Enter Product Price';
        }
        elseif(empty($qty)){
            $error['empty'] = 'Please Enter Product Quantity';
        }
        elseif($discount == ''){
            $error['empty'] = 'Please Enter Product Discount';
        }
        else {
            $sql = $conn->query("UPDATE `products` SET `product_category`='$category',`product_title`='$title',`product_short_desc`='$short_desc',`product_long_desc`='$long_desc',`product_price`='$price',`product_quantity`='$qty',`discount`='$discount' WHERE id = $id") or die($conn->error);

            echo "<script>location.replace('all-products.php');</script>";
        }
    }
    
?>