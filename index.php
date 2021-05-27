<?php include_once "header_footer/header.php";?>
<style>
    #hero {
        width: 100%;
        height: 95vh;
    <?php
    if(!isset($_SESSION["userName"])){
    echo "background: url('../images/cover0.jpg') center top no-repeat;";
    }
    else{
        echo "background: url('../images/welcome.jpg') center top no-repeat;";
    }
    ?>
    background-size: cover;
    position: relative;
}
</style>
<section id="hero">

<div class="hero-text">
    <?php
    if(!isset($_SESSION["userName"])){
        echo "<h3>Welcome to Moodify</h3>
    <p>
        Mood has to be controlled, Otherwise, it's your master.
    </p>";
        echo "<a href='authentication/signup.php' class='btn-create-account'>Create Account</a>";
    }
    else{
        echo "<h3>Welcome " .$_SESSION["userFirstName"]."</h3>
    <p>
        Mood has to be controlled, Otherwise, it's your master.
    </p>";
    }
    ?>
    </div>


</section>
<!-- End Hero Section -->
<br>
<br><br>

<!--Features-->
<div class="feature_header" style="text-align: center;font-family: 'Montserrat', sans-serif;">
    <p>Features</p>
</div>
<br><br><br>
<div class="wrappper1">
    <div class="column">
        <div class="imgBx">
            <img src="images/mood-words.jpg" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1>Words Describing Your Mood</h1>
            </div>
        </div>
    </div>

    <div class="clearFloat"></div>
    <div class="column">
        <div class="imgBx">
            <img src="images/diary.jpg" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1> How Are You Feeling Today? </h1>
            </div>
        </div>
    </div>

    <div class="clearFloat"></div>
    <div class="column">
        <div class="imgBx">
            <img src="images/moods-pic.jpg" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1>Images Describing Your Mood</h1>
            </div>
        </div>
    </div>

    <div class="clearFloat"></div>
    <div class="column">
        <div class="imgBx">
            <img src="images/music_pic.jpg" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1>Where words fail, music speaks</h1>
            </div>
        </div>
    </div>

</div>


<div style="clear:both;"></div>
<!--About Us-->
<section>
    <div class="About_us" id="abt">
        <div class="au_title">
            <p>About Us</p>
        </div>
        <div class="au_details">
            <div class="au_image">
                <img src="images/aboutUs_pic.jpg" alt="">
            </div>
            <div class="au_det_details">
                <p>
                    Good mental wellbeing doesn't mean you're always happy or unaffected by your experiences.
                    But poor mental wellbeing can make it more difficult to cope with daily life.
                    We in Moodify are team of young entrepreneurs trying to help the young generation to take care about they're wellbeing
                    and keep track of they're mental health and mood.
                </p>
            </div>
        </div>
    </div>
</section>



<!--Meet the team-->
<div class="meetTheTeam">
    <p>Meet the team</p>
</div>

<div class="meet_the_team">

    <div class="column">
        <div class="imgBx">
            <img src="images/Team/moses.JPG" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1>Moses Njau</h1>
                <ul>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-github"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="clearFloat"></div>
    <div class="column">
        <div class="imgBx">
            <img src="images/Team/anass.JPG" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1>
                    Anass Saissi Hassani </h1>
                <ul>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-github"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="clearFloat"></div>
    <div class="column">
        <div class="imgBx">
            <img src="images/Team/ivan.JPG" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1>Franck Ivan</h1>
                <ul>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-github"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="clearFloat"></div>
    <div class="column">
        <div class="imgBx">
            <img src="images/Team/ashton.JPG" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1>Ashton Pettit</h1>
                <ul>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-github"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

</div>

<div style="clear:both;"></div>
<div style="height: 50px"></div>
<!--Footer-->

    <?php
        include "header_footer/footer.php";
    ?>

</body>

</html>
