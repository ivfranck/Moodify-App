<?php include_once "../header_footer/header.php"?>

<section class="form-box">
    <form action="includes/login-inc.php" method="post">
        <h1 class="title">Sign In</h1>
        <div class="container">
            <div class="user-form row">
                <div class="form-field col-lg-6">
                    <input id="username" class="input-text" type="text" name="name" required>
                    <label for="username" class="label-form">Username</label>
                </div>
                <div class="form-field col-lg-6">
                    <input id="pwd" class="input-text" type="password" name="pwd" required>
                    <label for="pwd" class="label-form">Password</label>
                </div>

                <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "wronglogin"){
                        echo "<p>Incorrect Credentials. Try Again</p>";
                    }
                }
                ?>

                <div class="form-field col-lg-12">
                    <input class="submit-btn" type="submit" name="submit_login">
                </div>
            </div>
        </div>
    </form>

</section>
</body>
</html>