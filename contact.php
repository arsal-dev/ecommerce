<?php

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $msg = $_POST['message'];
        $message = "New Mail From Contact Us From, Name: $name, $msg";
        $headers = 'From admin@zanana.com';


        mail($email, $subject, $message, $headers);
    }

?>
<?php include './includes/header.php'; ?>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <h1>Contact Us</h1>
                    <p> Success isn't always about greatness. It's about consistency. <br> Consistent hard work gives
                        success. greatnss will come up.</p>
                    <a href="" class="btn">Contact Now &#8594</a>
                </div>
                <div class="col-2">
                    <img src="./images/image1.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------cart items details---------------- -->
    <div class="small-container mb-4">
        <h1 class="mt-4">Contact Us.</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="name">Full Name: </label>
            <input type="text" name="name" id="name">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email">
            <label for="subject">Subject: </label>
            <input type="subject" name="subject" id="subject">
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <button type="submit" name="send" class="btn">Send</button>
        </form>
    </div>
<?php include './includes/footer.php' ?>