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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="../assets/js/data/shop.data.js"></script>
  <script src="../assets/js/action/shop.action.js"></script>
  <script src="../assets/js/toast.js"></script>
  <script>
    var i = 0,
        j = 0,
        s = 0,
        l = 0;
    text = "Welcome to my shop, how may I assist you today?";
    text2 = "-> Purchase Food";
    text3 = "-> Pet Scouting";
    text4 = "-> Purchase Wallpaper";

    function typing() {
      if (i < text.length) {
        document.getElementById("text").innerHTML += text.charAt(i);
        i++;
        setTimeout(typing, 15);
      }
    }

    function typing2() {
      if (j < text2.length) {
        document.getElementById("text2").innerHTML += text2.charAt(j);
        j++;
        setTimeout(typing2, 20);

      } else {
        var foodImg = "<img src='../assets/foods/squid.png' width='30'>";
        document.getElementById("text2").innerHTML += foodImg;
      }
    }

    function typing3() {
      if (s < text3.length) {
        document.getElementById("text3").innerHTML += text3.charAt(s);
        s++;
        setTimeout(typing3, 20);

      } else {
        var foodImg = "<img src='../assets/images/petscout.png' width='30'>";
        document.getElementById("text3").innerHTML += foodImg;
      }
    }

    function typing4() {
      if (l < text4.length) {
        document.getElementById("text4").innerHTML += text4.charAt(l);
        l++;
        setTimeout(typing4, 20);

      } else {
        var foodImg = "<img src='../assets/images/shop.png' width='30'>";
        document.getElementById("text4").innerHTML += foodImg;
      }
    }
  </script>

  <style>
    .content a {
      color: white;
      text-decoration: none;
    }

    .content a:hover {
      cursor: pointer;
      color: #FFD700 !important;
    }
  </style>

</head>

<div class="sidebar">
  <div class="logo">
    <img src="../assets/images/logo2.png" alt="Tomodachi">
  </div>

  <a href="../front/dashboard.front.php">Home</a>
  <a class="active" href="../front/shop.front.php">Shop</a>
  <a href="#contact">Study</a>
  <a href="#about">Schedule</a>
  <div class="logout">
    <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
  </div>
</div>

