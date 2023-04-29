<!DOCTYPE html>
<html>

<?php
  // start session if not started
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }

  $userID = $_SESSION['userID'];

  include '../back/connection.back.php';
  include '../back/pet.back.php';

  $pet = new Pet();
?>

  <head>
    <title>Tomodachi | Habit Tracker</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/welcome.css">

    <script defer src="../assets/js/welcome.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logo3.png">
  </head>

  <body style="cursor: context-menu;">
    <section class="hidden">
      <div class="row d-flex py-4 px-4 justify-content-center">
        <div class="col-3"></div>

        <div class="col-6 justify-content-center d-flex">
          <img src="../assets/images/logo2.png" width="200" alt="logo" style="margin-top: -100px;">
        </div>

        <div class="col-3"></div>
        <div class="col-3"></div>

        <div class="col-6 justify-content-center d-flex">
          <h1 style="font-size: 56px;">Welcome to Tomodachi</h1>
        </div>

        <div class="col-3"></div>
        <div class="col-3"></div>

        <div class="col-6 justify-content-center d-flex">
          <h5 style="font-size: 26px; letter-spacing: 0.4px;">Before you embark on your journey, please scroll down</h5>
        </div>
        
        <div class="col-3"></div>
      </div>
    </section>

    <section class="hidden">
      <div class="row d-flex py-4 px-4 justify-content-center">
        <div class="col-12 justify-content-center d-flex">
          <h1 style="text-align: center;">And select your starting companion!</h1>
        </div>
      </div>

      <div class="col-3"></div>

      <div class="col-6 justify-content-center d-flex">
        <center>
          <h5 style="font-size: 26px; letter-spacing: 0.4px;">Alrighty, it's decision time! You get to pick just one companion for now
          <br>but don't fret, you'll have plenty of chances to collect more pals as you go on your adventure</h5>
        </center>
      </div>

      <div class="col-3"></div>
      <?php
        $pet->startingPet();
      ?>
    </section>

    <script src="../assets/js/bootstrap-js/bootstrap.js"></script>

  </body>

</html>