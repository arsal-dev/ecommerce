<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,500;0,600;0,700;1,300;1,500&display=swap"
        rel="stylesheet">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="https://azadchaiwala.pk/assets/css/fontawesome/css/all.min.css">
    <title>ZYB Store</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #delBtn:hover {
            background-color: #fd2e26 !important;
            color: #fff;
        }
    </style>
</head>

<body>
<div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="./images/logo.png" alt="Logo"></a>
            </div>
            <nav>
                <ul id="links">
                    <li><a href="index.php">home</a></li>
                    <li><a href="products.php">products</a></li>
                    <li><a href="#about">about</a></li>
                    <li><a href="#contact">contact</a></li>
                    <li><a href="account.php">account</a></li>
                </ul>
            </nav>
            <?php 
                $num = 0;
                foreach(json_decode($_COOKIE['cart_products'], true) as $c){
                    $num++;
                }
            ?>
            <a href="./cart.php"><img src="./images/cart.png" alt="cart"><sub class="cart-item-number" id="cart-item-number"><?php echo $num ?? 0 ?><sub></a>
            <img src="./images/menu.png" alt="cart" class="menu-icon" onclick="myFunc()">
        </div>
    </div>