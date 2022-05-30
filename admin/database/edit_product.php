<?php

    include './db_connect.php';

    $id = $_GET['edit_id'];


    $sql = $conn->query("SELECT * FROM products WHERE id = $id");

    $row = $sql->fetch_assoc();

    
?>