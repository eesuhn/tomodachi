<?php

include '../back/database.back.php';
include '../back/user.back.php';

    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPwd = $_POST['password'];
    $userPwd2 = $_POST['confirim_password'];

    $user = new User();
    $user->setAccountDetails($userName, $userEmail, $userPwd, $userPwd2);
    $user->registerUser();