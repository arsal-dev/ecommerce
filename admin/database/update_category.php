<?php
    include './db_connect.php';

    $name = $_GET['name'];
    $slug = $_GET['slug'];
    $id = $_GET['id'];


    $conn->query("UPDATE product_categories SET 
            category_name = '$name', 
            category_slug = '$slug' 
            WHERE id = $id") 
            or die($conn->error);
            header('Location: ../categories.php');
?>