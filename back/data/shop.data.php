<?php
    include '../connection.back.php';
    include '../pet.back.php';
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
?>