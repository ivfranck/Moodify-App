<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="../css/diary.css" rel="stylesheet" type="text/css" />
    <link href="../css/choose_pic.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" >

    <link rel="stylesheet" href="../authentication/css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400&display=swap" rel="stylesheet">




    <title>Document</title>
</head>
    <style>
        *{font-family: 'Lexend', sans-serif;}
    </style>

<body>

<nav class = "stroke">
    <div class="logo" onclick="window.location.href='../index.php'" style="cursor: pointer">
        <h4>Moodify</h4>
    </div>

    <!-- Nav links -->
    <ul class="nav-links">

        <li>
            <a href="../index.php">Home</a>
        </li>
        <?php
        if(isset($_SESSION["userName"])){
            echo "<li><a href='../index.php#abt'>About</a></li>";
            echo "<li><a href='../Calendar_Diary/main.php'>Diary</a></li>";
            echo "<li><a href='../music.php'><span class='glyphicon glyphicon-music'></span>Today's Music</a></li>";
            echo "<li><a href='../authentication/profile.php'>Account</a></li>";
            echo "<li><a href='../authentication/includes/logout-inc.php'>Logout</a></li>";
        }
        else{
            echo "<li><a href='../authentication/signup.php'>Create account</a></li>";
            echo "<li><a href='../authentication/login.php'>Login</a></li>";
            echo "<li><a href='../index.php#abt'>About</a></li>";
        }
        ?>

    </ul>


    <!--responsive nav -->
    <div class="burger">
        <div class="line_one"></div>
        <div class="line_two"></div>
        <div class="line_three"></div>
    </div>
</nav>