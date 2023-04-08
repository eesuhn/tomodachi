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

function foodShop(userID) {
    $.ajax({
        url: "../back/action/shop.action.php?action=foodShop",
        type: "GET",
        data: {
            userID: userID
        },
        success: function() {
            $.ajax({
                url: "../back/data/shop.data.php?action=showFoodShop",
                type: "POST",
                dataType: "html",
                success: function(data) {
                    $("#foodShopData").html(data);
                }
            });
        }
    });
    
    refreshShop();
}

function purchaseFood(userID, foodID, foodPrice) {
    $.ajax({
        url: "../back/action/shop.action.php?action=purchaseFood",
        type: "GET",
        data: {
            userID: userID,
            foodID: foodID,
            foodPrice: foodPrice
        },
        success: function() {
            $.ajax({
                url: "../back/data/shop.data.php?action=showFoodShop",
                type: "POST",
                dataType: "html",
                success: function(data) {
                    $("#foodShopData").html(data);
                }
            });
        }
    });
    
    refreshShop();
}

