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
                
                $calendar = new Calendar();
 
                echo $calendar->show();
                ?>  

            <?php include 'content.php'; ?>    

        <script src="js/process.js"></script>
        </div>
    </body>
</html>