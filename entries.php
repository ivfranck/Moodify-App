<?php include_once "header_footer/header.php";?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    h1, p, td {
        text-align: center;
    }
    .moods {
        margin: auto;
    }



    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #1DC8CD;
    }
</style>
<body>







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
        <input type="text" id="mood" placeholder="Your current mood"></p>
    </div>
    <div class="tab">
        <p>Tell us about your day</p>
        <p>
            <textarea class="entry-textbox" placeholder="What happened today?"></textarea>
        </p>
    </div>
    <div class="tab"><p>Pick a picture that best describes your mood</p>
        <p><input value="this field will be hidden" name="pic"></p>
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