<body style="
      background-image: url('../assets/images/bg2.png'); 
      background-size: cover; 
      background-repeat: no-repeat; 
      background-position: center; 
      background-attachment: fixed; 
      color: #fff;">

  <div class="content" style="height: 100vh;">
    <div class="d-flex" style="margin-top: 20px;">
      <div class="col-11"></div>
      <div class="col-1 mt-1 py-2 px-2" style="font-size: x-large;" id="currencyData">
        <!-- display currency with AJAX -->
      </div>
    </div>

    <div style="background-color: rgba(255, 255, 255, 0.5); margin-top: 30px;" class="mx-5 mt-2 p-2 rounded">
      <h1 style="margin: 10px;" id="text"><?php echo "<script> typing(); </script>"; ?></h1>

      <a data-bs-target="#foodShop" data-bs-toggle="modal" onclick="refreshFoodShop()">
        <h3 style="margin: 10px;" id="text2"><?php echo "<script> typing2(); </script>"; ?></h3>
      </a>

      <a data-bs-target="#petShop" data-bs-toggle="modal">
        <h3 style="margin: 10px;" id="text3"><?php echo "<script> typing3(); </script>"; ?></h3>
      </a>

      <a data-bs-target="#wallpaperShop" data-bs-toggle="modal" onclick="refreshWallpaperShop()">
        <h3 style="margin: 10px;" id="text4"><?php echo "<script> typing4(); </script>"; ?></h3>
      </a>
    </div>

    <img src="../assets/images/wizard.png" style="position: fixed; bottom: 24px;" width="340px">

    <div class="modal fade" id="foodShop" aria-hidden="true" aria-labelledby="foodShopTitle" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-body" id="">
            <!-- display food shop with AJAX -->
          </div>

          <div class="modal-footer">
            <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="petShop" aria-hidden="true" aria-labelledby="petShopTitle" tabindex="-1" style="color: black">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="petShopTitle">Pet Scout</h1>
          </div>

          <div class="modal-body" id="gachaButton">
            <!-- display Gacha button with AJAX -->
          </div>

          <div class="modal-footer">
            <button class="btn btn-primary" data-bs-target="#offeringRates" data-bs-toggle="modal">Offering Rates</button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="petScout" aria-hidden="true" aria-labelledby="petScoutTitle" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-body" style="color: black" id="petScoutData">
            <!-- display new pet with AJAX -->
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="wallpaperShop" aria-hidden="true" aria-labelledby="wallpaperShopTitle" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

          <div class="modal-body" style="color: black" id="">
            <!-- display wallpaper shop with AJAX -->
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade modal-lg" id="offeringRates" aria-hidden="true" aria-labelledby="offeringRatesTitle" tabindex="-1">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

          <div class="modal-body" style="color: black">
            <div class="row">
              <div class="col-12 d-flex justify-content-center" style="margin-bottom: -10px;">
                <img src="../assets/images/legendary.png" width="150">
              </div>

              <?php foreach ($petData_legendary as $pet_legendary) { ?>
                <div class="col-12 d-flex justify-content-center">
                  <img src="<?= $pet_legendary['petImg'] ?>" width="150">
                </div>

                <div class="col-12 d-flex justify-content-center">
                  <h2><?= $pet_legendary['petName'] ?></h2>
                </div>

                <div class="col-3"></div>
                <div class="col-6 d-flex justify-content-center" style="text-align: center;">
                  <h6><?= $pet_legendary['petDesc'] ?></h6>
                </div>

                <div class="col-3"></div>
              <?php } ?>
            </div>

            <div class="row">
              <div class="col-12 d-flex justify-content-center" style="margin-top: 30px; margin-bottom: -10px;">
                <img src="../assets/images/rare.png" width="150">
              </div>

              <?php foreach ($petData_rare as $pet_rare) { ?>
                <div class="col-12 d-flex justify-content-center">
                  <img src="<?= $pet_rare['petImg'] ?>" width="150">
                </div>

                <div class="col-12 d-flex justify-content-center">
                  <h2><?= $pet_rare['petName'] ?></h2>
                </div>

                <div class="col-3"></div>
                <div class="col-6 d-flex justify-content-center" style="text-align: center;">
                  <h6><?= $pet_rare['petDesc'] ?></h6>
                </div>

                <div class="col-3"></div>
              <?php } ?>
            </div>

            <div class="row">
              <div class="col-12 d-flex justify-content-center" style="margin-top: 30px; margin-bottom: -10px;">
                <img src="../assets/images/common.png" width="150">
              </div>

              <?php foreach ($petData_common as $pet_common) { ?>
                <div class="col-12 d-flex justify-content-center">
                  <img src="<?= $pet_common['petImg'] ?>" width="150">
                </div>

                <div class="col-12 d-flex justify-content-center">
                  <h2><?= $pet_common['petName'] ?></h2>
                </div>

                <div class="col-3"></div>
                <div class="col-6 d-flex justify-content-center" style="text-align: center;">
                  <h6><?= $pet_common['petDesc'] ?></h6>
                </div>

                <div class="col-3"></div>
              <?php } ?>
            </div>

            <div class="row" style="margin-top: 10px;">
              <div class="col-2"></div>
              <div class="col-8 d-flex justify-content-center">
                <p class="text-muted" style="text-align: center;">Looking for that special pet to add to your collection? Take a chance and try our gacha system, where legendaries appear with a 5% chance, rares with a 35% chance, and commons with a 60% chance. With a variety of pets to collect, each with their own unique rarity and value, you'll never know what you might get! So why not try your luck today and see if you can obtain the pet of your dreams?</p>
              </div>
              <div class="col-2"></div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="logout" aria-hidden="true" aria-labelledby="logoutTitle" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body" style="color: black">
          <h4>Are you sure you want to log out?</h4>
        </div>
        <div class="modal-footer">
          <a href="../include/logout.inc.php" class="btn btn-primary" role="button" aria-pressed="true">Confirm</a>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

</body>

</html>