function FirstFactorial(num) { 

    var result = 1;

    for (var i = num; i > 0; i--) {
        // factors.push(i);
        result = result * i;
    };

    return result;      
}

// First Factorial Event
$("#btn-firstFactorial").click(function(event) {
    event.preventDefault();

    var firstFactorialInput = $("#firstFactorialInput").val();
    var firstFactorialOutput = FirstFactorial(firstFactorialInput);

    $("#firstFactorialOutput").text(firstFactorialOutput);
});