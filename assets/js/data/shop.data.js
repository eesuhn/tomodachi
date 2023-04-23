$(document).ready(function() {
    showShop();
});

// show shop data
function showShop() {
    refreshFoodShop();
    refreshWallpaperShop();
    refreshCurrency();
    refreshGachaButton();
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

function refreshGachaButton() {
    $.ajax({
        url: "../back/data/shop.data.php?action=refreshGachaButton",
        type: "POST",
        dataType: "html",

        success: function(data) {
            $("#gachaButton").html(data);
        }
    });
}

function showPetScout() {
    $.ajax({
        url: "../back/data/shop.data.php?action=showPetScout",
        type: "POST",
        dataType: "html",

        success: function(data) {
            $("#petScoutData").html(data);
        }
    });
}

function refreshFoodShop() {
    $.ajax({
        url: "../back/data/shop.data.php?action=refreshFoodShop",
        type: "POST",
        dataType: "html",
        success: function(data) {
            $("#foodShopData").html(data);
        }
    });
}

function refreshWallpaperShop(){
    $.ajax({
        url: "../back/data/shop.data.php?action=refreshWallpaperShop",
        type: "POST",
        dataType: "html",
        success: function(data) {
            $("#wallpaperShopData").html(data);
        }
    });
}