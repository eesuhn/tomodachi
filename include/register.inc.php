<?php
    include '../back/connection.back.php';
    include '../back/user.back.php';
    include '../back/currency.back.php';

    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPwd = $_POST['password'];

    $user = new User();
    $user->setAccountDetails($userName, $userEmail, $userPwd);
    $userID = $user->checkEmail();

    if ($userID != null) {
        $currency = new Currency();
        $currency->setCurrencyDetails($userID);
        $currency->registerCurrency();
    }
?>