<?php

include '../back/database.back.php';
include '../back/user.back.php';


    $user = new User();
    $user->loginUser( $_POST['email'], $_POST['password']);