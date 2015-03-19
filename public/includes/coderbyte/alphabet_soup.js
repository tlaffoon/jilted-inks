function isASpecialCharacter(character) {

    if (character.match(/[^a-zA-Z0-9]/g,' ')) {
        return true;
    } else {
        return false;
    }
}

function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function AlphabetSoup(str) { 

    var sortedWords = [];

    // Lowercase original string
    str = str.toLowerCase();

    // Create array of words
    var words = str.split(" ");

    // Loop through all words
    words.forEach(function(word, index){

        // Create letters array
        var letters = word.split('');

        // Loop through all letters
        letters.forEach(function(letter, index){

            // Strip out special characters.
            if (isASpecialCharacter(letter)) {
                letters.splice(index, 1);
            };

            // Strip out numbers.
            if (isNumber(letter)) {
                letters.splice(index, 1);
            };

        });

        // Sort letters alphetically and overwrite previous array.
        letters = letters.sort();

        // Create string of sorted letters
        letters = letters.join('');

        // Add sorted letters to array
        sortedWords.push(letters);
    });

    // Join sorted words with one whitespace
    sortedWords = sortedWords.join(' ');

    return sortedWords;
}

// Alphabet Soup Event
$("#btn-alphabetSoup").click(function(event) {
    event.preventDefault();

    var alphabetSoupInput = $("#alphabetSoupInput").val();
    var alphabetSoupOutput = AlphabetSoup(alphabetSoupInput);

    $("#alphabetSoupOutput").text(alphabetSoupOutput);
});