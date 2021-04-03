<?php
session_start();
?>
<<<<<<< HEAD

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
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../authentication/css/bootstrap.css">
    <link rel="stylesheet" href="../authentication/css/form.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>

<nav>
    <div class="logo">
        <h4>Moodify</h4>
    </div>

    <!-- Nav links -->
    <ul class="nav-links">

        <li>
            <a href="../index.php">Home</a>
        </li>
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
        <li>
            <a href="">About</a>
        </li>

    </ul>


    <!--responsive nav -->
    <div class="burger">
        <div class="line_one"></div>
        <div class="line_two"></div>
        <div class="line_three"></div>
>>>>>>> 58addc315b63608929b2576b810311d04a0211f2
    </div>
</nav>