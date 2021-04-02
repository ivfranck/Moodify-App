<?php include_once "header_footer/header.php";?>

<h1>Landing page</h1>
<?php
if(isset($_SESSION["userFirstName"])){
    echo "<p>This is your profile page " . $_SESSION["userFirstName"] . "</p>";
}
?>
<h1>ONLY REGISTERED ACCOUNTS CAN SEE</h1>
</body>
</html>
