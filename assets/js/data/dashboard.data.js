$(document).ready(function() {
    refreshDashboard();
});

// refresh dashboard data
function refreshDashboard() {
    setTimeout(function() {
        refreshCurrency();
        refreshPetStats();
    }, 100);
}

// refresh currency data
function refreshCurrency() {
    $.ajax({
        url: "../back/data/currency.data.php",
        type: "POST",
        dataType: "html",

        success: function(data) {
            $("#currencyData").html(data);
        }
    })
}

// refresh pet stats
function refreshPetStats() {
    $.ajax({
        url: "../back/data/pet_stats.data.php",
        type: "POST",
        dataType: "html",

        success: function(data) {
            $("#petStats").html(data);
        }
    })
}