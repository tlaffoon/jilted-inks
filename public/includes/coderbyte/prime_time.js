function primeTime(num) { 

    var prime = true;

    // Checks for less than zero values.
    if (num < 0) {
        return 'Invalid input.';
    };

    // 0 and 1 aren't prime.
    if (num == 0  || num == 1) {
        return 'false';
    };

    // Checks to see if num is divisible by any number lower than itself.
    for (var i = 2; i < num; i++) {
        if (num % i == 0) {
            prime = false;
        };
    };

    return (prime) ? 'true' : 'false';
}

// Prime Time Event
$("#btn-primeTime").click(function(event) {
    event.preventDefault();

    var primeTimeInput = $("#primeTimeInput").val();
    var primeTimeOutput = primeTime(primeTimeInput);

    $("#primeTimeOutput").text(primeTimeOutput);
});