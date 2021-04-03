<?php include_once "header.php"?>
<h1>Welcome page</h1>
<?php
if(isset($_SESSION["userName"])){
    echo "<p>Hello there " . $_SESSION["userName"] . "</p>";
}
?>
<?php include_once "footer.php"?>
