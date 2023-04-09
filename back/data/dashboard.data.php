<?php
    include '../connection.back.php';
    include '../pet.back.php';
    include '../currency.back.php';
    include '../food.back.php';

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
?>