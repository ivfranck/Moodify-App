<?php include_once "../header_footer/header.php"; ?>
<br/><br/>
<div class="container">
    <h1>Profile</h1>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Your Details</h5>
                    <?php
                    if(isset($_SESSION["userFirstName"])){
                        echo "<p> Username: ". $_SESSION["userName"]."</p>";
                        echo "<p> Name: ". $_SESSION["userFirstName"] . " " . $_SESSION["userLastName"] ."</p>";
                        echo "<p> Email: ". $_SESSION["userEmail"] ."</p>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- todo: needs to be revisited after entries feature-->

        <div class="col-sm-6" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Delete Account</h5>
                <p class="card-text">Deleting your account will permanently erase your data.</p>
                <form action="includes/profile-inc.php" method="POST">
                    <input type="hidden" name="useruid" value=<?php echo $_SESSION["userName"] ?>>
                    Enter password to confirm
                    <input type="password" class="form-control" id="pwd-del" name="password" placeholder="Password" required><br/>

                    <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "wrongpass"){
                            echo "<p style='color: red'>Password incorrect!</p>";
                        }
                    }
                    ?>
                    <button type="submit" class="btn btn-primary" style="background-color: red; border-color: red" name="del_btn">Delete</button>

                </form>
            </div>
        </div>




        <div class="col-sm-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Details</h5>
                    <form action="includes/profile-inc.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" value=<?php echo $_SESSION["userName"] ?> name="useruid" readonly>
                        </div>
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"  placeholder="Edit firstname" value=<?php echo $_SESSION["userFirstName"]?> required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"  placeholder="Edit lastname" value=<?php echo $_SESSION["userLastName"]?> required>
                        </div>
                        <div class="form-group">
                            <label for="number">Number</label>
                            (+32)<input type="text" class="form-control" id="number" name="number"  placeholder="Edit number" value=<?php echo "0".$_SESSION["userGSM"]?> required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value=<?php echo $_SESSION["userEmail"]?> required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="pwd" name="password" placeholder="Password" required>
                        </div>
                        <br/>
                        <?php
                        if(isset($_GET["error"])){
                            if ($_GET["error"] == "none"){
                                echo "<p>Details changed!</p>";
                            }
                        }
                        ?>
                        <button type="submit" class="btn btn-primary" name="profile_btn" style="background-color: #1DC8CD; border-color: #1DC8CD">Submit</button>
                    </form>
                </div>

            </div>
            <br/>
        </div>


    </div>






</div>

<?php
include "../header_footer/footer.php";
?>
