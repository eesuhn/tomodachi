<?php
  // start session if not started
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $userID = $_SESSION['userID'];

  include '../back/connection.back.php';
  include '../back/pet.back.php';
  include '../back/currency.back.php';
  $petData = new Pet();

  // call the function and store the returned pet data in $petData
  $pet = $petData->getEquippedPet($userID);

  // retrieve and store the individual values from $petData
  $petName = $pet['petName'];
  $petImg = $pet['petImg'];
  $petHealthTol = $pet['petHealthTol'];
  $petHungerTol = $pet['petHungerTol'];
  $petXP = $pet['petXP'];
  $petLevel = $pet['petLevel'];

  date_default_timezone_set('Asia/Kuala_Lumpur');

  $currencyData = new Currency();

  $userCurrency = $currencyData->getCurrency($userID);
?>