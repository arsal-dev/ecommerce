<?php 
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'zanana';

    $conn = new mysqli($server, $username, $password, $db_name);

    if(mysqli_error($conn)){
        echo 'database connection failed';
    }

?>