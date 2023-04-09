$(document).ready(function () {
    refreshDashboard();
});

// refresh dashboard data
function refreshDashboard() {
    setTimeout(function () {
        refreshStatsHeader();
        refreshFood();
        refreshInventory();
        refreshPetImg();
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

