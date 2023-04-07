<?php
// start session if not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../back/connection.back.php';
include '../back/pet.back.php';
include '../back/currency.back.php';

$userID = $_SESSION['userID'];

$petData = new Pet();

$petData_legendary = $petData->showPetDetails_rarity('Legendary');
$petData_rare = $petData->showPetDetails_rarity('Rare');
$petData_common = $petData->showPetDetails_rarity('Common');

$currencyData = new Currency();

$userCurrency = $currencyData->getCurrency($userID);

$allPetsOwned = $petData->checkOwnedPets($userID);

?>