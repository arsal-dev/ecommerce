<?php include './includes/header.php' ?>
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
                        <form id="login">
                            <input type="text" placeholder="username">
                            <input type="password" placeholder="password">
                            <button type="submit" class="btn">login</button>
                            <a href="">forgot password</a>
                        </form>
                        <form id="reg">
                            <input type="text" placeholder="username">
                            <input type="email" placeholder="email">
                            <input type="password" placeholder="password">
                            <button type="submit" class="btn">register</button>
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