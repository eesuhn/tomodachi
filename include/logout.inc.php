<?php
    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();

    echo 
        "<script>alert('You are now logged out.');
        window.location.href = '../front/login.front.php';</script>";
?>