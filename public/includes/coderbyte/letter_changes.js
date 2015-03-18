function LetterChanges(string) { 
    var alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    var vowels = ['a', 'e', 'i', 'o', 'u'];

    // var location;
    var modifiedWords = [];
    var modifiedString;

    // Strip out special characters
    string = string.replace(/[^a-zA-Z0-9]/g,' ');
    string = string.toLowerCase().trim();

    // break string into words
    words = string.split(" ");

    // shift letters for each word
    words.forEach(function(word, index){

        // break word into letters
        var letterArray = word.split("");

        // This is so ugly, forgive me.  I will refactor into separate functions, I swear it!
        letterArray.forEach(function(letter, index) {

            // find current letter position in alphabet array
            // console.log(letter +  " is at position " + alphabet.indexOf(letter) + " in the alphabet.");
        
            // assign new letter by incrementing position plus one
            if (alphabet.indexOf(letter) <= 24) {
                letterArray[index] = alphabet[alphabet.indexOf(letter) + 1];
            } else {
                // Account for Z the only way I know how.
                letterArray[index] = alphabet[0];
            };

            // capitalize any vowels
            if (vowels.indexOf(letterArray[index]) >= 0) {
                letterArray[index] = letterArray[index].toUpperCase();
            };

        }); // end letter callback function loop.

        // overwrite existing word in array with index to use new word
        words[index] = letterArray.join("");

    }); // end word callback function loop.

    // reassemble modified words into string
    modifiedString = words.join(" ") + ".";

    // return modified string
    return modifiedString; 
}

// Letter Changes Event
$("#btn-letterChanges").click(function(event) {
    event.preventDefault();

    var letterChangesInput = $("#letterChangesInput").val();
    var letterChangesOutput = LetterChanges(letterChangesInput);

    $("#letterChangesOutput").text(letterChangesOutput);
});