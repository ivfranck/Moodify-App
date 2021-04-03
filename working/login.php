<?php include_once "header.php"?>
<div class="container">
    <h2>Horizontal form</h2>
    <form class="form-horizontal" action="./includes/login.inc.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Username/Email:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Enter Username/Email" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="submit_login">Submit</button>
            </div>
        </div>
    </form>
</div>
<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "wronglogin"){
        echo "<p>Incorrect login information</p>";
    }
}
?>


</body>
</html>