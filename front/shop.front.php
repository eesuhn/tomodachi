<?php

include '../include/shop.inc.php';

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

<body style="
      background-image: url('../assets/images/bg2.png'); 
      background-size: cover; 
      background-repeat: no-repeat; 
      background-position: center; 
      background-attachment: fixed; 
      color: #fff;">
  <div class="content vh-100">
    <div class="row">
      <div class="col-2 py-4 px-4">
        <img src="../assets/images/wizard.png" style="margin: 10px;" width="160">
      </div>
      <div class="col-9"></div>
      <div class="col-1 py-2 px-2" style="font-size:x-large;">
        <img src="../assets/images/coin.png" style="height: 30px; margin: 10px;"><?= $userCurrency ?>
      </div>
    </div>

    <h3 style="margin: 10px;">Welcome, great to have you here in my shop. Anything you have eyes on today?</h3>

    <div class="row d-flex justify-content-center py-5 px-4" style="margin-top: 120px;">

      <div class="col-md-4 d-flex justify-content-center py-2 px-2">
        <a class="shopItems" href="#foodShop" data-bs-target="#foodShop" data-bs-toggle="modal" style="text-decoration: none; color: white">
          <img src="../assets/foods/squid.png" width="200">
          <h4 style="text-align:center;">Purchase Foods</h4>
        </a>
      </div>

      <div class="col-md-4 d-flex justify-content-center py-2 px-2">
        <a class="shopItems" href="#petShop" data-bs-target="#petShop" data-bs-toggle="modal" style="text-decoration: none; color: white">
          <img src="../assets/images/petscout.png" width="200">
          <h4 style="text-align:center;">Pet Scout</h4>
        </a>
      </div>

      <div class="col-md-4 d-flex justify-content-center py-2 px-2">
        <a class="shopItems" href="#wallpaperShop" data-bs-target="#wallpaperShop" data-bs-toggle="modal" style="text-decoration: none; color: white">
          <img src="../assets/images/shop.png" width="200">
          <h4 style="text-align:center;">Wallpaper Shop</h4>
        </a>
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
            <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
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

              <div class="col-12 d-flex justify-content-center">
                <button type="button" style="width: 15%;" class="btn btn-primary <?php if ($ownedPets) echo 'disabled'; ?>" data-bs-target="#petScout" data-bs-toggle="modal" <?php if ($ownedPets) echo 'disabled'; ?>>Go!</button>
              </div>

              <div class="col-12 d-flex justify-content-center <?php if ($ownedPets) echo 'text-danger'; ?>">
                <?php if ($ownedPets) echo 'You have owned all available pets'; ?>
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

    <div class="modal fade" id="petScout" aria-hidden="true" aria-labelledby="petScoutTitle" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-body" style="color:black">
            <?php
            if ($userCurrency < 100) {
            ?>
              <div class="text-center" style="color:#333">
                <h1>Not enough coins!</h1>
              </div>

              <?php
            } else {
              $newPet = $petData->petScout($userID);

              if ($newPet) {
              ?>

                <div class="text-center">
                  <h2>Congratulations!</h2>
                  <p>You have successfully partnered up with a new pet!</p>
                  <h3>You got a <?php echo $newPet["petRarity"]; ?> pet:</h3>
                  <h4><?php echo $newPet["petName"]; ?></h4>

                  <img src="<?php echo $newPet["petImg"]; ?>" alt="<?php echo $newPet["petName"]; ?>" style="width: 150px;">
                  <p><?php echo $newPet["petDesc"]; ?></p>
                  <p>Check your inventory to see your new pet!</p>
                </div>
            <?php
              }
            }
            ?>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="location.reload();">Close</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade modal-lg" id="offeringRates" aria-hidden="true" aria-labelledby="offeringRatesTitle" tabindex="-1">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

          <div class="modal-body" style="color: black">
            <div class="row">
              <div class="col-12 d-flex justify-content-center">
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
              <div class="col-12 d-flex justify-content-center">
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
              <div class="col-12 d-flex justify-content-center">
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

  <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

</body>

</html>