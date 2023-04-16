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

    <script src="../assets/js/data/dashboard.data.js"></script>
    <script src="../assets/js/action/dashboard.action.js"></script>
    <script src="../assets/js/toast.js"></script>

</head>

<body style="background-color:#f1f1f1;">

    <div class="sidebar">
        <div class="logo">
            <img src="../assets/images/logo2.png" alt="My Website Logo">
        </div>
        <a href="admindashboard.front.php">Home</a>
        <a class="active" href="adminusers.front.php">Manage Users</a>
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
                <td><?=$user['userID']?></td>
                <td><?=$user['userName']?></td>
                <td><?=$user['userEmail']?></td>
                <td><button type="button" class="btn btn-link" onclick="showPassword('<?=$user['userPwd']?>')">Show Password</button></td>
                <td><a href="edit">Edit</a></td>
            </tbody>
            <?php
                }
            ?>
        </table>
    </div>
</body>

</html>