<?php
    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // unset only the admin session
    unset($_SESSION['adminID']);
    unset($_SESSION['adminName']);

    header('Location: ../front/admin_login.front.php');
?>