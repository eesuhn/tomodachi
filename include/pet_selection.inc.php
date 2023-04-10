<?php
    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $userID = $_SESSION['userID'];
    $petID = $_GET['petID'];

    include '../back/connection.back.php';
    include '../back/pet.back.php';
    include '../back/wallpaper.back.php';

    $wallpaper = new Wallpaper();
    $wallpaper->startingWallpaper($userID);
    
    $pet = new Pet();
    $pet->ownPet($userID, $petID);
?>