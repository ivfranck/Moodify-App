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
    <div class="feature_header" style="text-align: center;font-family: 'Montserrat', sans-serif;">
        <p>Features</p>
    </div>
    <br><br><br>
    <div class="wrappper1">
        <table class="tableOne" style="width: 80%;margin-left: 10%;border-collapse: collapse;">
            <tr>
                <th>
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
                </th>
                <th>
                    <div class="column">
                        <div class="imgBx">
                            <img src="/images/bgsmall.jpg" alt="">
                        </div>
                        <div class="details">
                            <div class="content">
                                <h1>Feature</h1>
                            </div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="column">
                        <div class="imgBx">
                            <img src="/images/bgsmall.jpg" alt="">
                        </div>
                        <div class="details">
                            <div class="content">
                                <h1>Feature</h1>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th>
                    <div class="column">
                        <div class="imgBx">
                            <img src="/images/bgsmall.jpg" alt="">
                        </div>
                        <div class="details">
                            <div class="content">
                                <h1>Feature</h1>
                            </div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="column">
                        <div class="imgBx">
                            <img src="/images/bgsmall.jpg" alt="">
                        </div>
                        <div class="details">
                            <div class="content">
                                <h1>Feature</h1>
                            </div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="column">
                        <div class="imgBx">
                            <img src="/images/bgsmall.jpg" alt="">
                        </div>
                        <div class="details">
                            <div class="content">
                                <h1>Feature</h1>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
        </table>
    </div>
    <br><br><br>
    <div class="About_us">
        <p class="para1">About us <br><br><br></p>
    </div>
    <div class="para2">
        <table class="tableOne" style="width: 95%;margin-left: 2.5%;">
            <tr>
                <th>
                    <div class="img_Abt">
                        <img src="/images/bgsmall.jpg" alt="">
                    </div>
                </th>
                <th>
                    <p class="section-description" style="font-size: 14;font-family: 'Montserrat', sans-serif; ;">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque<br>
                        sunt in culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </th>
            </tr>
        </table>
        <br><br><br>
    </div>

    <br><br><br><br><br>
    <div class="meetTheTeam">
        <p>Meet the team</p>
    </div>
    <br><br><br>
    <div class="meet_the_team">
        <table class="tableTeam" style="width: 90%;margin-left: 5%;">
            <tr>
                <th>
                    <div class="column">
                        <div class="imgBx">
                            <img src="/images/bgsmall.jpg" alt="">
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
                </th>
                <th>
                    <div class="column">
                        <div class="imgBx">
                            <img src="/images/bgsmall.jpg" alt="">
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
                </th>
                <th>
                    <div class="column">
                        <div class="imgBx">
                            <img src="/images/bgsmall.jpg" alt="">
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
                </th>
                <th>
                    <div class="column">
                        <div class="imgBx">
                            <img src="/images/bgsmall.jpg" alt="">
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
                </th>
            </tr>
        </table>
    </div>
    <br><br>

    <?php
        include "./include/footer.php";
    ?>
    <script src="/js/index.js"></script>
</body>

</html>
