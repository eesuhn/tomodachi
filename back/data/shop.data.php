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

        echo 
        "<img src='../assets/images/coin.png' style='height: 30px; margin: 10px;'>$currencyNum";
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
            <h3>You got a $petRarity pet:</h3>
            <h4>$petName</h4>

            <img src='$petImg' alt='$petName' style='width: 150px;'>
            <p>$petDesc</p>
            <p>Check your inventory to see your new pet!</p>
        </div>";
    }

    function refreshFoodShop(){
        
        $userID = $_SESSION['userID'];
        
        $foodData = new Food();
        $foodShop = $foodData->getShopFoods($userID);

        $userCurrency = new Currency();
        $currencyNum = $userCurrency->getCurrency($userID);

        echo '<div class="row">';
        
        foreach ($foodShop as $foodShopData) {

            $disableButton = '';

            if ($currencyNum < $foodShopData['foodPrice']) {
                $disableButton = 'disabled';
            }
            echo
            "<div class='col-md-4 px-3 py-3'>
                <div class='card h-100'>
                    <center><img src='{$foodShopData["foodImg"]}' class='card-img-top' alt='Food Image' style='max-width: 55%;'></center>
                    <div class='card-body d-flex flex-column'>
                        <h5 class='card-title'>{$foodShopData["foodName"]}</h5>
                        <p class='card-text'><img src='../assets/images/hunger.png' width='20' style='margin: 2px;'>{$foodShopData["foodHunger"]}<img src='../assets/images/level.png' width='20' style='margin: 2px;'>{$foodShopData["foodXP"]}</p>
                        <p class='card-text' style='margin: -6px 0px -2px;'>In Inventory: {$foodShopData["foodNum"]}</p>
                        
                        <h4 class='card-text'><img src='../assets/images/coin.png' width='25' style='margin: -2px 6px 2px 2px;'>{$foodShopData["foodPrice"]}</h4>
                        <p class='card-text'>{$foodShopData["foodDesc"]}</p>

                        <div class='mt-auto'>
                            <button class='btn btn-primary' $disableButton onclick='purchaseFood({$userID}, {$foodShopData['foodID']}, {$foodShopData['foodPrice']})' 
                            style='margin: -6px 0px 0px; border: none; ";
                            
                            if ($disableButton == 'disabled') {
                                echo "background-color: red;'>Not Enough Coins!";
                            } else {
                                echo "'>Purchase";
                            }
            echo
                            "</button>
                        </div>
                    </div>
                </div>
            </div>";
        }
        echo '</div>';
    }

    function refreshGachaButton() {
        $userID = $_SESSION['userID'];

        $petData = new Pet();

        $userCurrency = new Currency();

        $currencyNum = $userCurrency->getCurrency($userID);

        $ownedPets = $petData->checkOwnedPets($userID);

        echo 
        "<div class='text-muted'>Partner up with new pets from different rarities using your earned coins!</div>

        <div class='row'>
          <div class='col-3'></div>

          <div class='col-6 d-flex justify-content-center'>
            <img src='../assets/images/petscout.png' width='150'>
          </div>
          <div class='col-3'></div>

          <div class='col-12 d-flex justify-content-center'>
            <h1>100<img src='../assets/images/coin.png' width='15'></h1>
          </div>

          <div class='col-12 d-flex justify-content-center'>
            <button type='button' style='width: 15%;' class='btn btn-primary "; 

            if ($ownedPets || $currencyNum < 100) {
                echo "disabled"; 
            };
            
        echo 
            "' data-bs-target='#petScout' data-bs-toggle='modal' ";
            
            if ($ownedPets || $currencyNum < 100) {
                echo "disabled"; 
            };

        echo
            " onclick='petScout($userID)'>Go!</button>
          </div>

          <div class='col-12 d-flex justify-content-center ";
          
            if ($ownedPets || $currencyNum < 100) {
                echo "text-danger"; 
            };
              if ($ownedPets) {
                echo "'>You have owned all available pets"; 

              } else if ($currencyNum < 100) {
                echo "'>You do not have enough coins"; 
              }

        echo 
          "</div>
        </div>";
    }

    function refreshWallpaperShop(){
        $userID = $_SESSION['userID'];

        $wallpaperData = new Wallpaper();

        $userCurrency = new Currency();

        $currencyNum = $userCurrency->getCurrency($userID);

        $wallpaperShop = $wallpaperData->getAllWallpapers();

        echo '<div class="row">';
        
        foreach ($wallpaperShop as $wallpaperShopData) {

            $disableButton = '';
            $flag ='';

            if ($currencyNum < $wallpaperShopData['wallpaperPrice']) {
                $disableButton = 'disabled';
                $flag = 'notEnough';
            }

            $isOwned = $wallpaperData->checkWallpaper($userID, $wallpaperShopData['wallpaperID']);

            if ($isOwned) {
                $disableButton = 'disabled';
                $flag = 'owned';
            }

            echo
            "<div class='col-md-4 px-3 py-3'>
                <div class='card h-100'>
                    <center><img src='{$wallpaperShopData["wallpaperImg"]}' class='card-img-top' alt='Food Image' style='max-width: 70%; margin-top:15px;'></center>
                    <div class='card-body d-flex flex-column'>
                        <h5 class='card-title'>{$wallpaperShopData["wallpaperName"]}</h5>
                        <h4 class='card-text'><img src='../assets/images/coin.png' width='25' style='margin: -2px 6px 2px 2px;'>{$wallpaperShopData["wallpaperPrice"]}</h4>
                        <p class='card-text'>{$wallpaperShopData["wallpaperDesc"]}</p>

                        <div class='mt-auto'>
                            <button class='btn btn-primary' $disableButton onclick='purchaseWallpaper({$userID}, {$wallpaperShopData['wallpaperID']}, {$wallpaperShopData['wallpaperPrice']})' 
                            style='margin: -6px 0px 0px; border: none; ";
                            
                            if ($flag == 'notEnough') {
                                echo "background-color: red;'>Not Enough Coins!";

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
        }
        echo '</div>';
    }
?>