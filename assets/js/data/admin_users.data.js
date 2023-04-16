$(document).ready(function() {
    refreshAdminUsers();
})

// refresh admin users data
function refreshAdminUsers() {
    setTimeout(function() {
        refreshManageUsers();
    }, 100);
}

function refreshManageUsers() {
    $.ajax({
        url: "../back/data/admin_users.data.php?action=refreshManageUsers",
        type: "POST",
        dataType: "html",

        success: function(data) {
            $("#manageUsers").html(data);
        }
    });
}