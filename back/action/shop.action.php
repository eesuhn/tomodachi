<?php
    include '../connection.back.php';
    include '../pet.back.php';
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
        case 'petScout':
            petScout();
            break;
    }

    function petScout() {
        $userID = $_GET['userID'];

        $petData = new Pet();

        $currencyData = new Currency();

        $petData->petScout($userID);
        $currencyData->decreaseCurrency($userID, 100);
    }
?>