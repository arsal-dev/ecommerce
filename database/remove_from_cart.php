<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $cookieProducts = json_decode($_COOKIE['cart_products'], true);
        $arr = [];
        foreach($cookieProducts as $pro){
            if($pro['id'] != $id){
                array_push($arr, $pro);
            }
        }

        setcookie('cart_products', json_encode($arr), time() + (86400 * 30), '/');
        header('Location: ../index.php');
    }
?>