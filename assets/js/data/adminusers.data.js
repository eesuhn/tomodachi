$(document).ready(function () {
    refreshUsers();
});

// refresh stats header 
function refreshUsers() {
    setTimeout(function () {
    $.ajax({
        url: "../back/data/adminusers.data.php?action=refreshUsers",
        type: "POST",
        dataType: "html",

        success: function (data) {
            $("#userList").html(data);
        }
    })
    },100);
}