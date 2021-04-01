<?php
session_start();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="../authentication/css/bootstrap.css">
    <link rel="stylesheet" href="../authentication/css/form.css">



</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">Logo</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php">Home</a></li>

            <?php
            if(isset($_SESSION["userName"])){
                echo "<li><a href='../landing_page.php'>Profile</a></li>";
                echo "<li><a href='../authentication/includes/logout-inc.php'>Logout</a></li>";
            }
            else{
                echo "<li><a href='../authentication/signup.php'>Create account</a></li>";
                echo "<li><a href='../authentication/login.php'>Login</a></li>";
            }
            ?>
        </ul>
    </div>
</nav>