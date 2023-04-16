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
        </style>
        <div class="row d-flex justify-content-center mx-4 my-4">
            <div class="col-12" style="margin-top: 16px;">
                <center>
                    <h2>Welcome back, Admin Name</h2>
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
                                    <h3>Pending</h3>
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
                                    <h3>Pending</h3>
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
                                    <h3>Pending</h3>
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
                                    <h3>Pending</h3>
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
                                    <h3>Pending</h3>
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
                                    <h3>Pending</h3>
                                    <span>Total Time in Study Mode</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mx-4 my-4">
                <div class="col-12" style="margin-top: -6px;">
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
                <div class="col-12" style="margin-top: -6px;">
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
                <div class="col-12" style="margin-top: -6px;">
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- display pets with AJAX -->
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
                    <!-- add pet with AJAX -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-dismiss="modal" onclick="">Add</button>
                    <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewFoods" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
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
            <div class="modal-content">
                <div class="modal-body">
                    <!-- add food with AJAX -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-dismiss="modal" onclick="">Add</button>
                    <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewWallpapers" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
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
            <div class="modal-content">
                <div class="modal-body">
                    <!-- add wallpaper with AJAX -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-dismiss="modal" onclick="">Add</button>
                    <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>

</html>