<?php
    include '../connection.back.php';
    include '../currency.back.php';
    
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
        case 'studyReward':
        studyReward($amount);
        break;
    }

    function studyReward($amount){
        $amount = $_POST['amount'];
        $userID = $_SESSION["userID"];
        
        
        $currencyData = new Currency();

        $currencyData->increaseCurrency($userID, $amount);
    }
?>