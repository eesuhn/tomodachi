<?php
    include '../connection.back.php';
    include '../pet.back.php';
    include '../currency.back.php';
    include '../food.back.php';
    include '../wallpaper.back.php';
    include '../task.back.php';

    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = null;
    }

    switch ($action) {
        case 'decreaseFood_one':
            decreaseFood_one();
            break;
        case 'equipPet':
            equipPet();
            break;
        case 'equipWallpaper':
            equipWallpaper();
            break;
        case 'saveTask':
            saveTask();
            break;
        case 'addTask':
            addTask();
            break;
        case 'deleteTask':
            deleteTask();
            break;
        case 'deleteCompletedTasks':
            deleteCompletedTasks();
            break;
        case 'updateTaskStatus':
            updateTaskStatus();
            break;
    }

    function decreaseFood_one () {
        $userID = $_GET['userID'];
        $foodID = $_GET['foodID'];

        $foodData = new Food();

        $foodData->decreaseFood_one($userID, $foodID);
    }

    function equipPet(){
        $userID = $_GET['userID'];
        $petID = $_GET['petID'];

        $petData = new Pet();

        $petData->equipPet($userID,$petID);
    }

    function equipWallpaper(){
        $userID = $_GET['userID'];
        $wallpaperID = $_GET['wallpaperID'];

        $wallpaperData = new Wallpaper();

        $wallpaperData->equipWallpaper($userID, $wallpaperID);
    }

    function saveTask(){
        $taskID = $_GET['taskID'];
        $taskTitle = $_GET['taskTitle'];
        $taskDesc = $_GET['taskDesc'];
        $taskDue = $_GET['taskDue'];

        $taskData = new Task();
        $taskData->updateTask($taskID, $taskTitle, $taskDue, $taskDesc);
    }

    function addTask(){
        $userID = $_SESSION['userID'];
        $taskTitle = $_POST['taskTitle'];

        date_default_timezone_set('Asia/Kuala_Lumpur');

        $today = date('Y-m-d');
        $taskDue = $today;
        
        $taskData = new Task();
        $taskData->addTask($userID, $taskTitle, $taskDue);
    }

    function deleteTask(){
        $taskID = $_GET['taskID'];

        $taskData = new Task();
        $taskData->deleteTask($taskID);
    }

    function deleteCompletedTasks(){
        $userID = $_GET['userID'];

        $taskData = new Task();
        $taskData->deleteCompletedTasks($userID);
    }

    function updateTaskStatus(){
        $taskID = $_GET['taskID'];
        $taskStatus = $_GET['taskStatus'];

        $taskData = new Task();
        $taskData->updateStatus($taskID, $taskStatus);
    }
?>