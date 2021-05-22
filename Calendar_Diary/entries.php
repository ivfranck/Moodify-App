<form id="regForm" action="action.php" method="post">
    <!-- One "tab" for each step in the form: -->
    <div class="tab">
        <p style="margin-bottom: 10px;font-size: 28px">How are you feeling today? </p>
        <div class="moods" style="width:70%">
            <div class="mood_Mo">
                <div class="card card-1" style="">Cheerful</div>
                <div class="card card-2">Reflective</div>
                <div class="card card-3">Gloomy</div>
            </div>
            <div class="mood_Mo">
                <div class="card card-4">Melancholy</div>
                <div class="card card-5">Humorous</div>
                <div class="card card-6">Idyllic</div>
            </div>
            <div class="mood_Mo">
                <div class="card card-7">Whimsical</div>
                <div class="card card-8">Romantic</div>
                <div class="card card-9">Mysterious</div>
            </div>
            <div class="mood_Mo">
                <div class="card card-10">Ominous</div>
                <div class="card card-11">Calm</div>
                <div class="card card-12">Lighthearted</div>
            </div>
            <div class="mood_Mo">
                <div class="card card-13">Ominous</div>
                <div class="card card-14">Calm</div>
                <div class="card card-15">Angry</div>
            </div>
        </div>
        <!--============================================================-->
        <!--============================================================-->
        <!--============================================================-->
        <!--============================================================-->
        <!--pop up page-->

        <div class="input-field">
            <input type="text" id="mood" name="mood" placeholder="Your current mood">
        </div>
        <!--============================================================-->

    </div>

    <!--============================================================-->
    <!--============================================================-->
    <!--============================================================-->
    <div class="tab">
        <p>
            <textarea class="entry-textbox" name="journal" placeholder="What happened today?"></textarea>
        </p>
    </div>

    <!--============================================================-->
    <!--============================================================-->
    <!--============================================================-->
    <!-- choose_pic.js handles images display using Unsplash API -->
    <div class="tab"><p>Pick a picture that best describes your mood</p>
        <div onclick="location.href='#';" class="gallery-container"></div>
        <button id="refreshBtn" value="Refresh Images" type="button" class="myButton">
            Refresh &nbsp; <i class="fas fa-sync-alt"></i>
        </button>
        <input type="hidden" id="picSelect" value="">

        <!--============================================================-->
        <!--============================================================-->
        <!--============================================================-->
        <script src="js/choose_pic.js"></script>
    </div>

    <!--============================================================-->
    <!--============================================================-->
    <!--============================================================-->
    <!--============================================================-->
    <div class="prNxt_But" style="overflow:auto;">
        <div style="text-align: center;">
            <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)" style="border-color: lightgray">Previous</button>
            <button type="button" class="btn btn-primary" name="nextBtn" id="nextBtn" onclick="nextPrev(1)" style="background-color: #1DC8CD; border-color: #1DC8CD">Next</button>
        </div>
    </div>

    <!--============================================================-->
    <!--============================================================-->
    <!--============================================================-->
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>


<script type="text/javascript" src="js/entries.js"></script>

</body>
</html>