    <!-- ----------------footer---------------- -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download Our App for Android and IOS.</p>
                    <div class="app-logo">
                        <img src="./images/play-store.png">
                        <img src="./images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="./images/logo-white.png" alt="" srcset="">
                    <p>Download Our App for Android and IOS Download Our App for Android and IOS.</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>coupons</li>
                        <li>blog post</li>
                        <li>return policy</li>
                        <li>join affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>facebook</li>
                        <li>twitter</li>
                        <li>insta gram</li>
                        <li>youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copy">Copyrights 2022 © All Rights Reserved</p>
        </div>
    </div>
    <script>
        let MenuItems = document.getElementById("links");
        MenuItems.style.maxHeight = '0px';
        function myFunc() {
            if (MenuItems.style.maxHeight == '0px') {
                MenuItems.style.maxHeight = '200px';
            } else {
                MenuItems.style.maxHeight = '0px';
            }

        }

        // product image viewer
        let productImg = document.getElementById("productImg");
        let smallImg = document.getElementsByClassName("smallImg");

        smallImg[0].addEventListener("click", function () {
            productImg.src = smallImg[0].src;
        })
        smallImg[1].addEventListener("click", function () {
            productImg.src = smallImg[1].src;
        })
        smallImg[2].addEventListener("click", function () {
            productImg.src = smallImg[2].src;
        })
        smallImg[3].addEventListener("click", function () {
            productImg.src = smallImg[3].src;
        })
    </script>
</body>

</html>