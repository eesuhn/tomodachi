<?php
    include '../back/connection.back.php';
    include '../back/user.back.php';

    $user = new User();
    $user->loginUser( $_POST['email'], $_POST['password']);
    
?>