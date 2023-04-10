// decrease food by one
function decreaseFood_one(userID, foodID) {

    $.ajax({
        url: "../back/action/dashboard.action.php?action=decreaseFood_one",
        type: "GET",
        data: {
            userID: userID,
            foodID: foodID
        }
    });
    refreshDashboard();
}

// equip pet
function equipPet(userID, petID) {

    $.ajax({
        url: "../back/action/dashboard.action.php?action=equipPet",
        type: "GET",
        data: {
            userID: userID,
            petID: petID
        }
    });
    refreshDashboard();
}

// equip wallpaper
function equipWallpaper(userID, wallpaperID) {
    $.ajax({
        url: "../back/action/dashboard.action.php?action=equipWallpaper",
        type: "GET",
        data: {
            userID: userID,
            wallpaperID: wallpaperID
        }
    });
    refreshDashboard();
}