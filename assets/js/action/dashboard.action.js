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