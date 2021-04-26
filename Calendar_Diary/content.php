
                <?php

    /* Getting the year, month of page to query database */

                include 'backend.php';
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
                $monthNum = +$monthNum;
                
    /* Variables + GetQuery to select from Datase!!!!NEEDS TO BE UPDATED WITH CORRECT QUERY!!!! */
                $diaryContent = getQuery("SELECT * FROM overview WHERE mood = '$monthNum'");
                $date = cal_days_in_month(CAL_GREGORIAN, $monthNum, $yearNum);
                $today = date("d");
                $num = date("m",time());

    /* Using a For Loop to cycle through days in the month, $exists is False by default- refers to existing entry*/
                for($i = 1; $i <= $date; $i++){
                    $exists = FALSE;
    /* Cycling through diary entries of the month, $exists = True if entry is found that matches $i, creating the display */
                    foreach($diaryContent as $item) {
                        if ($item['day'] == $i){
                            $exists = True ?>
                            <div class="content">
                                    <p class="numID"><?php echo $i ?></p>
                                     <p class="colourSelector"><?php echo $item['day'] ?></p>                
                                    <div class="top">
                                   <?php $imageId = $item['image'] ?>
                                        <div class="insideDiv"><img src="https://source.unsplash.com/<?php echo $imageId ?>/200x200"></div>
                                        <div class="insideDiv">
                                            <h2><?php echo $item['image'] ?></h2><br>
                                            <h2><?php echo $item['mood'] ?></h2><br>         
                                        </div>
                                    <div class="insideDiv">
                                        <p>Song Artist</p><br>
                                        <p><?php echo $item['song'] ?><p>
                                    </div>
                                </div>

                                <div class="bottom">
                                    <div class="insideDiv"><p><?php echo $item['in_text'] ?></p></div>
                                </div>
                            </div>
                    
                        <?php } ?>                                                     
                    <?php }
        /* If there's no entry for today's date, then a form is displayed, displays entries.php */
                    if ($exists == False){ 
                        if ($monthNum == $num && $i == $today){ ?>
                            <div class="content today"><?php include 'entries.php'?></div>                            
                      <?php  } 
        /* Every other day with no entry display "No Entry" message */
                        else {?>
                        <div class="content">
                            <p class="numID"><?php echo $i ?></p>
                            <p class="colourSelector">0</p>
                            <h2>There Are No Entries For This Date</h2>
                        </div>                  
              <?php  }
                    }
                }                
            ?>