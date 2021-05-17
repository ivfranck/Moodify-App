<?php
include_once "header_footer/header.php";
include_once "includes/getData.php";

if (sizeof($run->getPlatlistId())>0){
?>
<div class="container">

    <input type="hidden" id="hidden_token">
    <br/>
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
<?php
}
else{
?>
    <div class="container">

        <h1>Complete today's diary to view today's recommended tracks</h1>

    </div>
<?php
}
?>



<script type="text/javascript" src="js/Spotify API/Spotify_class.js"></script>
<script>
    const songfetch = new SongFetchAPI();
    songfetch.loadApp();
</script>

</body>
</html>
