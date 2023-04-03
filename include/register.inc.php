<?php

    include '../back/connection.back.php';
    include '../back/user.back.php';

    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPwd = $_POST['password'];

    $user = new User();
    $user->setAccountDetails($userName, $userEmail, $userPwd);
    $user->checkEmail();

?>