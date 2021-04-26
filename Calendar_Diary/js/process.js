
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
        $(this).css("background-color","red");
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

