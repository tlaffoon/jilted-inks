function ArrayAddition(numbers) {

    var sum;
    var sums = [];
    var total = 0;

    // Determine largest number
    var largestNumber = Math.max.apply(Math, numbers);

    // Loop through all numbers in array and calculate possible sums.
    for (var i = 0; i < numbers.length; i++) {
        
        numbers.forEach(function(element, index){

            // Add each individual number to other individual numbers
            if (numbers[i] != element) {
                
                // Calculate current sum to be evaluated.                        
                sum = numbers[i] + element;
                
                // Determine if current sum is already present in sums array
                if (sums.indexOf(sum) == -1) {

                    // If it isn't found in the sums array, add it.
                    sums.push(sum);

                };
            };
        });
        
        // Add all numbers in array together for final sum
        total += numbers[i];
    };

    // Add total of all numbers in array to sums array.
    sums.push(total);

    // Determine if potential sums include largest number in array.
    if (sums.indexOf(largestNumber) == -1) {
        return false;
    } else {
        return true;
    };
}

// Array Addition Event
$("#btn-arrayAddition").click(function(event) {
    event.preventDefault();

    var arrayAdditionInput = $('#arrayAdditionInput').val().trim();
    arrayAdditionInput = arrayAdditionInput.split(" ");
    
    arrayAdditionInput.forEach(function(element, index) {
        arrayAdditionInput[index] = parseInt(element, 10);
    });

    var arrayAdditionOutput = ArrayAddition(arrayAdditionInput);
    $("#arrayAdditionOutput").text(arrayAdditionOutput);

});