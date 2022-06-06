<?php 
    include './db_connect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];


        $sql = $conn->query("SELECT id, product_thumbnail, product_price, product_quantity, product_title FROM products WHERE id = $id");

        $product = $sql->fetch_assoc();


        $products_array = (isset($_COOKIE['cart_products'])) ? json_decode($_COOKIE['cart_products'], true) : [];

        array_push($products_array, $product);

        setcookie('cart_products', json_encode($products_array), time() + (86400 * 30), '/');

        header('Location: ../index.php');
    }
?>