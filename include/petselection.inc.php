<?php

session_start();

$userID = $_SESSION['userID'];
$petID = $_GET['petID'];

include '../back/connection.back.php';
include '../back/pets.back.php';

$pet = new Pets();
$pet->ownPet($userID, $petID);