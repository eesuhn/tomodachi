<?php
    include '../connection.back.php';
    include '../pet.back.php';
    include '../food.back.php';
    include '../currency.back.php';
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
        case 'refreshCurrency':
            refreshCurrency();
            break;

        case 'showPetScout':
            showPetScout();
            break;

        case 'refreshFoodShop':
            refreshFoodShop();
            break;

        case 'refreshGachaButton':
            refreshGachaButton();
            break;
        
        case 'refreshWallpaperShop':
            refreshWallpaperShop();
            break;
    }

    function refreshCurrency () {
        $userID = $_SESSION['userID'];

        $userCurrency = new Currency();

        $currencyNum = $userCurrency->getCurrency($userID);

        echo "
        <span class='coin-icon'></span>
        <span class='coin-count'>$currencyNum</span>";
    }

    function showPetScout () {
        $petData = new Pet();

        $petScoutID = $_SESSION['petScoutID'];

        $stmt = $petData->showPetDetails($petScoutID);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $petName = $row['petName'];
        $petImg = $row['petImg'];
        $petDesc = $row['petDesc'];
        $petRarity = $row['petRarity'];

        echo 
        "<div class='text-center'>
            <h2>Congratulations!</h2>
            <p>You have successfully partnered up with a new pet!</p>
            <h3>You got a</h3>";
            
        if ($petRarity === "Legendary"){
            echo "<img src='../assets/images/legendary.png' width='150'>";

        } else if ($petRarity === "Rare"){
            echo "<img src='../assets/images/rare.png' width='150'>";

        }else{
            echo "<img src='../assets/images/common.png' width='150'>";
        }
        echo"
            <h4>$petName</h4>
            <img src='$petImg' alt='$petName' style='width: 150px;'>
            <p>$petDesc</p>
            <p>Check your inventory to see your new pet!</p>
        </div>";
    }

    function refreshFoodShop(){
        
        $userID = $_SESSION['userID'];
        
        $foodData = new Food();
        $stmt = $foodData->getShopFoods($userID);

        $userCurrency = new Currency();
        $currencyNum = $userCurrency->getCurrency($userID);
        
        foreach ($stmt as $row) {
            $disableBtn = '';

            if ($currencyNum < $row['foodPrice']) {
                $disableBtn = 'disabled';
            }

            $foodNum = ($row['foodNum'] == 0) ? "0" : $row['foodNum'];

            echo "
            <div class='col-md-3 px-3 py-3' style='max-width: 24.6%;'>
                <div class='card h-40'>
                    <center><img src='{$row['foodImg']}' class='card-img-top' alt='Food Image' style='max-width: 40%;'></center>
                    <div class='card-body d-flex flex-column'>
                        <h5 class='card-title' style='font-size: 24px;'>{$row['foodName']}</h5>
                        <p class='card-text food-stats'>
                            <img src='../assets/images/health.png' width='20'><span style='font-size: 18px;'>{$row['foodHealth']}</span>
                            <img src='../assets/images/hunger.png' width='20'><span style='font-size: 18px;'>{$row['foodHapp']}</span>
                        </p>
                        <p class='card-text' style='margin: -6px 0px -2px; font-size: 18px;'>In Inventory: &nbsp$foodNum</p>

                        <h4 class='card-text'><img src='../assets/images/coin.png' width='25' style='margin: -2px 6px 2px 0px;'>{$row['foodPrice']}</h4>
                        <p class='card-text' style='font-size: 18px;'>{$row['foodDesc']}</p>

                        <div class='mt-auto'>
                            <button class='btn btn-primary' $disableBtn onclick='purchaseFood({$userID}, {$row['foodID']}, {$row['foodPrice']})' 
                            style='margin: -6px 0px 0px; border: none; ";
                            
                            if ($disableBtn == 'disabled') {
                                echo "background-color: red;'>Not enough coins!";
                            } else {
                                echo "'>Purchase";
                            }
            echo
                            "</button>
                        </div>
                    </div>
                </div>
            </div>";
        };
    }

    function refreshGachaButton() {
        $userID = $_SESSION['userID'];

        $petData = new Pet();

        $userCurrency = new Currency();

        $currencyNum = $userCurrency->getCurrency($userID);

        $ownedPets = $petData->checkOwnedPets($userID);

        $flag = "";

        if ($ownedPets || $currencyNum < 1000) {
            $flag = "disabled"; 
        };
        
        echo 
        "<button type='button' class='btn btn-primary $flag' data-bs-target='#petScout' data-bs-toggle='modal' onclick='petScout($userID)' style='padding: 6px -10px; width: 25%; font-size: 30px; border: none; ";
        if ($ownedPets) {
            echo " background-color: black; opacity: 0.9;' disabled>You owned all the pets!"; 

        } else if ($currencyNum < 1000) {
            echo " background-color: red; opacity: 0.9;' disabled>Not enough coins!";
            
        } else {
            echo "'>Scout!";
        }
        echo
        "</button>";
    }

    function refreshWallpaperShop(){
        $userID = $_SESSION['userID'];

        $wallpaperData = new Wallpaper();

        $userCurrency = new Currency();

        $currencyNum = $userCurrency->getCurrency($userID);

        $stmt = $wallpaperData->getAllWallpapers();

        echo '<div class="row">';
        
        foreach ($stmt as $row) {

            $disableBtn = '';
            $flag ='';

            if ($currencyNum < $row['wallpaperPrice']) {
                $disableBtn = 'disabled';
                $flag = 'notEnough';
            }

            $isOwned = $wallpaperData->checkWallpaper($userID, $row['wallpaperID']);

            if ($isOwned) {
                $disableBtn = 'disabled';
                $flag = 'owned';
            }

            echo "
            <div class='col-md-3 px-3 py-3'>
                <div class='card h-40'>
                    <center><img src='{$row['wallpaperImg']}' class='card-img-top' alt='Wallpaper Image' style='max-width: 90%; padding: 15px 10px 0px 10px;'></center>
                    <div class='card-body d-flex flex-column'>
                        <h5 class='card-title' style='font-size: 24px;'>{$row['wallpaperName']}</h5>
                        <h4 class='card-text'><img src='../assets/images/coin.png' width='25' style='margin: -2px 6px 2px 0px;'>{$row['wallpaperPrice']}</h4>
                        <p class='card-text' style='font-size: 18px;'>{$row['wallpaperDesc']}</p>
                        <div class='mt-auto'>
                            <button class='btn btn-primary' $disableBtn onclick='purchaseWallpaper({$userID}, {$row['wallpaperID']}, {$row['wallpaperPrice']})' 
                            style='margin: -6px 0px 0px; border: none; ";
                            
                            if ($flag == 'notEnough') {
                                echo "background-color: red;'>Not enough coins!";

                            } else if ($flag == 'owned'){
                                echo "background-color: black;'>Owned";

                            } else {
                                echo "'>Purchase";
                            }
            echo
                            "</button>
                        </div>
                    </div>
                </div>
            </div>";
        };
    }
?>