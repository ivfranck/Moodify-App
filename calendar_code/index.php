<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="stylesheet.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    </head>

    <body>

        <div class="container">

                <?php include 'calendar.php'; 
                
                $calendar = new Calendar();
 
                echo $calendar->show();
                ?>  

          
        </div>
    </body>
</html>