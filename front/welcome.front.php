<?php
session_start();


$userID = $_SESSION['userID'];

include '../back/connection.back.php';
include '../back/pets.back.php';

$pet = new Pets();

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
    <link rel="stylesheet" href="../assets/css/welcome.css">
    <script defer src="../assets/js/bootstrap-js/welcome.js"></script>
</head>

<body>
    <section class="hidden">
        <div class="row d-flex py-4 px-4 justify-content-center">
            <div class="col-3">
            </div>
            <div class="col-6 justify-content-center d-flex">
                <img src="../assets/images/logo2.png" width="200" alt="logo">
            </div>
            <div class="col-3">
            </div>
            <div class="col-3">
            </div>
            <div class="col-6 justify-content-center d-flex">
                <h1>Welcome to Tomodachi</h1>
            </div>
            <div class="col-3">
            </div>
            <div class="col-3">
            </div>
            <div class="col-6 justify-content-center d-flex">
                <h5>Before you embark on your journey,</h5>
            </div>
            <div class="col-3">
            </div>
        </div>
    </section>

    <section class="hidden">
        <div class="row d-flex py-4 px-4 justify-content-center">
            <div class="col-3">
            </div>
            <div class="col-6 justify-content-center d-flex">
                <h1>Please select your starting companion!</h1>
            </div>
            <div class="col-3">
            </div>
        </div>
        <div class="col-3">
        </div>
        <div class="col-6 justify-content-center d-flex">
            <h5>Choose carefully, you can only select one of them, however, don't worry as you can always collect more companions as you progress!</h5>
        </div>
        <div class="col-3">
        </div>
        </div>
        <?php
        $pet->startingPet();
        ?>
    </section>

    <script src="js/bootstap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>


</html>