<?php
    include '../back/connection.back.php';
    include '../back/user.back.php';

    $userEmail = $_POST['email'];
    $userPwd = $_POST['password'];

    $user = new User();
    $user->loginUser($userEmail, $userPwd);
?>