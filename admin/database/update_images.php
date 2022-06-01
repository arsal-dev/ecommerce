<?php 
    include './database/db_connect.php';

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $prod_thumb = $_POST['product_thumb'];
        $thumb = $_FILES['thumb'];
        $images = $_FILES['images'];

        $sql = $conn->query("SELECT id, product_thumbnail, product_images FROM products WHERE id = $id");
        $product_images = $sql->fetch_assoc();
        $prd_imgs = explode(',',$product_images['product_images']);

        if($thumb['name'] != ''){

            if($thumb['type'] == 'image/jpeg' ||
                 $thumb['type'] == 'image/png' || 
                 $thumb['type'] == 'image/jpg'){
                    $img_extention = explode('/', $thumb['type'])[1];
                    $random = time();
                    if($thumb['size'] > 10000000){
                        $error['empty'] = "Image can only be less then 10 MB";
                    }
                    else {
                        $new_thmbnail = $random.'.'.$img_extention;
                        unlink('./uploads/'.$product_images['product_thumbnail']);
                        move_uploaded_file($thumb['tmp_name'], './uploads/'.$new_thmbnail);
                        
                        $sql = $conn->query("UPDATE `products` SET `product_thumbnail`='$new_thmbnail' WHERE id = $id");

                        echo "<script>location.replace('all-products.php');</script>";
                    }
                 }
                 else {
                    $error['empty'] = "Please select valid image for thumbnail";
                 }
        }
        elseif($images['name'][0] != ''){
            $imgs = count($images['name']);
            if($imgs != 3){
                $error['empty'] = "Images Must be 3";
            }
            else {

                for($i = 0; $i < count($prd_imgs); $i++){
                    unlink("./uploads/$prd_imgs[$i]");
                }
                $img_arr = [];
                for($i = 0; $i < $imgs; $i++){
                    if($images['type'][$i] == 'image/jpg' ||
                        $images['type'][$i] == 'image/jpeg' ||
                        $images['type'][$i] == 'image/png'
                    ){
                        if($images['size'][$i] > 10000000){
                            $error['empty'] = "Image can only be less then 10 MB";
                        }
                        else {
                            $img_extention = explode('/', $images['type'][$i])[1];
                            $new_image_name = rand() . '.' . $img_extention;
                            
                            array_push($img_arr, $new_image_name);

                            move_uploaded_file($images['tmp_name'][$i], './uploads/'.$new_image_name);

                        }
                    }
                    else {
                        $error['empty'] = "Please select valid images";
                    }
                }
                $new_images = implode(',',$img_arr);
                $sql = $conn->query("UPDATE `products` SET `product_images`='$new_images' WHERE id = $id");

                echo "<script>location.replace('all-products.php');</script>";
            }
        }
    }


?>