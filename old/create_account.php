<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
</nav>



<?php include "action.php";?>
<div class="container">
    <h2>Horizontal form</h2>
    <form class="form-horizontal" action="action.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="firstname">Firstname:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="lastname">Lastname:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="number">Phone Number:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="number" placeholder="Enter Phone Number" name="number">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
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
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="submit">Submit</button>
            </div>
        </div>
    </form>
</div>


</body>
</html>