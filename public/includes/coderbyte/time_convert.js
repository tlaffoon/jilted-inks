function TimeConvert(num) { 

    var totalMinutes = num;
    var hours = Math.floor(num / 60);
    var minutes = num % 60;

    return hours + ":" + minutes; 
         
}

// Time Convert Event
$("#btn-timeConvert").click(function(event) {
    event.preventDefault();

    var timeConvertInput = $("#timeConvertInput").val();
    var timeConvertOutput = TimeConvert(timeConvertInput);

    $("#timeConvertOutput").text(timeConvertOutput);
});