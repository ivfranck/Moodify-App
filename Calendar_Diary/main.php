<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <link rel="stylesheet" href="stylesheet.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    </head>

    <body>
    <?php
    include '../header_footer/header.php';
    ?>
    <div class="bgMainContainer">
        <div class="container">

                <?php
                include 'calendar.php';
                include 'database.class.php';
                include 'diary.class.php'; 
                
                $calendar = new Calendar();
 
                echo $calendar->show();

                $diary = new Diary();

                echo $diary->display();

                
                ?>  



        <script src="js/process.js"></script>
        <script src="js/getPicture.class.js"></script>
        </div>
    </div>
        <script type="text/javascript" src="../js/Spotify API/Spotify_class.js"></script>
        <script type="text/javascript" src="../js/entries.js"></script>

    </body>
</html>