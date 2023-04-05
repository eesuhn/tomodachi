<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$userID = $_SESSION['userID'];


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/petanimation.css">
</head>


<div class="sidebar">
    <div class="logo">
        <img src="../assets/images/logo2.png" alt="My Website Logo">
    </div>
    <a href="../front/dashboard.front.php">Home</a>
    <a class="active" href="../front/shop.front.php">Shop</a>
    <a href="#contact">Study</a>
    <a href="#about">Schedule</a>
    <div class="logout">
        <a href="#">Logout</a>
    </div>
</div>

<body style="background-image:url('../assets/images/bg2.png');  background-size: cover; background-repeat: no-repeat; background-position: center;background-attachment: fixed;color:#fff;">
    <div class="content vh-100">
        <div class="row">
            <div class="col-2 py-4 px-4">
                <img src="../assets/images/wizard.png" style="margin: 10px;" width="120">
            </div>
            <div class="col-9"></div>
            <div class="col-1 py-2 px-2">
                <img src="../assets/images/coin.png" style="height:19px; width:19px; margin:10px;">87.30
            </div>
        </div>
        <h5 style="margin:10px;">Welcome Dionne, great to have you here in my shop. Anything you have eyes on today?</h5>
        <div class="row d-flex justify-content-center py-5 px-4" style="margin-top: 150px;">
            <div class="col-md-4 d-flex justify-content-center py-2 px-2">
                <div>
                    <a href="#foodShop" data-bs-target="#foodShop" data-bs-toggle="modal" style="text-decoration:none; color:white">
                        <img src="../assets/foods/squid.png" width="150">
                        <div style="text-align:center;">Purchase Foods</div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center py-2 px-2">
                <div>
                    <a href="#petShop" data-bs-target="#petShop" data-bs-toggle="modal" style="text-decoration:none; color:white">
                        <img src="../assets/images/petscout.png" width="150">
                        <div style="text-align:center;">Pet Scout</div>
                </div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-center py-2 px-2">
                <div>
                    <a href="#wallpaperShop" data-bs-target="#wallpaperShop" data-bs-toggle="modal" style="text-decoration:none; color:white">
                        <img src="../assets/images/wallpapershop.png" width="150">
                        <div style="text-align:center;">Wallpaper Shop</div>
                    </a>
                </div>
            </div>
        </div>

        <div style="padding:50px;"></div>

    </div>


    <div class="modal fade" id="foodShop" aria-hidden="true" aria-labelledby="foodShopTitle" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="foodShopTitle">Purchase Foods</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                Foods
            </div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-bs-dismiss="#registerHotel">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="petShop" aria-hidden="true" aria-labelledby="petShopTitle" tabindex="-1" style="color:black">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="petShopTitle">Pet Scout</h1>
			</div>
			<div class="modal-body">
            <div class="text-muted">Partner up with new pets from different rarities using your earned coins!</div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6 d-flex justify-content-center">
                        <img src="../assets/images/petscout.png" width="150">
                        </div>
                        <div class="col-3"></div>
                        <div class="col-12 d-flex justify-content-center">
                        <h1>100<img src="../assets/images/coin.png" width="15"></h1>
                        </div>
                     </div>
            </div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-bs-target="#offeringRates" data-bs-toggle="modal">Offering Rates</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modal-lg" id="offeringRates" aria-hidden="true" aria-labelledby="offeringRatesTitle" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
            </div>
            <div class="modal-footer">
				<button class="btn btn-primary" data-bs-target="#petShop" data-bs-toggle="modal">Back</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
			</div>
        </div>
    </div>
</div>
    <script src="assets/js/bootstrap-js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
