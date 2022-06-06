<?php  
    include './db_connect.php';

    $id = $_GET['delete_id'];

    $conn->query("DELETE FROM users WHERE id = $id");

    if($conn->error){
        echo $conn->error;
    }
    else {
        header('Location: ../users.php');
    }

?>