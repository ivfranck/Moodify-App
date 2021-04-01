<?php include_once "header_footer/header.php";?>
<h1>Welcome page</h1>
<?php
if(isset($_SESSION["userFirstName"])){
    echo "<p>Hello there " . $_SESSION["userFirstName"] . "</p>";
}
?>
