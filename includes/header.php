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
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/62a1c7c1b0d10b6f3e7678da/1g53v8k2k';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
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
                    <li><a href="contact.php">contact</a></li>
                    <li><a href="account.php">account</a></li>
                </ul>
            </nav>
            <?php 
                $num = 0;
                if(isset($_COOKIE['cart_products'])){
                    foreach(json_decode($_COOKIE['cart_products'], true) as $c){
                        $num++;
                    }
                }
            ?>
            <a href="./cart.php"><img src="./images/cart.png" alt="cart"><sub class="cart-item-number" id="cart-item-number"><?php echo $num ?? 0 ?><sub></a>
            <img src="./images/menu.png" alt="cart" class="menu-icon" onclick="myFunc()">
        </div>
    </div>