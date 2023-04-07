$(document).ready(function() {
    refreshShop();
});

// refresh shop data
function refreshShop() {
    setTimeout(function() {
        refreshCurrency();
    }, 100);
}

function refreshCurrency() {
    $.ajax({
        url: "../back/data/shop.data.php?action=refreshCurrency",
        type: "POST",
        dataType: "html",

        success: function(data) {
            $("#currencyData").html(data);
        }
    })
}