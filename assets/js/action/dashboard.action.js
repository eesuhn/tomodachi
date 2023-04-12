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

function saveTask(taskID){    
    let taskTitle = document.getElementById('editTaskTitle'+taskID).value;
    let taskDesc = document.getElementById('editTaskDesc'+taskID).value;
    let taskDue = document.getElementById('editTaskDue'+taskID).value;
    $.ajax({
        url: "../back/action/dashboard.action.php?action=saveTask",
        type: "GET",
        data: {
            taskID: taskID,
            taskTitle: taskTitle,
            taskDesc: taskDesc,
            taskDue: taskDue
        }
    });
    refreshDashboard();
}

function addTask() {
    var todoInput = document.getElementById("todo");
    var todo = todoInput.value.trim();
    if(todo !== ''){
        $.ajax({
            url: "../back/action/dashboard.action.php?action=addTask",
            type: "POST",
            data: {
                todo: todo
            },
            success: function(){
                refreshDashboard();
                todoInput.value = '';
            }
        });
    }
}

function deleteTask(taskID){    
    $.ajax({
        url: "../back/action/dashboard.action.php?action=deleteTask",
        type: "GET",
        data: {
            taskID: taskID,
        }
    });
    refreshDashboard();
}

function updateTaskStatus(taskID, status) {
    $.ajax({
        url: '../back/action/dashboard.action.php?action=updateTaskStatus',
        type: 'GET',
        data: {
            taskID: taskID,
            status: status
        },
        success: function(data) {
            refreshDashboard();
        }
    });
}