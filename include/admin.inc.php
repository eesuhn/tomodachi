<?php
    include '../back/connection.back.php';
    include '../back/admin.back.php';

    $adminEmail = $_POST['email'];
    $adminPwd = $_POST['password'];

    $admin = new Admin();
    $admin->loginAdmin($adminEmail,$adminPwd);
?>