<?php
    include '../include/admin_dashboard.inc.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tomodachi | Admin</title>
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

    <link rel="shortcut icon" type="image/png" href="../assets/images/logo3.png">
</head>

<body style="background-color: #f1f1f1;">

    <div class="sidebar">
        <div class="logo">
            <img src="../assets/images/logo2.png" alt="Tomodachi">
        </div>
        <a class="active" href="#home">Home</a>
        <a href="admin_users.front.php">Manage Users</a>
        <div class="logout">
            <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
        </div>
    </div>

    <div class="content vh-100">
        <style>
            .admin-text-card span {
                font-size: 20px;
                font-weight: 500;
            }
            .d-flex span {
                font-size: 20px;
                font-weight: 500;
            }
            .col-12 label {
                font-size: 20px;
                font-weight: 500;
            }

            .col-12 input {
                font-size: 18px;
                font-weight: 400;
            }
        </style>
        <div class="row d-flex justify-content-center mx-4 my-4">
            <div class="col-12" style="margin-top: 16px;">
                <center>
                    <h2>Welcome back, <?=$adminName?></h2>
                </center>
            </div>
            <div class="col-md-3 py-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3><?=$userCount?></h3>
                                    <span>Total Number of Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3><?=$petCount?></h3>
                                    <span>Total Number of Pets</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3><?=$foodCount?></h3>
                                    <span>Total Number of Food Items</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3><?=$wallpaperCount?></h3>
                                    <span>Total Number of Wallpapers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mx-4 my-4">
                <div class="col-12" style="margin-top: 16px;">
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
                                    <div class="media-body text-right admin-text-card">
                                        <a class="link-primary" data-bs-target="#viewPets" data-bs-toggle="modal">
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
                                    <div class="media-body text-right admin-text-card">
                                        <a class="link-primary" data-bs-target="#addPet" data-bs-toggle="modal">
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
                        <h3>Manage Foods</h3>
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
                                    <div class="media-body text-right admin-text-card">
                                        <a class="link-primary" data-bs-target="#viewFoods" data-bs-toggle="modal">
                                            <h3>View all Foods</h3>
                                        </a>
                                        <span>Check out your available foods</span>
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
                                    <div class="media-body text-right admin-text-card">
                                        <a class="link-primary" data-bs-target="#addFood" data-bs-toggle="modal">
                                            <h3>Add a New Food</h3>
                                        </a>
                                        <span>Got a new food to add?</span>
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
                        <h3>Manage Wallpapers</h3>
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
                                    <div class="media-body text-right admin-text-card">
                                        <a class="link-primary" data-bs-target="#viewWallpapers" data-bs-toggle="modal">
                                            <h3>View all Wallpapers</h3>
                                        </a>
                                        <span>Check out your available wallpapers</span>
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
                                    <div class="media-body text-right admin-text-card">
                                        <a class="link-primary" data-bs-target="#addWallpaper" data-bs-toggle="modal">
                                            <h3>Add a New Wallpaper</h3>
                                        </a>
                                        <span>Got a new wallpaper to add?</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewPets" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body" id="viewPetsData">
                    <!-- display pets with AJAX -->
                </div>

                <div class="modal-footer">
                    <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPet" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class='modal-content' style="padding: 10px 20px;">
                <form method="POST" enctype="multipart/form-data" action="../include/admin_dashboard.inc.php?action=addPet">
                    <div class='row'>
                        <div class='col-12 d-flex justify-content-center px-2 py-2'>
                            <h2>Add a New Pet</h2>
                        </div>

                        <div class='col-12 px-2'>
                            <label for=''>Pet Name</label>
                        </div>
                        <div class='col-12 d-flex justify-content-center px-2'>
                            <input type='text' class='form-control' id='petName' name='petName' required>
                        </div>
                        <div class='col-12 px-2'>
                            <label for='' style='margin-top: 10px;'>Description</label>
                        </div>
                        <div class='col-12 d-flex justify-content-center px-2'>
                            <textarea class='form-control' id='petDesc' name='petDesc' rows='4' style='resize: none; overflow-y: scroll;' required></textarea>
                        </div>
                        <div class='col-12 px-2'>
                            <label for='' style='margin-top: 10px;'>Rarity </label>
                        </div>
                        <div class='col-12 px-2'>
                            <select class='form-control' id='petRarity' name='petRarity' style='font-size: 18px;'>
                                <option value="Common">Common</option>
                                <option value="Rare">Rare</option>
                                <option value="Legendary">Legendary</option>
                            </select>
                        </div>
                        <div class='col-12 px-2'>
                            <label for='' style='margin-top: 10px;'>Upload an image</label>
                        </div>
                        <div class='col-12 px-2'>
                            <input type='file' class='form-control' id='fileUpload' name='fileUpload' required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Add Pet</button>
                        <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewFoods" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body" id="viewFoodsData">
                    <!-- display foods with AJAX -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addFood" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class='modal-content' style="padding: 10px 20px;">
                <form method="POST" enctype="multipart/form-data" action="../include/admin_dashboard.inc.php?action=addFood">
                    <div class='row'>
                        <div class='col-12 d-flex justify-content-center px-2 py-2'>
                            <h2>Add a New Food</h2>
                        </div>

                        <div class='col-12 px-2'>
                            <label for=''>Food Name</label>
                        </div>
                        <div class='col-12 d-flex justify-content-center px-2'>
                            <input type='text' class='form-control' id='foodName' name='foodName' required>
                        </div>
                        <div class='col-12 px-2'>
                            <label for='' style='margin-top: 10px;'>Description</label>
                        </div>
                        <div class='col-12 d-flex justify-content-center px-2'>
                            <textarea class='form-control' id='foodDesc' name='foodDesc' rows='4' style='resize: none; overflow-y: scroll;' required></textarea>
                        </div>
                        <div class='col-12 px-2'>
                            <label for='' style='margin-top: 10px;'>Price</label>
                        </div>
                        <div class='col-12 d-flex justify-content-center px-2'>
                            <input type='number' class='form-control' id='foodPrice' name='foodPrice' required>
                        </div>
                        <div class='col-12 px-2'>
                            <label for='' style='margin-top: 10px;'>Health Regenerate</label>
                        </div>
                        <div class='col-12 d-flex justify-content-center px-2'>
                            <input type='number' class='form-control' id='foodHealth' name='foodHealth' required>
                        </div>
                        <div class='col-12 px-2'>
                            <label for='' style='margin-top: 10px;'>Happiness Increase</label>
                        </div>
                        <div class='col-12 d-flex justify-content-center px-2'>
                            <input type='number' class='form-control' id='foodHapp' name='foodHapp' required>
                        </div>
                        <div class='col-12 px-2'>
                            <label for='' style='margin-top: 10px;'>Upload an image</label>
                        </div>
                        <div class='col-12 px-2'>
                            <input type='file' class='form-control' id='fileUpload' name='fileUpload' required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Add Food</button>
                        <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewWallpapers" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body" id="viewWallpapersData">
                    <!-- display wallpapers with AJAX -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addWallpaper" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class='modal-content' style="padding: 10px 20px;">
                <form method="POST" enctype="multipart/form-data" action="../include/admin_dashboard.inc.php?action=addWallpaper">
                    <div class='row'>
                        <div class='col-12 d-flex justify-content-center px-2 py-2'>
                            <h2>Add a New Wallpaper</h2>
                        </div>

                        <div class='col-12 px-2'>
                            <label for=''>Wallpaper Name</label>
                        </div>
                        <div class='col-12 d-flex justify-content-center px-2'>
                            <input type='text' class='form-control' id='wallpaperName' name='wallpaperName' required>
                        </div>
                        <div class='col-12 px-2'>
                            <label for='' style='margin-top: 10px;'>Description</label>
                        </div>
                        <div class='col-12 d-flex justify-content-center px-2'>
                            <textarea class='form-control' id='wallpaperDesc' name='wallpaperDesc' rows='4' style='resize: none; overflow-y: scroll;' required></textarea>
                        </div>
                        <div class='col-12 px-2'>
                            <label for='' style='margin-top: 10px;'>Price</label>
                        </div>
                        <div class='col-12 d-flex justify-content-center px-2'>
                            <input type='number' class='form-control' id='wallpaperPrice' name='wallpaperPrice' required>
                        </div>
                        <div class='col-12 px-2'>
                            <label for='' style='margin-top: 10px;'>Upload an image</label>
                        </div>
                        <div class='col-12 px-2'>
                            <input type='file' class='form-control' id='fileUpload' name='fileUpload' required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Add Wallpaper</button>
                        <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
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
                    <a href="../include/admin_logout.inc.php" class="btn btn-primary" role="button" aria-pressed="true">Confirm</a>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/data/admin_dashboard.data.js"></script>
    <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>

</html>