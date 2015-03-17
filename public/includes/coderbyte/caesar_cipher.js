var alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

function isASpecialCharacter(character) {

    if (character.match(/[^a-zA-Z0-9]/g,' ')) {
        return true;
    } else {
        return false;
    }
};

function CaesarCipher(string, shiftNum) { 
    
    var num = shiftNum;

    // Initialize empty cipher array.
    var cipher = [];

    // break string into words
    words = string.split(' ');

    // Loop through words.
    words.forEach(function(word) {
        var newWord = [];
        
        // break word into individual characters.
        characters = word.split('');

        characters.forEach(function(character, index){    
            var location;
            var originalChar = character;

            if (isASpecialCharacter(character)) {
                newWord.push(character);
            } else {
                
                // find character's location in alphabet array
                location = alphabet.indexOf(character.toLowerCase());
                // console.log(character + " located at alphabet index: " + location);
                
                if (originalChar === originalChar.toUpperCase()) {
                    var upper = true;
                } else {
                    var upper = false;
                };

                if ((location + num) > 25) {
                    // console.log((location + num) + " is greater than 25.");

                    // shift character
                    character = alphabet[(location + num) - 26];

                } else {
                    // shift character
                    character = alphabet[(location + num)];
                };

                // console.log("Shifting " + character + " to " + alphabet[(num)] + ".");
                // console.log(originalChar + " became " + character);

                if (upper) {
                    newWord.push(character.toUpperCase());
                } else {
                   newWord.push(character); 
                };
            };

        });
        
        newWord = newWord.join('');
        cipher.push(newWord + " ");

    });

    return cipher.join('');
}

// Caesar Cipher Event
$("#btn-caesarCipher").click(function(event) {
    event.preventDefault();

    var caesarString = $("#caesarCipherText").val();
    var newCaesarString = CaesarCipher(caesarString, 2);

    $("#caesarCipherOutput").text(newCaesarString);

});