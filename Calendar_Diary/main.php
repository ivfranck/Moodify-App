<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <link rel="stylesheet" href="stylesheet.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    </head>

    <body>

        <div class="container">

                <?php include 'calendar.php';
                include 'database.class.php';
                include 'diary.class.php'; 
                
                $calendar = new Calendar();
 
                echo $calendar->show();

                $diary = new Diary();

                echo $diary->display();

                
                ?>  



        <script src="js/process.js"></script>
        <script src="js/choose_pic.js"></script>
        <script type="text/javascript" src="Spotify API/Spotify_class.js"></script>
        <script type="text/javascript" src="js/entries.js"></script>
        </div>
    </body>
</html>