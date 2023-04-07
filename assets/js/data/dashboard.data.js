$(document).ready(function() {
    refreshDashboard();
});

// refresh dashboard data
function refreshDashboard() {
    setTimeout(function() {
        refreshStatsHeader();
        refreshFood();
    }, 100);
}

// refresh stats header 
function refreshStatsHeader() {
    $.ajax({
        url: "../back/data/stats_header.data.php",
        type: "POST",
        dataType: "html",

        success: function(data) {
            $("#statsHeader").html(data);
        }
    })
}

// refresh food data
function refreshFood() {
    $.ajax({
        url: "../back/data/food.data.php",
        type: "POST",
        dataType: "html",

        success: function(data) {
            $("#foodCounter").html(data);
        }
    })
}

// decrease food by one
function decreaseFood_one(userID, foodID) {

    $.ajax({
        url: "../back/data/food.data.php?action=decreaseFood_one",
        type: "GET",
        data: {
            userID: userID,
            foodID: foodID
        }
    });
    refreshDashboard();
}