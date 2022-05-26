<?php

    include './database/db_connect.php';

    if(isset($_POST['submit'])){
        $name = $_POST['category_name'];
        $slug = $_POST['category_slug'];

        if(empty($name)){
            $error['name'] = 'Please Enter Category Name';
        }
        elseif(empty($slug)){
            $error['slug'] = 'Please Enter Category Slug';
        }else {
            $sql = $conn->query("INSERT INTO product_categories (`category_name`, `category_slug`) VALUES ('$name', '$slug')");
            
            if($conn->error){
                $error['insert'] = $conn->error;
            }
            else {
                $success['insert'] = 'Category Saved To Database';
            }

            $name = '';
            $slug = '';
        }
    }



?>