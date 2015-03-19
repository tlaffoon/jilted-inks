function SimpleAdding(num) { 

    var result = 0;
    
    for (var i = 1; i <= num; i++) {
        result = result + i;
    };

    return result; 
}

// Simple Adding Event
$("#btn-simpleAdding").click(function(event) {
    event.preventDefault();

    var simpleAddingInput = $("#simpleAddingInput").val();
    var simpleAddingOutput = SimpleAdding(simpleAddingInput);

    $("#simpleAddingOutput").text(simpleAddingOutput);
});