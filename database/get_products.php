<?php 
    include "./database/db_connect.php";
    $products = $conn->query("SELECT * FROM products") or die($conn->error);
?>