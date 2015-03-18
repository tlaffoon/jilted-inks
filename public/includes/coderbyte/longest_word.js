function LongestWord(string) { 

    var words = [];
    var longestWord;
    var lengthLimit = 0;

    // Strip out special characters
    string = string.replace(/[^a-zA-Z0-9]/g,' ');
    string = string.toLowerCase().trim();
    words = string.split(" ");
    
    words.forEach(function(element) {
    
        if (element.length > lengthLimit) {
            lengthLimit = element.length;    
            longestWord = element;
        };

    });

    return longestWord;
}

// Longest Word Event
$("#btn-longestWord").click(function(event) {
    event.preventDefault();

    var longestWordInput = $("#longestWordInput").val();
    var longestWordOutput = LongestWord(longestWordInput);

    $("#longestWordOutput").text(longestWordOutput);
});

