$(document).ready(function() {
    refreshFood();
});

// refresh food data
function refreshFood() {
    setTimeout(function() {
        $.ajax({
            url: "../back/data/food.data.php",
            type: "POST",
            dataType: "html",

            success: function(data) {
                $("#foodCounter").html(data);
            }
        })
    }, 100);
}

// decrease food by one
function decreaseFood_one(foodInID) {

    $.ajax({
        url: "../back/data/food.data.php?action=decreaseFood_one",
        type: "GET",
        data: {
            foodInID: foodInID
        }
    });
    refreshFood();
}