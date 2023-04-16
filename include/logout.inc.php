<?php
    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // unset only the user session
    unset($_SESSION['userID']);
    unset($_SESSION['petScoutID']);

    header('Location: ../index.php');
?>