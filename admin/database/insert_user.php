<?php 

    include './database/db_connect.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        if(empty($username)){
            $error['name'] = 'Please Enter Username';
        }
        elseif(empty($password)){
            $error['password'] = 'Please Enter User Password';
        }
        elseif(strlen($password) <= 7){
            $error['password'] = 'Password Must Be Grater then or equal 8';
        }
        else {

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = $conn->query("INSERT INTO users (`username`, `password`, `role_id`) VALUES ('$username', '$password_hash', '$role')");

            (!$conn->error) ? $success['insert'] = 'Role Created Successfully' : $error['insert'] = $conn->error; 
        }
    }
?>