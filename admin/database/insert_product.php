<?php

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $category = $_POST['category'];
        $short_desc = $_POST['short_desc'];
        $long_desc = $_POST['long_desc'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $discount = $_POST['discount'];
        $thumbnail = $_FILES['thumb'];
        $images = $_FILES['images'];

        if(empty($title)){
            $error['empty'] = 'Please Enter Product Title';
        }
        elseif(empty($short_desc)){
            $error['empty'] = 'Please Enter Product short Desc';
        }
        elseif(empty($long_desc)){
            $error['empty'] = 'Please Enter Product Long Desc';
        }
        elseif(empty($price)){
            $error['empty'] = 'Please Enter Product Price';
        }
        elseif(empty($qty)){
            $error['empty'] = 'Please Enter Product Quantity';
        }
        elseif($discount == ''){
            $error['empty'] = 'Please Enter Product Discount';
        }
        elseif($thumbnail['name'] == ''){
            $error['empty'] = 'Please Enter Thumbnail';
        }
        elseif($images['name'] == ''){
            $error['empty'] = 'Please Enter Thumbnail';
        }
        else {
            if($thumbnail['error'] != 0){
                $error['empty'] = "There is an error in your".$thumbnail['error'];
            }
            else {
                if($thumbnail['type'] == 'image/jpeg' ||
                 $thumbnail['type'] == 'image/png' || 
                 $thumbnail['type'] == 'image/jpg'){
                    $img_extention = explode('/', $thumbnail['type'])[1];
                    $random = time();
                    if($thumbnail['size'] > 10000000){
                        $error['empty'] = "Image can only be less then 10 MB";
                    }
                    else {
                        $new_thmbnail = $random.'.'.$img_extention;
                        move_uploaded_file($thumbnail['tmp_name'], './uploads/'.$new_thmbnail);
                    }
                }
                else {
                    $error['empty'] = "Please select valid image for thumbnail";
                }
            }
        }
    }


?>