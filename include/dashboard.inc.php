<?php
  // start session if not started
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $userID = $_SESSION['userID'];

  include '../back/connection.back.php';
  include '../back/pet.back.php';
  include '../back/currency.back.php';
  include '../back/food.back.php';
  include '../back/wallpaper.back.php';

  date_default_timezone_set('Asia/Kuala_Lumpur');

  $pet = new Pet();
  $petData = $pet->getEquippedPet($userID);

  $petImg = $petData['petImg'];
?>