function CheckNums(num1,num2) { 

    if (num1 == num2) {
        return "-1";
    } else if (num2 > num1) {
        return true;
    } else {
        return false;
    };
}

// Check Nums Event
$("#btn-checknums").click(function(event) {
    event.preventDefault();

    var checknumsInput1 = $("#checknumsInput1").val();
    var checknumsInput2 = $("#checknumsInput2").val();
    var checknumsOutput = CheckNums(checknumsInput1, checknumsInput2);

    $("#checknumsOutput").text(checknumsOutput);

});