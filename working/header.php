<?php
    session_start();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>

            <?php
                if(isset($_SESSION["userName"])){
                    echo "<li><a href='profile.php'>Profile</a></li>";
                    echo "<li><a href='./includes/logout.inc.php'>Logout</a></li>";
                }
                else{
                    echo "<li><a href='create_account.php'>Create account</a></li>";
                    echo "<li><a href='login.php'>Login</a></li>";
                }
            ?>
        </ul>
    </div>
</nav>