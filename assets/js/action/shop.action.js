// pet scout 
function petScout(userID) {
    $.ajax({
        url: "../back/action/shop.action.php?action=petScout",
        type: "GET",
        data: {
            userID: userID
        }
    });
    setTimeout(function() {
        $.ajax({
            url: "../back/data/shop.data.php?action=showPetScout",
            type: "POST",
            dataType: "html",

            success: function(data) {
                $("#petScoutData").html(data);
            }
        })
    }, 100);
    
    refreshShop();
}

// food shop 
function foodShop(userID) {
    $.ajax({
        url: "../back/action/shop.action.php?action=foodShop",
        type: "GET",
        data: {
            userID: userID
        }
    });
    setTimeout(function() {
        $.ajax({
            url: "../back/data/shop.data.php?action=showFoodShop",
            type: "POST",
            dataType: "html",

            success: function(data) {
                $("#foodShopData").html(data);
            }
        })
    }, 100);
    
    refreshShop();
}