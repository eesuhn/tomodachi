<?php
    include '../back/connection.back.php';
    include '../back/admin.back.php';

    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $adminEmail = $_POST['email'];
    $adminPwd = $_POST['password'];

    $admin = new Admin();
    $admin->loginAdmin($adminEmail, $adminPwd);
?>