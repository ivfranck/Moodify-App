<?php
if(isset($_POST["limit"], $_POST["start"]))
{
 $connect = mysqli_connect("ID328528_practice.db.webhosting.be", "ID328528_practice", "Nothsa1993", "ID328528_practice");
 $query = "SELECT * FROM overview ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  echo '
<div class="entries">
    <h3>'.$row["mood"].'</h3>
    <img align="left" src="images/'.$row["image"].'.jpg">
    <p>'.$row["in_text"].'</p>
    <p class="text-muted" align="right">Song - '.$row["song"].'</p>
</div></br></br>
  ';
 }
}

?>