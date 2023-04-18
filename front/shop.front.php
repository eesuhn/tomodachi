<?php
    include '../include/shop.inc.php';
    include '../include/toast.inc.php';
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
    <link rel="stylesheet" href="../assets/css/shop.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="../assets/js/data/shop.data.js"></script>
    <script src="../assets/js/action/shop.action.js"></script>
    <script src="../assets/js/toast.js"></script>
</head>

<div class="sidebar">
    <div class="logo">
        <img src="../assets/images/logo2.png" alt="My Website Logo">
    </div>
    <a href="../front/dashboard.front.php">Home</a>
    <a class="active" href="shop.front.php">Shop</a>
    <a href="../front/study.front.php">Study</a>
    <div class="logout">
        <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
    </div>
</div>

<body>
    <div class="content vh-100 p-0">

        <div class="coin-indicator" id="currencyData">
            <!-- display currency with AJAX -->
        </div>

        <div style="background-image: url('../assets/images/shopbg.png'); background-size: cover; background-repeat: no-repeat; background-position: center center; height: 200px;"></div>

        <ul>
            <li><a class="active" href="shop.front.php">Food & Wallpaper</a></li>
            <li><a href="scout.front.php">Pet Scout</a></li>
        </ul>

        <section style="background-image: url('../assets/images/bg3.png'); background-size: cover; background-repeat: no-repeat; background-position: center center; color: white; opacity: 92%;">
            <center>
                <div style="padding-top: 20px;">
                    <h2 style="color: black; padding: 10px">FOOD SHOP</h2>
                </div>
            </center>

            <div class="row" style="margin: -30px 10px 10px 10px;" id="foodShopData">
                <!-- display food shop with AJAX -->
            </div>

            <center>
                <hr style="width: 90%; height: 10px; color: black;">
            </center>

            <center>
                <h2 style="color: black; padding: 20px">WALLPAPER SHOP</h2>
            </center>

            <div class="row" style="margin: -32px 10px 10px 10px;" id="wallpaperShopData">
                <!-- display wallpaper shop with AJAX -->
            </div>
        </section>
    </div>

    <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

</body>

<html>