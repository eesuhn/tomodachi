$(document).ready(function () {
    $("#active-btn").trigger("click");
    showDashboard();
});

// show dashboard data
function showDashboard() {
    refreshStatsHeader();
    refreshFood();
    refreshInventory();
    refreshPetImg();
    refreshWallpaper();
    refreshTask("Active");
    refreshHabit();
    showTutorial();
}

function showTutorial() {
    $.ajax({
        url: "../back/data/dashboard.data.php?action=getTutFlag",
        type: "POST",
        dataType: "json",
        success: function (data) {
            if (data.tutorialModal == "0") {
                $('#tutorial1').modal('show');
            }
        },
        error: function () {
            console.log("Error: Unable to get tutorial modal flag");
        }
    });
}

// refresh stats header 
function refreshStatsHeader() {
    $.ajax({
        url: "../back/data/dashboard.data.php?action=refreshStatsHeader",
        type: "POST",
        dataType: "html",

        success: function (data) {
            $("#statsHeader").html(data);
        }
    })
}

// refresh food data
function refreshFood() {
    $.ajax({
        url: "../back/data/dashboard.data.php?action=refreshFood",
        type: "POST",
        dataType: "html",

        success: function (data) {
            $("#foodCounter").html(data);
        }
    })
}

function refreshInventory() {
    $.ajax({
        url: "../back/data/dashboard.data.php?action=refreshInventory",
        type: "POST",
        dataType: "html",

        success: function (data) {
            $("#inventoryData").html(data);
        }
    });
}

function refreshPetImg() {
    $.ajax({
        url: "../back/data/dashboard.data.php?action=refreshPetImg",
        type: "POST",
        dataType: "html",

        success: function (data) {
            $("#petImg").html(data);
        }
    });
}

function refreshWallpaper() {
    $.ajax({
        url: '../back/data/dashboard.data.php?action=refreshWallpaper',
        dataType: 'json',
        success: function(data) {

            // set the background image of the div
            $('#wallpaper').css('background-image', 'url(' + data.imageUrl + ')');
        }
    });
}

function refreshTask(status) {
    $.ajax({
        url: "../back/data/dashboard.data.php?action=refreshTask",
        type: "POST",
        dataType: "html",
        data: { 
            status: status 
        },

        success: function (data) {
            $("#taskTracker").html(data);
        },
    });
}

function refreshHabit() {
    $.ajax({
        url: "../back/data/dashboard.data.php?action=refreshHabit",
        type: "POST",
        dataType: "html",

        success: function (data) {
            $("#habitTracker").html(data);
        }
    });
}