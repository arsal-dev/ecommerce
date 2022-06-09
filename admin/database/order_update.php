<?php
    include './db_connect.php';

    if(isset($_POST['order_update'])){
        $orderStatus = $_POST['order_status'];
        $id = $_POST['id'];

        $sql = $conn->query("UPDATE `orders` SET `status`='$orderStatus' WHERE id = $id");
        
        header('Location: ../orders.php');
    }
?>