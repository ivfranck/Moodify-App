<?php
include_once "header_footer/header.php";

if(isset($_SESSION["userId"])){
    echo "<input type='hidden' id='userId' value=".$_SESSION["userId"].">";
}
?>
<div class="container">

        <input type="hidden" id='hidden_token'>
        <br/>
        <!-- Temporary -->
        <div class="col-sm-6 row form-group px-0">
            <button type="submit" id="btn_submit" class="btn btn-success col-sm-12">Run</button>
        </div>



    <div class="row">
        <!--Track Detail-->
        <div class="offset-md-1 col-sm-4" id="song-detail">
        </div>

        <!--Track list-->
        <div class="col-sm-6 px-0">
            <div class="list-group song-list">

            </div>
        </div>
    </div>

</div>


<script type="text/javascript" src="js/Spotify API/Spotify_class.js"></script>
<script type="text/javascript" src="js/Spotify%20API/JQuery.js"></script>
</body>
</html>
