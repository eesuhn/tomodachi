<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$userID = $_SESSION['userID'];

include '../back/connection.back.php';
include '../back/pets.back.php';
$petData = new Pets();
// Call the function and store the returned pet data in $petData
$pet = $petData->getEquippedPet($userID);
// Retrieve and store the individual values from $pet
$petName = $pet['petName'];
$petImage = $pet['petImage'];
$petHealth = $pet['petHealth'];
$petXP = $pet['petXP'];
$petLevel = $pet['petLevel'];
$petHunger = $pet['petHunger'];

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

<body style="background-color:#f1f1f1;">

  <div class="sidebar">
    <div class="logo">
      <img src="../assets/images/logo2.png" alt="My Website Logo">
    </div>
    <a class="active" href="#home">Home</a>
    <a href="#news">Shop</a>
    <a href="#contact">Study</a>
    <a href="#about">Schedule</a>
    <div class="logout">
      <a href="#">Logout</a>
    </div>
  </div>


  <div class="content">
    <div class="container">
      <div class="row px-4 py-4">
        <div class="card flex-row flex-wrap" style="padding:10px; background-color: white; color:black;">
          <div class="card-header border-0">
            <img src="<?=$petImage?>" width="100px" style="margin-top: 30px">
          </div>
          <div class="card-block px-3 col-4">
            <h5><?=$petName?></h5>
            <img src="../assets/images/level.png" style="height:13px; width:13px; margin:5px;"></i>Level: <?=$petLevel?><br>
            <img src="../assets/images/health.png" style="height:13px; width:13px; margin:5px;">Health: <?=$petHealth?><br>
            <img src="../assets/images/hunger.png" style="height:13px; width:13px; margin:5px;"></i>Hunger: <?=$petHunger?><br>
          </div>
          <div class="card-block px-3 col-4">
            <img src="../assets/images/coin.png" style="height:19px; width:19px; margin:10px;">87.30
            <h4>Friday, 31 March 2023</h4>
            <p>0 Tasks Today</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row px-4 py-2">
      <div class="col-md-6">
        <div style="height:550px; width:auto; border: 5px solid black; display:flex; justify-content: center; align-items: center; position: relative; background-image: url('../assets/backgrounds/meadow.png'); background-size: cover; background-position: center;">
          <div style="position: absolute; bottom: 0; left: 0; display: flex; align-items: center; margin: 5px; background: rgba(0, 0, 0, 0.5); padding:5px;">
            <img src="../assets/images/inventory.png" style="width: auto; height: 25px;">
            <span style="margin-left: 10px; color:white;">Inventory</span>
          </div>
          <div class="pet">
            <img src="<?=$petImage?>" style="width: auto; height: 250px;">
          </div>
        </div>
      </div>
      <div class="col-md-6 py-1">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" 
            aria-controls="nav-home" aria-selected="true"><img src="../assets/images/habits.png" style="height:19px; width:19px; margin:5px;">Habits</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" 
            aria-controls="nav-profile" aria-selected="false"><img src="../assets/images/todo.png" style="height:19px; width:19px; margin:5px;">To-do</button>
          </div>
          <div class="tab-content custom-tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="container" style="height:500px; width:100%; overflow-y: scroll; position: relative; background-color:gainsboro;">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Add a new habit" style="margin-top:10px;">
              </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="container" style="height:500px; width:100%; overflow-y: scroll; position: relative; background-color:gainsboro;">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Add a new habit" style="margin-top:10px;">
              </div>
            </div>
          </div>
        </nav>
      </div>
      <div class="card shadow  text-white bg-dark" style="margin-top:30px;">
        <div class="card-header">
          <h4>Foods</h4>
        </div>
        <div class="row no-gutters">
          <div class="col-md-12">
          </div>
          <div class="counter">
            <div class="row">
              <div class="col-3 col-lg-3">
                <div class="count-data text-center">
                  <img src="../assets/foods/strawberry.png" width="30px">
                  <p class="m-0px font-w-300">Strawberry x0</p>
                </div>
              </div>
              <div class="col-3 col-lg-3">
                <div class="count-data text-center">
                  <img src="../assets/foods/donut.png" width="30px">
                  <p class="m-0px font-w-300">Donut x0</p>
                </div>
              </div>
              <div class="col-3 col-lg-3">
                <div class="count-data text-center">
                  <img src="../assets/foods/squid.png"width="30px">
                  <p class="m-0px font-w-300">Squid x0</p>
                </div>
              </div>
              <div class="col-3 col-lg-3">
                <div class="count-data text-center">
                  <img src="../assets/foods/ramen.png" width="30px">
                  <p class="m-0px font-w-300">Ramen x0</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  </div>

  <script src="js/bootstap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>


</html>