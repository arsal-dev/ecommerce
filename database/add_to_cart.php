<?php 
    include './db_connect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];


        $sql = $conn->query("SELECT id, product_thumbnail, product_price, product_quantity, product_title FROM products WHERE id = $id");

        $product = $sql->fetch_assoc();


        $products_array = (isset($_COOKIE['cart_products'])) ? json_decode($_COOKIE['cart_products'], true) : [];

        $temp_arr = [
            'id' => $product['id'],
            'product_thumbnail' => $product['product_thumbnail'],
            'product_price' => $product['product_price'],
            'product_quantity' => $product['product_quantity'],
            'product_title' => $product['product_title'],
            'userQty' => 1
        ];

        array_push($products_array, $temp_arr);

        setcookie('cart_products', json_encode($products_array), time() + (86400 * 30), '/');

        header('Location: ../index.php');
    }
?>