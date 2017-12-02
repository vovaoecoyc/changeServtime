
var hour, min, sec;
var add1 = 0;
var add2 = 0;
function func(data, d) {
    //alert(add1);
    hour = Number(data['h']);
    min = data['i'];
    sec = data['s'];
    $('#hours').text(hour + ":");
    $('#minutes').text(min + ":");
    $('#seconds').text(sec);
    //setTimeout("stime()", 0);
}

function stime() {
    $(document).ready(function() {
        var myajax = $.ajax({
            url: "serv.php",
            type: "POST",
            dataType: 'json',
            success: func,
        });
    });
    //$('#hours').text(hour + ":");
    setTimeout("stime()", 0);
    
}
$(document).ready(function() {
    $('input[name=left]').bind("click", function() {
        //if(Number(hour) == 24)  
        //add1++;
        $.ajax({
            url: "serv.php",
            type: "POST",
            data: {
                a1: add1
            }
        });
    });
    $('input[name=right]').bind("click", function() {
        //add2--;
        $.ajax({
            url: "serv.php",
            type: "POST",
            data: {
                a2: add2
            }
        });
    });
});

stime();

