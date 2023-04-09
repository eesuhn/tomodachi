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
        case 'petScout':
            petScout();
            break;
        case 'purchaseFood':
            purchaseFood();
            break;
        case 'purchaseWallpaper':
            purchaseWallpaper();
            break;
    }

    function petScout() {
        $userID = $_GET['userID'];

        $petData = new Pet();

        $currencyData = new Currency();

        $petData->petScout($userID);
        $currencyData->decreaseCurrency($userID, 100);
    }

    function purchaseFood(){
        $userID = $_GET['userID'];
        $foodID = $_GET['foodID'];
        $foodPrice = $_GET['foodPrice'];

        $buyFood = new Food();
        $currencyData = new Currency();

        $buyFood->purchaseFood($userID, $foodID);
        $currencyData->decreaseCurrency($userID, $foodPrice);
    }

    function purchaseWallpaper(){
        $userID = $_GET['userID'];
        $wallpaperID = $_GET['wallpaperID'];
        $wallpaperPrice = $_GET['wallpaperPrice'];    
        
        $buyWallpaper = new Wallpaper();
        $currencyData = new Currency();

        $buyWallpaper->purchaseWallpaper($userID,$wallpaperID);
        $currencyData->decreaseCurrency($userID, $wallpaperPrice);
    }
    
?>