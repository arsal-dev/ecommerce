<?php 
    include './db_connect.php';

    $id = $_GET['delete_id'];
    $thumb = $_GET['thumb'];
    $images = $_GET['images'];

    unlink("../uploads/$thumb");

    $imgs = explode(',',$images);

    for($i = 0; $i < count($imgs); $i++){
        unlink("../uploads/$imgs[$i]");
    }

    $conn->query("DELETE FROM products WHERE id = $id");

    header('Location: ../all-products.php');
?>