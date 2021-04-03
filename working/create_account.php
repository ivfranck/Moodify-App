<?php include_once "header.php"; ?>

<div class="container">
    <h2>Horizontal form</h2>
    <form class="form-horizontal" action="./includes/signup.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="username">Username:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="firstname">Firstname:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="lastname">Lastname:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="number">Phone Number:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="number" placeholder="Enter Phone Number" name="number" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Repeat Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pwdrepeat" placeholder="Enter password" name="pwdrepeat" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="submit">Submit</button>
            </div>
        </div>
    </form>
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
        }
    }
?>

</body>
</html>