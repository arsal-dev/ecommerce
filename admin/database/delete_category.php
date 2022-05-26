<?php 

    include './db_connect.php';


    $id = $_GET['id'];

    $conn->query("DELETE FROM product_categories WHERE id = $id");

    if($conn->error){
        echo 'Unable to delete please contact administrator';
    }
    else {
        header('Location: ../categories.php');
    }
?>