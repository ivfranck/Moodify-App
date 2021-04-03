<?php include_once "../header_footer/header.php"; ?>
    <section class="form-box">
        <form action="./includes/signup-inc.php" method="post">
        <h1 class="title">Sign Up</h1>
        <div class="container">
            <div class="user-form row">
                <div class="form-field col-lg-6">
                    <input id="username" class="input-text" type="text" name="username" required>
                    <label for="username" class="label-form">Username</label>
                </div>
                <div class="form-field col-lg-6">
                    <input id="firstname" class="input-text" type="text" name="firstname" required>
                    <label for="firstname" class="label-form">Firstname</label>
                </div>
                <div class="form-field col-lg-6">
                    <input id="lastname" class="input-text" type="text" name="lastname" required>
                    <label for="lastname" class="label-form">Lastname</label>
                </div>
                <div class="form-field col-lg-6">
                    <input id="number" class="input-text" type="text" name="number" required>
                    <label for="number" class="label-form">Phone Number</label>
                </div>
                <div class="form-field col-lg-6">
                    <input id="email" class="input-text" type="email" name="email" required>
                    <label for="email" class="label-form">Email</label>
                </div>
                <div class="form-field col-lg-6">
                    <input id="pwd" class="input-text" type="password" name="pwd" required>
                    <label for="pwd" class="label-form">Password</label>
                </div>

                <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "invalidUid"){
                        echo "<p>Choose a proper username!</p>";
                    }
                    elseif ($_GET["error"] == "usernametaken"){
                        echo "<p>Username already taken</p>";
                    }
                    elseif ($_GET["error"] == "none"){
                        echo "<p>You have successfully signed up!</p>";
                        echo "<p>Click <a href='login.php'>here</a> to login</p>";
                    }
                }
                ?>

                <div class="form-field col-lg-12">
                    <input class="submit-btn" type="submit" name="submit">
                </div>
            </div>
        </div>
        </form>

    </section>
</body>
</html>