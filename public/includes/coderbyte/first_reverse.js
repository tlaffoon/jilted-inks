function FirstReverse(str) { 
    var reversed = [];

    str = str.split("");

    for (var i = str.length - 1; i >= 0; i--) {
      reversed.push(str[i]);
    };

    return reversed.join(""); 
}

// First Reverse Event
$("#btn-firstReverse").click(function(event) {
    event.preventDefault();

    var firstReverseInput = $("#firstReverseInput").val();
    var firstReverseOutput = FirstReverse(firstReverseInput);

    $("#firstReverseOutput").text(firstReverseOutput);
});