<?php
    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $userID = $_SESSION['userID'];
    $petID = $_GET['petID'];

    include '../back/connection.back.php';
    include '../back/pet.back.php';

    $pet = new Pets();
    $pet->ownPet($userID, $petID);
?>