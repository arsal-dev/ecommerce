<?php 

    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['id'];
    $qty = $data['qty'];

    $products = json_decode($_COOKIE['cart_products'], true);

    $temp_arr = [];
    foreach($products as $product){
        if($product['id'] == $id){
            $product['userQty'] = $qty;
        }
        array_push($temp_arr, $product);
    }

    setcookie('cart_products', json_encode($temp_arr), time() + (86400 * 30), '/');

    echo json_encode(['code' => 200, 'success' => 'cookie updated']);

?>