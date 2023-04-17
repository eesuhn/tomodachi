$(document).ready(function () {
    refreshAdminDashboard();
});

function refreshAdminDashboard() {
    setTimeout(function () {
        refreshViewPets();
    }, 100);
}

function refreshViewPets() {
    $.ajax({
        url: "../back/data/admin_dashboard.data.php?action=refreshViewPets",
        type: "POST",
        dataType: "html",

        success: function (data) {
            $("#viewPetsData").html(data);
        }
    });
}