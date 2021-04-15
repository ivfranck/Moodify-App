<?php include_once "header_footer/header.php";?>

<section id="hero">

    <div class="hero-text">
        <h3>Welcome to Moodify</h3>
        <p>
            Mood has to be controlled, Otherwise, it's your master.
        </p>
        <?php
        if(!isset($_SESSION["userName"])){
            echo "<a href='authentication/signup.php' class='btn-create-account'>Create Account</a>";
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
            <img src="images/bgsmall.jpg" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1>Feature</h1>
            </div>
        </div>
    </div>

    <div class="clearFloat"></div>
    <div class="column">
        <div class="imgBx">
            <img src="images/bgsmall.jpg" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1>Feature</h1>
            </div>
        </div>
    </div>

    <div class="clearFloat"></div>
    <div class="column">
        <div class="imgBx">
            <img src="images/bgsmall.jpg" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1>Feature</h1>
            </div>
        </div>
    </div>

    <div class="clearFloat"></div>
    <div class="column">
        <div class="imgBx">
            <img src="images/bgsmall.jpg" alt="">
        </div>
        <div class="details">
            <div class="content">
                <h1>Feature</h1>
            </div>
        </div>
    </div>

</div>


<div style="clear:both;"></div>
<!--About Us-->
<div class="About_us">
    <div class="au_title">
        <p>About Us</p>
    </div>
    <div class="au_details">
        <div class="au_image">
            <img src="images/bgsmall.jpg" alt="">
        </div>
        <div class="au_det_details">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.
            </p>
        </div>
    </div>
</div>



<!--Meet the team-->
<div class="meetTheTeam">
    <p>Meet the team</p>
</div>

<div class="meet_the_team">

    <div class="column">
        <div class="imgBx">
            <img src="images/bgsmall.jpg" alt="">
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
            <img src="images/bgsmall.jpg" alt="">
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
            <img src="images/bgsmall.jpg" alt="">
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
            <img src="images/bgsmall.jpg" alt="">
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
