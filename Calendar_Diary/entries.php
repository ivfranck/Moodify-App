<form id="regForm" action="action.php" method="post">
    <h1 class="idea">Reflection:</h1>
    <!-- One "tab" for each step in the form: -->
    <div class="tab">
        <p>Click on the moods to select</p>
        <p><table class="moods" style="width:70%">
            <tr>
                <td>Cheerful</td>
                <td>Reflective</td>
                <td>Gloomy</td>
                <td>Tense</td>
            </tr>
            <tr>
                <td>Melancholy</td>
                <td>Humorous</td>
                <td>Idyllic</td>
                <td>Lonely</td>
            </tr>
            <tr>
                <td>Whimsical</td>
                <td>Romantic</td>
                <td>Mysterious</td>
                <td>Irritated</td>
            </tr>
            <tr>
                <td>Ominous</td>
                <td>Calm</td>
                <td>Lighthearted</td>
                <td>Tired</td>
            </tr>
            <tr>
                <td>Hopeful</td>
                <td>Angry</td>
                <td>Fearful</td>
                <td>Thankful</td>
            </tr>
        </table><br/>
        <p>-OR-</p>
        <input type="text" id="mood" name="mood" placeholder="Your current mood"></p>
    </div>
    <div class="tab">
        <p>Tell us about your day</p>
        <p>
            <textarea class="entry-textbox" name="journal" placeholder="What happened today?"></textarea>
        </p>
    </div>
    <!-- choose_pic.js handles images display using Unsplash API -->
    <div class="tab"><p>Pick a picture that best describes your mood</p>
        <div onclick="location.href='#';" class="gallery-container"></div></br>
        <button id="refreshBtn" value="Refresh Images" TYPE="button" class="myButton"></button></br>
        <input type="hidden" id="picSelect" value="">

    <script src="js/choose_pic.js"></script>
    
    </div>
    <div style="overflow:auto;">
        <div style="text-align: center;">
            <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)" style="border-color: lightgray">Previous</button>
            <button type="button" class="btn btn-primary" name="nextBtn" id="nextBtn" onclick="nextPrev(1)" style="background-color: #1DC8CD; border-color: #1DC8CD">Next</button>
        </div>
    </div>
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