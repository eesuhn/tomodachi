$(document).ready(function () {
    $("#active-btn").trigger("click");
    refreshDashboard();
});

var state = "Active";

// refresh dashboard data
function refreshDashboard() {
    setTimeout(function () {
        refreshStatsHeader();
        refreshFood();
        refreshInventory();
        refreshPetImg();
        refreshWallpaper();
        refreshTodo(state);
    }, 100);
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
            console.log(data.imageUrl);
            // set the background image of the div
            $('#wallpaper').css('background-image', 'url(' + data.imageUrl + ')');
        }
    });
}

function refreshTodo(state) {
    $.ajax({
        url: "../back/data/dashboard.data.php?action=refreshTodo",
        type: "POST",
        dataType: "html",
        data: { 
            currentState: state 
        },
        success: function (data) {
            $("#tasklist").html(data);
        },
    });
}