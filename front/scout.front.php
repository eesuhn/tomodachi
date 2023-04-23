<!DOCTYPE html>
<html>

<?php
  include '../include/shop.inc.php';
?>

<head>
  <title>Tomodachi | Habit Tracker</title>
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

  <link rel="shortcut icon" type="image/png" href="../assets/images/logo3.png">
</head>

<div class="sidebar">
  <div class="logo">
    <img src="../assets/images/logo2.png" alt="My Website Logo">
  </div>
  <a href="../front/dashboard.front.php">Home</a>
  <a class="active" href="../front/shop.front.php">Shop</a>
  <a href="../front/study.front.php">Study</a>
  <div class="logout">
    <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
  </div>
</div>

<body style='background-color: #f2f2f2f2; cursor: context-menu;'>
  <div class="content vh-100 p-0">

    <div class="coin-indicator" id="currencyData">
      <!-- display currency with AJAX -->
    </div>

    <div style="background-image: url('../assets/images/shopbg.png'); background-size: cover; background-repeat: no-repeat; background-position: center center; height: 200px;"></div>

    <ul>
      <li><a href="shop.front.php">Food & Wallpaper</a></li>
      <li><a class="active" href="scout.front.php">Pet Scout</a></li>
    </ul>

    <section style="background-image: url('../assets/images/scoutbg.png'); background-size: cover; background-repeat: no-repeat; background-position: center center; color: white; opacity: 92%;">
      <div style="padding: 20px 20px 10px;">
        <h1>Pet Scout</h1>
        <h4 style="color: white">
          Partner up with new pets from different rarities using your earned coins!
        </h4>
      </div>

      <center>
        <img src="../assets/images/petscout.png" style="margin: auto; width: 420px;">
        <h1>1000 <img src='../assets/images/coin.png' width='20' style="margin-top: -8px;"></h1>

        <div id="gachaButton">
          <!-- display Gacha button with AJAX -->
        </div>

        <div style="padding: 10px 0px 30px 0px;">
          <a data-bs-target="#offeringRates" data-bs-toggle="modal" class="link-light" style="text-decoration: underline;">Check Offering Rates</a>
        </div>
      </center>
    </section>
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

  <div class="modal fade modal-lg" id="offeringRates" aria-hidden="true" aria-labelledby="offeringRatesTitle" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">

        <div class="modal-body" style="color: black">
          <div class="row">
            <div class="col-12 d-flex justify-content-center" style="margin-bottom: 0px; margin-top: -10px;">
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
              <div class="col-6 d-flex justify-content-center" style="text-align: center; margin-bottom: 16px;">
                <h6><?= $pet_legendary['petDesc'] ?></h6>
              </div>

              <div class="col-3"></div>
            <?php } ?>
          </div>

          <center>
            <hr style="color: black; width: 100%; margin-top: 0px;">
          </center>

          <div class="row">
            <div class="col-12 d-flex justify-content-center" style="margin-bottom: -2px; margin-top: -10px;">
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
              <div class="col-6 d-flex justify-content-center" style="text-align: center; margin-bottom: 16px;">
                <h6><?= $pet_rare['petDesc'] ?></h6>
              </div>

              <div class="col-3"></div>
            <?php } ?>
          </div>

          <center>
            <hr style="color: black; width: 100% ;margin-top: 0px;">
          </center>

          <div class="row">
            <div class="col-12 d-flex justify-content-center" style="margin-bottom: 4px; margin-top: -10px;">
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
              <div class="col-6 d-flex justify-content-center" style="text-align: center; margin-bottom: 16px;">
                <h6><?= $pet_common['petDesc'] ?></h6>
              </div>

              <div class="col-3"></div>
            <?php } ?>
          </div>

          <center>
            <hr style="color: black; width: 100%; margin-top: -8px;">
          </center>

          <div class="row">
            <div class="col-1"></div>
            <div class="col-10 d-flex justify-content-center">
              <p class="text-muted" style="text-align: center; font-size: 18px; line-height: 20px;">
              Looking for that special pet to add to your collection? Take a chance and try our gacha system! 
              <br><span style="color: red;">Legendaries</span> appear with a 5% chance, <span style="color: orange;">Rares</span> with a 35% chance, and <span style="color: green;">Commons</span> with a 60% chance. 
              <br>With a variety of pets to collect, you'll never know what you might get!
            </p>
            </div>
            <div class="col-1"></div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/data/shop.data.js"></script>
  <script src="../assets/js/action/shop.action.js"></script>
  <script src="../assets/js/toast.js"></script>

  <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

</body>

<html>