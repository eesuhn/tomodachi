<?php
    include '../connection.back.php';
    include '../pet.back.php';
    include '../currency.back.php';
    include '../food.back.php';
    include '../wallpaper.back.php';

    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = null;
    }

    switch ($action) {
        case 'decreaseFood_one':
            decreaseFood_one();
            break;
        case 'equipPet':
            equipPet();
            break;
        case 'equipWallpaper':
            equipWallpaper();
            break;
    }

    function decreaseFood_one () {
        $userID = $_GET['userID'];
        $foodID = $_GET['foodID'];

        $foodData = new Food();

        $foodData->decreaseFood_one($userID, $foodID);
    }

    function equipPet(){
        $userID = $_GET['userID'];
        $petID = $_GET['petID'];

        $petData = new Pet();

        $petData->equipPet($userID,$petID);
    }

    function equipWallpaper(){
        $userID = $_GET['userID'];
        $wallpaperID = $_GET['wallpaperID'];

        $wallpaperData = new Wallpaper();

        $wallpaperData->equipWallpaper($userID, $wallpaperID);
    }
?>