<?php
    include '../connection.back.php';
    include '../admin.back.php';

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
        case 'updateUsers':
            updateUsers();
            break;
    }

    function updateUsers() {
        $userID = $_GET['userID'];
        $userName = $_GET['userName'];
        $userEmail = $_GET['userEmail'];
        $userPwd = $_GET['userPwd'];
        $currencyNum = $_GET['currencyNum'];

        $admin = new Admin();
        $admin->updateUser($userID, $userName, $userEmail, $userPwd, $currencyNum);
    }
?>