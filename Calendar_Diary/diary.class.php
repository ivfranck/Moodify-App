<?php

class Diary extends Query
{

    public function __construct()
    {
        $this->today = date("d");
        $this->num = date("m", time());
    }

    public function display()
    {
        $year = null;
        $month = null;
        /* Getting the Month and Year for Query */
        if (null == $month && isset($_GET['month'])) {

            $monthNum = $_GET['month'];

        } else if (null == $month) {

            $monthNum = date("m", time());
        }
        if (null == $year && isset($_GET['year'])) {

            $yearNum = $_GET['year'];

        } else if (null == $year) {

            $yearNum = date("Y", time());
        }
        require_once '../authentication/includes/functions.php';
        $user = new Auth();
        $id = $user->userId;
        $monthNum = +$monthNum;
        $date = cal_days_in_month(CAL_GREGORIAN, $monthNum, $yearNum);

        echo "<input type='hidden' id='userId' value=" . $id . ">";

        /* Using the Query class to get rows */
        $diaryConent = $this->getQuery($id, $monthNum, $yearNum);
        for ($i = 1; $i <= $date; $i++) {
            $exists = False;

            foreach ($diaryConent as $item) {
                if ($item['contentday'] == $i) {
                    $exists = True;

                    /*Feed Content*/
                    $content .=
                        '<div class="content">
                                <p class="numID">' . $i . '</p>
                                
                                <p class="colourSelector">' . $item['contentday'] . '</p> 
                                               
                                <div class="top">
                                        <div class="insideDiv info">
                                            <h2>' . $item['contentmood'] . '</h2><br> 
                                            <p >' . $item['contenttext'] . '</p>
                                         </div>
                                                                            
                                    <div class="insideDiv moodImg">
                                        <div class="imgBx">
                                             <img src="https://source.unsplash.com/' . $item['contentimageid'] . '">
                                        </div>
                                        <div class="InfiniteScroll">                   
                                            <i class="fab fa-spotify"></i>
                                            <p class="text">' . $item['contentsongname'] . '<p>
                                        </div>
                                    </div>
                                    
                                </div>
                        </div>';
                }
            }


            /* If there's no entry for today's date, then a form is displayed, displays entries.php */
            if ($exists == False) {
                if ($monthNum == $this->num && $i == $this->today) {
                    $content .= '<div class="content today">
            <form id="regForm" action="../includes/dataStorage.php" method="post">
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <p style="margin-bottom: 3px;font-size: 26px">How are you feeling today? </p>
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
                                <div class="card card-13">Fearful</div>
                                <div class="card card-14">Thankful</div>
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
                            <textarea class="entry-textbox" name="journal" placeholder="What happened today?" REQUIRED></textarea>
                        </p>
                    </div>
                
                    <!--============================================================-->
                    <!--============================================================-->
                    <!--============================================================-->
                    <!-- choose_pic.js handles images display using Unsplash API -->                    
                        <div class="tab">
                            <div class="gallery-container"></div></br>
                            <button id="refreshBtn" value="Refresh Images" TYPE="button" class="myButton">
                                Refresh &nbsp; <i class="fas fa-sync-alt"></i>
                            </button>
                            <input type="hidden" id="picSelect" name="imageid" value="invalid" REQUIRED> 
                        </div>

                
                        <!-- Spotify -->
                        <div class="tab">
                            <input type="hidden" id="hidden_token">
                            <br/>
                            <div class="row">
                            <!--Track Detail-->
                                <div class="song_details" id="song-detail"></div>
                            </div>

                        </div>
                        <div class="buttonsNavForm" style="overflow:auto;">
                            <div style="text-align: center;">
                                <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)" style="border-color: lightgray">Previous</button>
                                <button type="button" class="btn btn-primary" name="nextBtn" id="nextBtn" onclick="nextPrev(1)" style="background-color: #1DC8CD; border-color: #1DC8CD">Next</button>
                            </div>
                            <div style="text-align:center;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                    </form></div>';
                } /* Every other day with no entry display "No Entry" message */
                else {
                    $content .=
                        '<div class="content">
                    <p class="numID">' . $i . '</p>
                    <p class="colourSelector">0</p>
                    <div class="frown_Emoji">
                        <i class="fa fa-frown"></i>
                    </div>
                    <h2 class="none_entry">
                        You did not make an entry on this date
                    </h2>
                </div>';
                }
            }

        }
        return $content;
    }
}