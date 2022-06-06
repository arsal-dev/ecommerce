<?php 
    include './db_connect.php';

    $data = json_decode(file_get_contents('php://input'), true);
    $user_id = $data['user_id'];
    $name = $data['name'];
    $pass = $data['pass'];
    $role = $data['role'];


    if(empty($name)){
        echo json_encode(['code' => 400, 'error' => 'Please Enter Name!']);
    }
    elseif(empty($pass)){
        echo json_encode(['code' => 400, 'error' => 'Please Enter Password!']);
    }
    elseif(strlen($pass) <= 7){
        echo json_encode(['code' => 400, 'error' => 'Password Must be Grater Then  or equal to 8!']);
    }
    else {

        $newPass = password_hash($pass, PASSWORD_DEFAULT);

        $conn->query("UPDATE `users` SET `username` = '$name', `password` = '$newPass', `role_id` = '$role' WHERE id = $user_id");

        if($conn->error){
            echo json_encode(['code' => 400, 'error' => $conn->error]);
        }
        else {
            echo json_encode(['code' => 200, 'success' => 'User Updated Successfully!']);
        }
    }
?>