$(document).ready(function() {
    refreshDashboard();
});

// refresh dashboard data
function refreshDashboard() {
    setTimeout(function() {
        refreshStatsHeader();
    }, 100);
}

// refresf stats header 
function refreshStatsHeader() {
    $.ajax({
        url: "../back/data/stats_header.data.php",
        type: "POST",
        dataType: "html",

        success: function(data) {
            $("#statsHeader").html(data);
        }
    })
}