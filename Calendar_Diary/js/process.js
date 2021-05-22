
/* Selecting the variables for the content divs and the days */
var content = document.querySelectorAll(".content");
var today = document.querySelector(".days.today");


/* Setting today's date as the correct index and showing the diary entry for today */
num = $(today).text()
num = parseInt(num)
num = num - 1
$(content[num]).addClass("active")

$('.colourSelector').each(function(i){
    inner = $(this).text()
    inner = parseInt(inner)
    $('.days').each(function(j){
        if(i == j){
            if(inner > 0){
                $(this).css("background","linear-gradient(to top, white 65%, red)");
                $(this).css("box-shadow","0px 4px 10px rgba(0,0,0,0.2)");
                $(this).css("opacity","1");
            }
            else {
                $(this).css("background-color","grey");
            }
        }

    });
});


/* Showing the Correct Div based on day selected in the Calendar */
$('.days').click(function(){
    $('.content.active').removeClass("active")
    day = $(this).text()
    day = parseInt(day)
    day = day - 1
    $(content[day]).addClass("active")   
  });

/*Date lightslider*/
// JavaScript Document
$k = jQuery.noConflict();
$k(document).ready(function (){
    $k(".dates").owlCarousel({
        margin:0,
        responsive:{
            0:{
                days:1,
            },
            768:{
                days:2,
            },
            1000:{
                days:3,
            }
        },
    })
})

var wrd = document.querySelectorAll(".gallery-item")
wrd.forEach(item => {
    item.addEventListener("mouseover", function () {
        item.style.cursor = "pointer";
        item.style.boxShadow = "5px 5px 10px #E8ECEB,-5px -5px 10px #262626";
    });
    item.addEventListener("mouseout", function () {
        item.style.boxShadow = "";
    });
});
