<?php
    include '../back/connection.back.php';
    include '../back/pet.back.php';
    include '../back/currency.back.php';
    include '../back/admin.back.php';
    include '../back/food.back.php';
    include '../back/wallpaper.back.php';

    $adminID = $_SESSION['adminID'];
    $adminName = $_SESSION['adminName'];

    $petData = new Pet();

    $petData_legendary = $petData->showPetDetails_rarity('Legendary');
    $petData_rare = $petData->showPetDetails_rarity('Rare');
    $petData_common = $petData->showPetDetails_rarity('Common');
    $foodData = new Food();
    $foodShop = $foodData->getShopFoods($userID);
    $wallpaperData = new Wallpaper();
    $userCurrency = new Currency();
    $currencyNum = $userCurrency->getCurrency($userID);
    $wallpaperShop = $wallpaperData->getAllWallpapers();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/0fa65bfd04.js" crossorigin="anonymous"></script>

    <script src="../assets/js/data/dashboard.data.js"></script>
    <script src="../assets/js/action/dashboard.action.js"></script>
    <script src="../assets/js/toast.js"></script>
</head>

<body style="background-color: #f1f1f1;">

    <div class="sidebar">
        <div class="logo">
            <img src="../assets/images/logo2.png" alt="My Website Logo">
        </div>
        <a class="active" href="#home">Home</a>
        <a href="admin_users.front.php">Manage Users</a>
        <div class="logout">
            <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
        </div>
    </div>

    <div class="content vh-100">
        <div class="row d-flex justify-content-center mx-4 my-4">
            <div class="col-12">
                <center>
                    <h3>Welcome back, <?= $adminName ?></h3>
                </center>
            </div>
            <div class="col-md-4 py-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>120</h3>
                                    <span>Total Number of Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>5</h3>
                                    <span>Total Number of Pets</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>124</h3>
                                    <span>Total Number of Food Items</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>120</h3>
                                    <span>Total To-Dos Completed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>5</h3>
                                    <span>Total Number of Positive Habits Done</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>124</h3>
                                    <span>Total Time in Study Mode</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mx-4 my-4">
                <div class="col-12">
                    <center>
                        <h3>Manage Pets</h3>
                    </center>
                </div>
                <div class="col-md-6 py-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-pencil primary font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <a href="#" class="link-primary" data-bs-target="#viewPets" data-bs-toggle="modal">
                                            <h3>View all Pets</h3>
                                        </a>
                                        <span>Check out your available pets</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 py-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-pencil primary font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <a href="#" class="link-primary" data-bs-target="#addPet" data-bs-toggle="modal">
                                            <h3>Add a New Pet</h3>
                                        </a>
                                        <span>Got a new partner to add?</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-4 my-4 d-flex justify-content-center">
                <div class="col-12">
                    <center>
                        <h3>Manage Shop</h3>
                    </center>
                </div>
                <div class="col-md-6 py-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-pencil primary font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <a href="#" class="link-primary" data-bs-target="#manageFood" data-bs-toggle="modal">
                                            <h3>Manage Food Items</h3>
                                        </a>
                                        <span>Adjust food items sold in the shop</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 py-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-pencil primary font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <a href="#" class="link-primary" data-bs-target="#manageWallpaper" data-bs-toggle="modal">
                                            <h3>Manage Wallpapers</h3>
                                        </a>
                                        <span>Adjust wallpapers sold in the shop</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>

    <div class="modal fade" id="viewPets" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="" data-bs-toggle="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPet" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <form id="add_pet" method="POST" action="../includes/admin_dashboard.inc.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="hName">Pet Name</label>
                                <input type="text" class="form-control" id="petName" name="petName" placeholder="Rabbit" required>
                            </div>
                            <label class="form-label" for="accType" name="accType">Select Account Type</label>
                            <select class="form-select" aria-label="form-select" name="petRarity" style="margin-bottom: 10px;">
                                <option selected="Common" value="Common">Common</option>
                                <option value="Rare">Rare</option>
                                <option value="Legendary">Legendary</option>
                            </select>
                            <textarea class="form-control" id="petDesc" name="petDesc" style="height: 100px; resize: none;" required></textarea>
                            <label for="desc">Pet Description</label>
                            <div id="descHelp" class="form-text">Share a little on your pet, make it interesting!</div>
                            <div class="input-group mb-3 py-3">
                                <label class="input-group-text" for="fileUpload">Upload an image of the pet</label>
                                <input type="file" name="fileUpload" id="fileUpload" class="form-control" required>
                            </div>
                            <center><button type="submit" name="addPet" class="btn btn-primary" style="margin: 10px; width: 50%;">Add</button></center>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="manageFood" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <?php
                        foreach ($foodShop as $foodShopData) {
                            echo "
                            <div class='col-md-3 px-3 py-3'>
                            <div class='card h-100'>
                                <div class='dropdown'>
                                <a href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='fa-solid fa-ellipsis-h fa-xl dropdownopt' style='color: gainsboro;'></i>
                                </a>
                                <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                    <li><a class='dropdown-item' href='edit' class='text-muted mr-3' data-bs-target='#editFood{$row['foodID']}' data-bs-toggle='modal'>Edit</a></li>
                                    <li><a class='dropdown-item' href='delete' onclick='deleteFood({$row['foodID']})'>Delete</a></li>
                                </ul>
                                </div>
                            <center><img src='{$foodShopData["foodImg"]}' class='card-img-top' alt='Food Image' style='max-width: 55%;'></center>
                            <div class='card-body d-flex flex-column'>
                                <h5 class='card-title'>{$foodShopData["foodName"]}</h5>
                                <p class='card-text food-stats'>
                                    <img src='../assets/images/level.png' width='20'>{$foodShopData["foodXP"]}
                                    <img src='../assets/images/health.png' width='20'>{$foodShopData["foodHealth"]}
                                    <img src='../assets/images/hunger.png' width='20'>{$foodShopData["foodHapp"]}
                                </p>
                                <h4 class='card-text'><img src='../assets/images/coin.png' width='25' style='margin: -2px 6px 2px 2px;'>{$foodShopData["foodPrice"]}</h4>
                            </div>
                            </div>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFood">Add Food</button>
                    <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addFood" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="add_food" method="POST" action="../includes/admin_dashboard.inc.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="petName">Food Name</label>
                            <input type="text" class="form-control" id="petName" name="petName" placeholder="Sate" required>
                        </div>
                        <label for="desc">Food Description</label>
                        <textarea class="form-control" id="foodDesc" name="petDesc" style="height: 100px; resize: none;" required></textarea>
                        <div class="mb-3">
                            <label for="foodPrice">Food Price</label>
                            <input type="number" class="form-control" id="foodPrice" name="foodPrice" placeholder="Sate" required>
                        </div>
                        <div class="mb-3">
                            <label for="foodXP">Food XP</label>
                            <input type="number" class="form-control" id="foodXP" name="foodXP" placeholder="Sate" required>
                        </div>
                        <div class="mb-3">
                            <label for="foodHealth">Food Health</label>
                            <input type="number" class="form-control" id="foodHealth" name="foodHealth" placeholder="Sate" required>
                        </div>
                        <div class="mb-3">
                            <label for="foodHappiness">Food Happiness</label>
                            <input type="number" class="form-control" id="foodHappiness" name="foodHappiness" placeholder="Sate" required>
                        </div>
                        <div class="input-group mb-3 py-3">
                            <label class="input-group-text" for="fileUpload">Upload an image of the food</label>
                            <input type="file" name="fileUpload" id="fileUpload" class="form-control" required>
                        </div>
                        <center><button type="submit" name="addPet" class="btn btn-primary" style="margin: 10px; width: 50%;">Add</button></center>
                    </form>
                    <div class="modal-footer">
                        <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="manageWallpaper" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <?php
                        foreach ($wallpaperShop as $wallpaperShopData) {
                            echo
                            "<div class='col-md-4 px-3 py-3'>
                            <div class='card h-100'>
                            <div class='dropdown'>
                            <a href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fa-solid fa-ellipsis-h fa-xl dropdownopt' style='color: gainsboro;'></i>
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                <li><a class='dropdown-item' href='edit' class='text-muted mr-3' data-bs-target='#editFood{$row['foodID']}' data-bs-toggle='modal'>Edit</a></li>
                                <li><a class='dropdown-item' href='delete' onclick='deleteFood({$row['foodID']})'>Delete</a></li>
                            </ul>
                            </div>
                            <center><img src='{$wallpaperShopData["wallpaperImg"]}' class='card-img-top' alt='Food Image' style='max-width: 70%; margin-top: 15px;'></center>
                            <div class='card-body d-flex flex-column'>
                                <h5 class='card-title'>{$wallpaperShopData["wallpaperName"]}</h5>
                                <h4 class='card-text'><img src='../assets/images/coin.png' width='25' style='margin: -2px 6px 2px 2px;'>";
                            if ($wallpaperShopData['wallpaperPrice'] == 0) {
                                echo "Free!";
                            } else {
                                echo $wallpaperShopData['wallpaperPrice'];
                            }
                            echo
                            "</h4>
                                <p class='card-text'>{$wallpaperShopData["wallpaperDesc"]}</p>
                            </div>
                        </div>
                    </div>";
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWallpaper">Add Wallpaper</button>
                    <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addWallpaper" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="add_wallpaper" method="POST" action="../includes/admin_dashboard.inc.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="wallpaperName">Wallpaper Name</label>
                            <input type="text" class="form-control" id="wallpaperName" name="wallpaperName" placeholder="Sky" required>
                        </div>
                        <label for="wallpaperDesc">Wallpaper Description</label>
                        <textarea class="form-control" id="wallpaperDesc" name="wallpaperDesc" style="height: 100px; resize: none;" required></textarea>
                        <div class="mb-3">
                            <label for="wallpaperPrice">Wallpaper Price</label>
                            <input type="number" class="form-control" id="wallpaperPrice" name="wallpaperPrice" placeholder="100" required>
                        </div>
                        <div class="input-group mb-3 py-3">
                            <label class="input-group-text" for="fileUpload">Upload an image of the wallpaper</label>
                            <input type="file" name="fileUpload" id="fileUpload" class="form-control" required>
                        </div>
                        <center><button type="submit" name="addPet" class="btn btn-primary" style="margin: 10px; width: 50%;">Add</button></center>
                    </form>
                    <div class="modal-footer">
                        <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>

</html>