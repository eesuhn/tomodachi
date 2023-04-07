<?php
    include '../connection.back.php';
    include '../pet.back.php';
    include '../currency.back.php';

    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

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
?>