<?php
    include '../connection.back.php';
    include '../pet.back.php';

    $db = new Database();

    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $userID = $_SESSION['userID'];

    /*
    */
?>