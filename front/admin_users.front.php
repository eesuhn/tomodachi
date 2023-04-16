<?php
    session_start();
    include '../back/connection.back.php';
    include '../back/pet.back.php';
    include '../back/currency.back.php';
    include '../back/admin.back.php';
    
    $adminID = $_SESSION['adminID'];
    $adminName = $_SESSION['adminName'];
    
    $users = new Admin();
    $users = $users->getAllUsers();
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

    <script src="../assets/js/action/admin_users.action.js"></script>
    <script src="../assets/js/toast.js"></script>
</head>

<body style="background-color: #f1f1f1;">

    <div class="sidebar">
        <div class="logo">
            <img src="../assets/images/logo2.png" alt="My Website Logo">
        </div>
        <a href="admin_dashboard.front.php">Home</a>
        <a class="active" href="admin_users.front.php">Manage Users</a>
        <div class="logout">
            <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
        </div>
    </div>

    <div class="content vh-100">
        <table class="table mx-4 my-4">
            <thead class="thead-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            foreach ($users as $user) {
            ?>
                <tbody>
                    <td><?= $user['userID'] ?></td>
                    <td><?= $user['userName'] ?></td>
                    <td><?= $user['userEmail'] ?></td>
                    <td><button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#showPassword<?= $user['userID'] ?>">Show Password</button></td>
                    <td><button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editUser<?= $user['userID'] ?>">Edit</button></td>
                </tbody>

                <!-- Modal -->
                <div class="modal fade" id="showPassword<?= $user['userID'] ?>" tabindex="-1" role="dialog" aria-labelledby="showPasswordLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showPasswordLabel">User Password</h5>
                            </div>
                            <div class="modal-body">
                                <?= $user['userPwd'] ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editUser<?= $user['userID'] ?>" tabindex="-1" role="dialog" aria-labelledby="showPasswordLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div style="margin-top: 20px;"></div>
                            <div class="form-outline mb-4 mx-4 my-1">
                                <input type="text" id="userID" name="id" class="form-control form-control-lg" value="<?= $user['userID'] ?>" readonly />
                                <label class="form-label" for="email" style="font-size: large;">User ID</label>
                            </div>
                            <div class="form-outline mb-4 mx-4 my-1">
                                <input type="text" id="username" name="name" class="form-control form-control-lg" value="<?= $user['userName'] ?>" />
                                <label class="form-label" for="text" style="font-size: large;">Password</label>
                            </div>
                            <div class="form-outline mb-4 mx-4 my-1">
                                <input type="email" id="email" name="email" class="form-control form-control-lg" value="<?= $user['userEmail'] ?>" />
                                <label class="form-label" for="email" style="font-size: large;">Email</label>
                            </div>
                            <div class="form-outline mb-4 mx-4 my-1">
                                <input type="password" id="password" name="password" class="form-control form-control-lg" value="<?= $user['userPwd'] ?>" />
                                <label class="form-label" for="password" style="font-size: large;">Password</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                            <center><button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width: 50%; margin: 10px;">Delete this account?</button></center>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </table>
    </div>

    <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>

</html>