$(document).ready(function() {
    refreshDashboard();
});

// refresh dashboard data
function refreshDashboard() {
    setTimeout(function() {
        refreshCurrency();
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