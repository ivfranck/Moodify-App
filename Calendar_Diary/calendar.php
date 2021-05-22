<?php 

    class Calendar {

        /**
     * Constructor
     */
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }

    /********************* PROPERTY ********************/      
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;
     
    private $naviHref= null;

    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
    public function show() {
        $year  = null;
         
        $month = null;
         
        if(null==$year&&isset($_GET['year'])){
 
            $year = $_GET['year'];
         
        }else if(null==$year){
 
            $year = date("Y",time());           
        }          
         
        if(null==$month&&isset($_GET['month'])){
 
            $month = $_GET['month'];
         
        }else if(null==$month){
 
            $month = date("m",time());
            
         
        }                  
         
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year); 

        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>';
                        
                        $daysInMonth = $this->_daysInMonth($month,$year);
                                $content.='<div class="dates owl-carousel">';
                                $today = date("d");
                                $num = date("m",time());
                                    //Create days in a month

                                    for($j=1;$j<=$daysInMonth;$j++){
                                        if ($j == $today && $month == $num){
                                            $content.='<div class="days today">'.$j.'</div>';
                                        }
                                        else {
                                            $content.='<div class="days">'.$j.'</div>';
                                        }
                                        
                                    }

                                $content.='</div>';
                 
        $content.='</div>';
        return $content;   
    }

/********************* PRIVATE **********************/ 

     /**
    * create navigation
    */
    private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return
            '<div class="header">' .

            '<span class="title">'
            . date('M Y', strtotime($this->currentYear . '-' . $this->currentMonth . '-1')) .
            '</span>' .


            '<div id="button_des">
                    <a class="prev" href="' . $this->naviHref . '?month=' . sprintf('%02d', $preMonth) . '&year=' . $preYear . '">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                    
                    <a class="next" href="' . $this->naviHref . '?month=' . sprintf("%02d", $nextMonth) . '&year=' . $nextYear . '">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                </div>' .

            '</div>';
    }

    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){

        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }

}
?>