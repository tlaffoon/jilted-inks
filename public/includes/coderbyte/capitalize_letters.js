function capitalize(word) {
    return word.replace(/^./, capitalize.call.bind("".toUpperCase));
}

function LetterCapitalize(string) { 

    // break string into words
    words = string.split(" ");

    words.forEach(function(word, index) {
        words[index] = capitalize(word);
    });

    return words.join(" ");
         
}

// Capitalize Letters Event
$("#btn-capitalizeLetters").click(function(event) {
    event.preventDefault();

    var capitalizeLettersInput = $("#capitalizeLettersInput").val();
    var capitalizeLettersOutput = LetterCapitalize(capitalizeLettersInput);

    $("#capitalizeLettersOutput").text(capitalizeLettersOutput);

});