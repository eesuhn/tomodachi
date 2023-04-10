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
        case 'refreshStatsHeader':
            refreshStatsHeader();
            break;

        case 'refreshFood':
            refreshFood();
            break;

        case 'refreshInventory':
            refreshInventory();
            break;
            
        case 'refreshPetImg':
            refreshPetImg();
            break;
        
        case 'refreshWallpaper':
            refreshWallpaper();
            break;
    }

    function refreshStatsHeader () {
        $userID = $_SESSION['userID'];

        $pet = new Pet();

        $petData = $pet->getEquippedPet($userID);

        $petName = $petData['petName'];
        $petImg = $petData['petImg'];
        $petHealthTol = $petData['petHealthTol'];
        $petHungerTol = $petData['petHungerTol'];
        $petXP = $petData['petXP'];
        $petLevel = $petData['petLevel'];
        $petHealthCur = $petData['petHealthCur'];
        $petHungerCur = $petData['petHungerCur'];

        $currency = new Currency();

        $currencyNum = $currency->getCurrency($userID);

        echo 
        "<div class='row px-2 py-4'>
            <div class='card flex-row flex-wrap' style='padding: 10px; background-color: white; color: black;'>
                <div class='card-header border-0'>
                    <img src='$petImg' width='100px' style='margin-top: 30px'>
                </div>
                <div class='card-block px-3 col-4'>
                    <h5>$petName</h5>
                    <img src='../assets/images/level.png' style='height: 13px; width: 13px; margin: 5px;'></i>Level: $petLevel<br>
                    <div class='progress' style='height:3px;'>
                        <div class='progress-bar bg-info' role='progressbar' style='width: $petXP%' aria-valuemin='0' aria-valuemax='100'></div>
                    </div>

                    <img src='../assets/images/health.png' style='height: 13px; width: 13px; margin: 5px;'>Health: $petHealthCur/$petHealthTol<br>
                    <div class='progress' style='height:3px;'>
                        <div class='progress-bar bg-danger' role='progressbar' style='width: $petHealthCur%' aria-valuemin='0' aria-valuemax='$petHealthTol'></div>
                    </div>

                    <img src='../assets/images/hunger.png' style='height: 13px; width: 13px; margin: 5px;'>Hunger: $petHungerCur/$petHungerTol<br>
                    <div class='progress' style='height:3px;'>
                        <div class='progress-bar bg-warning' role='progressbar' style='width: $petHungerCur%' aria-valuemin='0' aria-valuemax='$petHungerTol'></div>
                    </div>
                </div>
                
                <div class='card-block px-3 col-4'>
                    <img src='../assets/images/coin.png' style='height: 19px; width: 19px; margin: 10px;'>$currencyNum
                    <h4><?=date('l, j F Y');?></h4>
                    <p>0 Tasks Today</p>
                </div>
            </div>
        </div>";
    }

    function refreshFood () {
        $userID = $_SESSION['userID'];

        $foodData = new Food();

        $stmt = $foodData->getFoodDetails($userID);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($row['foodNum'] != 0) {
                echo 
                "<div class='col-3 col-lg-3'>
                    <div class='count-data text-center' style='font-size: 20px;'>
                        <button href='#food' data-bs-target='#food<?=". $row['foodID'] ."?>' 
                        data-bs-toggle='modal' style='text-decoration: none; color: white; background-color: #212529; border: none;'>
                            <img src='"
                            .$row['foodImg'] . 
                            "' width='30px'>
                            <p class='m-0px font-w-300'>".$row['foodName']. 
                            " x "
                            .$row['foodNum']."</p>
                        </button>
                    </div>
                </div>

                <div class='modal fade' id='food<?=" .$row['foodID']. "?>' aria-hidden='true' aria-labelledby='foodTitle' tabindex='-1' style='color:black'>
                    <div class='modal-dialog modal-dialog-centered'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h1 class='modal-title fs-5' id='foodTitle'>Feed ".$row['foodName']."?</h1>
                            </div>

                            <div class='modal-footer'>
                                <button class='btn btn-primary' onclick='decreaseFood_one(".$row['userID'].", ".$row['foodID'].")' data-bs-dismiss='modal'>Yes</button>
                                <button type='button' class='btn btn-dark' data-bs-dismiss='modal'>No</button>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        }
    }

    function refreshInventory() {
        $userID = $_SESSION['userID'];
        
        $petData = new Pet();
        $wallpaperData = new Wallpaper();

        $stmt = $petData->showPetInventory($userID);
        $stmt2 = $wallpaperData->getUserWallpapers($userID);

        echo "<div class='row'>
                <div clas='col-12 d-flex justify content center'>
                    <h3>Owned Pets</h3>
                </div>";
        foreach ($stmt as $row) { 

            // check if the pet is equipped
            $isEquipped = ($row['petStatus'] == 'Equipped');

            // print the pet information and the "Equip" button
            echo "
                <div class='col-md-3 px-3 py-3'>
                    <div class='card'>
                        <img src='{$row['petImg']}' class='card-img-top' width='120'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['petName']}</h5>
                            <p class='card-text'>Status: {$row['petStatus']}</p>
                            <button class='btn btn-primary' onclick='equipPet({$userID}, {$row['petID']})' " .($isEquipped ? 'disabled' : ''). ">Equip</button>
                        </div>
                    </div>
                </div>
            ";
        }
        echo "</div>";

        echo "<div class='row'>
                <div clas='col-12 d-flex justify content center'>
                    <h3>Owned Wallpapers</h3>
                </div>";
        foreach ($stmt2 as $row2) {
            // check if the wallpaper is equipped
            $isEquipped2 = ($row2['wallpaperStatus'] == 'Equipped');

            // print the wallpaper information and the "Equip" button
            echo "
                <div class='col-md-3 px-3 py-3'>
                    <div class='card'>
                        <img src='{$row2['wallpaperImg']}' class='card-img-top' width='120'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row2['wallpaperName']}</h5>
                            <p class='card-text'>Status: {$row2['wallpaperStatus']}</p>
                            <button class='btn btn-primary' onclick='equipWallpaper({$userID}, {$row2['wallpaperID']})' " .($isEquipped2 ? 'disabled' : ''). ">Equip</button>
                        </div>
                    </div>
                </div>
            ";
        }
        echo "</div>";
    }

    function refreshPetImg(){
        $userID = $_SESSION['userID'];

        $pet = new Pet();
        $petData = $pet->getEquippedPet($userID);
        $petImg = $petData['petImg'];

        echo ' <img src="' . $petImg . '" style="width: auto; height: 200px;">';
    }
    
    function refreshWallpaper() {
        $userID = $_SESSION['userID'];

        $wallpaper = new Wallpaper();
        $wallpaperData = $wallpaper->getEquippedWallpaper($userID);
        $imageUrl = $wallpaperData['wallpaperImg'];
        
        echo json_encode(array('imageUrl' => $imageUrl));
    }
?>