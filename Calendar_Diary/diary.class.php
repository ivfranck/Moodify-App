<?php

class Diary extends Query {

    public function __construct() {
    $this->today = date("d");
    $this->num = date("m",time());
    }

    public function display() {
        $year = null;
        $month = null;
    /* Getting the Month and Year for Query */
    if(null==$month&&isset($_GET['month'])){
 
        $monthNum = $_GET['month'];
     
    }else if(null==$month){

        $monthNum = date("m",time());
    } 
    if(null==$year&&isset($_GET['year'])){

        $yearNum = $_GET['year'];
     
    }else if(null==$year){

        $yearNum = date("Y",time());           
    } 
    require_once '../authentication/includes/functions.php';
    $user = new Auth();
    $id = $user->userId;
    $monthNum = +$monthNum;
    $date = cal_days_in_month(CAL_GREGORIAN, $monthNum, $yearNum);

    echo "<input type='hidden' id='userId' value=" .$id . ">";

        /* Using the Query class to get rows */
    $diaryConent = $this->getQuery($id, $monthNum, $yearNum);
        for ($i = 1; $i <= $date; $i++){
            $exists = False;

            foreach ($diaryConent as $item){
                if ($item['contentday'] == $i) {
                    $exists = True;
                    $content .=
                    '<div class="content">
                    <p class="numID">' . $i . '</p>
                     <p class="colourSelector">' . $item['contentday'] . '</p>                
                    <div class="top">
                        <div class="insideDiv"><img src="https://source.unsplash.com/' . $item['contentimageid'] . '/200x200"></div>
                        <div class="insideDiv">
                            <h2>' . $item['contentimageid'] . '</h2><br>
                            <h2>' . $item['contentmood'] . '</h2><br>         
                        </div>
                    <div class="insideDiv">
                        <p>Song Artist</p><br>
                        <p>' . $item['contentsongname'] . '<p>
                    </div>
                </div>

                <div class="bottom">
                    <div class="insideDiv"><p>' . $item['contenttext'] . '</p></div>
                </div>
            </div>';
                }
            }
                 /* If there's no entry for today's date, then a form is displayed, displays entries.php */
        if ($exists == False){ 
            if ($monthNum == $this->num && $i == $this->today){
            $content .= '<div class="content today">
            <form id="regForm" action="../includes/dataStorage.php" method="post">
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
                            <div class="gallery-container"></div></br>
                            <button id="refreshBtn" value="Refresh Images" TYPE="button" class="myButton"></button></br>
                            <input type="hidden" id="picSelect" name="imageid" value="invalid"> 
                        </div>

                        <!-- Spotify -->
                        <div class="tab"><p>Pick a song that best describes your mood</p>
                            <input type="hidden" id="hidden_token">
                            <br/>
                            <div class="row">
                            <!--Track Detail-->
                            <div class="offset-md-1 col-sm-4" id="song-detail">
                            </div>
                        </div>

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
                            <span class="step"></span>
                        </div>
                    </form></div>';                            
                 } 
    /* Every other day with no entry display "No Entry" message */
            else {
                $content .=
                '<div class="content">
                    <p class="numID">' . $i . '</p>
                    <p class="colourSelector">0</p>
                    <h2>There Are No Entries For This Date</h2>
                </div>';    
        }
    }

    }
    return $content;
    }
}