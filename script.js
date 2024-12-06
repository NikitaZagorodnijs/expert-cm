let rotation = 0;

$("#showButton1").on("click", function(){
    $("#hiddenDivNo1").slideToggle();
    rotation = rotation - 180;
    let element = $("#showButton1");
    $({degrees: rotation + 180}).animate({degrees:rotation} , {
        duration : 400,
        step : function(now){
            element.css({
                transform:'rotate(' + now + 'deg)'
            })
        }
    })
   
})

$("#showButton2").on("click", function(){
    $("#hiddenDivNo2").slideToggle();
    rotation = rotation - 180;
    let element = $("#showButton2");
    $({degrees: rotation + 180}).animate({degrees:rotation} , {
        duration : 400,
        step : function(now){
            element.css({
                transform:'rotate(' + now + 'deg)'
            })
        }
    })
   
})

$("#showButton3").on("click", function(){
    $("#hiddenDivNo3").slideToggle();
    rotation = rotation - 180;
    let element = $("#showButton3");
    $({degrees: rotation + 180}).animate({degrees:rotation} , {
        duration : 400,
        step : function(now){
            element.css({
                transform:'rotate(' + now + 'deg)'
            })
        }
    })
   
})

$("#showButton4").on("click", function(){
    $("#hiddenDivNo4").slideToggle();
    rotation = rotation - 180;
    let element = $("#showButton4");
    $({degrees: rotation + 180}).animate({degrees:rotation} , {
        duration : 400,
        step : function(now){
            element.css({
                transform:'rotate(' + now + 'deg)'
            })
        }
    })
   
})


document.addEventListener('DOMContentLoaded', function() {
    var currentYear = new Date().getFullYear();
    document.getElementById('dateFooter').textContent = currentYear;
   });


