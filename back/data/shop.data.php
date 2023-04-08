<?php
    include '../connection.back.php';
    include '../pet.back.php';
    include '../food.back.php';
    include '../currency.back.php';

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

        case 'showFoodShop':
            showFoodShop();
            break;
    }

    function refreshCurrency () {
        $userID = $_SESSION['userID'];

        $currency = new Currency();

        $currencyNum = $currency->getCurrency($userID);

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

    function showFoodShop(){
        
        $foodData = new Food();
        $userID = $_SESSION['userID'];
        $foodShop = $foodData->getShopFoods($userID);

        echo '<div class="row">';
        $count = 0;
        foreach ($foodShop as $foodShopData) {
            if ($count % 2 == 0) {
                echo '</div><div class="row">';
            }

            echo
            "<div class='col-6 px-2 py-2'>
                <div class='card h-100'>
                    <center><img src='{$foodShopData["foodImg"]}' class='card-img-top' alt='Food Image' style='max-width: 55%;'></center>
                    <div class='card-body d-flex flex-column'>
                        <h5 class='card-title'>{$foodShopData["foodName"]}</h5>
                        <p class='card-text'><img src='../assets/images/hunger.png' width='20' style='margin: 2px;'>{$foodShopData["foodHunger"]}<img src='../assets/images/level.png' width='20' style='margin: 2px;'>{$foodShopData["foodXP"]}</p>
                        <p class='card-text'>In Inventory: {$foodShopData["foodNum"]}</p>
                        <h4 class='card-text'><img src='../assets/images/coin.png' width='25' style='margin: 2px;'>{$foodShopData["foodPrice"]}</h4>
                        <p class='card-text'>{$foodShopData["foodDesc"]}</p>
                        <div class='mt-auto'>
                            <button class='btn btn-primary'>Purchase</button>
                        </div>
                    </div>
                </div>
            </div>";
            $count++;
        }
        echo '</div>';

    }

?>