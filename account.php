<?php include './includes/header.php' ?>
<?php
    if(isset($_GET['order'])){
        $error = "Please Login/Signup to continue";
    }
    include './database/db_connect.php';
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];

        if(empty($name)){
            $error = 'Please Enter Name';
        }
        elseif(empty($email)){
            $error = 'Please Enter Email';
        }
        elseif(empty($password)){
            $error = 'Please Enter Password';
        }
        elseif(strlen($password) < 8){
            $error = "Password Must be grater then or equal to 8";
        }
        elseif(empty($number)){
            $error = 'Please Enter Number';
        }
        elseif(empty($address)){
            $error = 'Please Enter Address';
        }
        else {

            $username = $conn->query("SELECT id from customers WHERE name = '$name'");
            $db_name = mysqli_num_rows($username);
            $db_email = $conn->query("SELECT id from customers WHERE email = '$email'");
            $email_result = mysqli_num_rows($db_email);
            if($db_name > 0){
                $error = 'Username Already Exists';
            }
            elseif($email_result > 0){
                $error = 'Email Already Exists';
            }
            else {
                $newPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = $conn->query("INSERT INTO `customers`(`name`, `email`, `phone`, `address`, `password`, `gender`) VALUES ('$name','$email','$number','$address','$newPassword','$gender')");
    
                if(!$conn->error){
                    session_start();
                    $_SESSION['customer'] = $name;
                    if($_COOKIE['cart_products']){
                        header('Location: ./cart.php');
                    }
                    else {
                        header('Location: ./customer');
                    }
                }
            }
        }
    }

    if(isset($_POST['login'])){
        $username = $_POST['name'];
        $userPass = $_POST['password'];

        if(empty($username)){
            $error = 'Please Enter Username';
        }
        elseif(empty($userPass)){
            $error = 'Please Enter Password';
        }
        else {
            $user = $conn->query("SELECT password FROM customers WHERE name = '$username'");
            $db_Password = $user->fetch_assoc();
            if(mysqli_num_rows($user) < 1){
                $error = 'Username or Password is Incorrect!';
            }
            else{
                if(password_verify($userPass, $db_Password['password'])){
                    session_start();
                    $_SESSION['customer'] = $username;
                    if($_COOKIE['cart_products']){
                        header('Location: ./cart.php');
                    }
                    else {
                        header('Location: ./customer');
                    }
                }
                else {
                    $error = 'Username or Password is Incorrect!';
                }
            }
        }
    }


?>
    <!-- ----------------account  page---------------- -->
    <div class="account">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="./images/image1.png" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">login</span>
                            <span onclick="register()">register</span>
                            <hr id="indicate">
                        </div>
                        <p class="error mb-1"><?php echo $error ?? ''; ?></p>
                        <form id="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="text" name="name" placeholder="username">
                            <input type="password" name="password" placeholder="password">
                            <button type="submit" name="login" class="btn">login</button>
                            <a href="">forgot password</a>
                        </form>
                        <form id="reg" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="text" value="<?php echo $name ?? ''; ?>" name="name" placeholder="username">
                            <input type="email" value="<?php echo $email ?? ''; ?>" name="email" placeholder="email">
                            <input type="password" name="password" placeholder="password">
                            <input type="number" value="<?php echo $number ?? ''; ?>" name="number" placeholder="phone">
                            <textarea name="address" cols="30" rows="10" placeholder="address"><?php echo $address ?? ''; ?></textarea>
                            <select name="gender" id="gender">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                                <option value="2">Other</option>
                            </select>
                            <button type="submit" name="register" class="btn">register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    // login
    let loginForm = document.getElementById("login");
        let  reg = document.getElementById("reg");
        let  indicate = document.getElementById("indicate");
        
        function register(){
            reg.style.transform = "translateX(0px)";
            loginForm.style.transform = "translateX(0px)";
            indicate.style.transform = "translateX(100px)";
        }
        function login(){
            reg.style.transform = "translateX(300px)";
            loginForm.style.transform = "translateX(300px)";
            indicate.style.transform = "translateX(0px)";
        }
</script>
<?php include './includes/footer.php' ?>