function updateUsers(userID) {
    let userName = document.getElementById('editUserName' + userID).value;
    let userEmail = document.getElementById('editUserEmail' + userID).value;
    let userPwd = document.getElementById('editUserPwd' + userID).value;
    let currencyNum = document.getElementById('editUserCurrency' + userID).value;

    $.ajax({
        url: "../back/action/admin_users.action.php?action=updateUsers",
        type: "GET",
        data: {
            userID: userID,
            userName: userName,
            userEmail: userEmail,
            userPwd: userPwd,
            currencyNum: currencyNum
        },
        success: function() {
            refreshAdminUsers();
        }
    });
}