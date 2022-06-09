<?php 

    include './db_connect.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];


        $sql = $conn->query("UPDATE `orders` SET `status`= 'Order Cancellation Pending' WHERE id = $id");
        header('Location: ../my-orders.php');
    }


?>