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
            <img src="../assets/images/logo2.png" alt="My Website Logo">
        </div>
        <a href="admin_dashboard.front.php">Home</a>
        <a class="active" href="admin_users.front.php">Manage Users</a>
        <div class="logout">
            <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
        </div>
    </div>

    <div class="content vh-100">
        <div style="margin: 30px 0px 10px 30px;">
            <h3 style="font-size: 40px; font-weight: 400;">Manage Users</h3>
        </div>
        <div>
            <style>
                thead th {
                    font-size: 26px;
                    letter-spacing: 1px;
                }

                tbody td {
                    font-size: 24px;
                }

                .edit-btn {
                    font-size: 22px;
                    margin-top: -8px;
                }
            </style>
            <table class="table mx-4 my-4">
                <thead class="thead-primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>User ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>
                            <button type="button" class="btn btn-link edit-btn" data-bs-toggle="modal" data-bs-target="#editUser">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class='modal fade' id='editUser' aria-hidden='true' tabindex='-1'>
                <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content'>
                        <div class='row'>
                            <div class='col-12 d-flex justify-content-center px-2 py-2'>
                                <h2>Edit User</h2>
                            </div>

                            <form>
                                <div class='col-12 px-2'>
                                    <label for='editUserName'>Username</label>
                                </div>
                                <div class='col-12 d-flex justify-content-center px-2'>
                                    <input type='text' class='form-control' id='editUserName' value='' required>
                                </div>
                                <div class='col-12 px-2'>
                                    <label for='editUserEmail' style='margin-top: 10px;'>Email</label>
                                </div>
                                <div class='col-12 d-flex justify-content-center px-2'>
                                    <input type='text' class='form-control' id='editUserEmail' value='' required>
                                </div>
                                <div class='col-12 px-2'>
                                    <label for='editUserPwd' style='margin-top: 10px;'>Password</label>
                                </div>
                                <div class='col-12 d-flex justify-content-center px-2'>
                                    <input type='text' class='form-control' id='editUserPwd' value='' required>
                                </div>
                                <div class='col-12 px-2'>
                                    <label for='editUserCurrency' style='margin-top: 10px;'>Currency Owned</label>
                                </div>
                                <div class='col-12 d-flex justify-content-center px-2'>
                                    <input type='text' class='form-control' id='editUserCurrency' value='' required>
                                </div>
                                <center><button type='button' class='btn btn-link' data-bs-dismiss='modal' onclick=''>Remove this user?</button></center>
                            </form>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' class='btn btn-dark' data-bs-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-primary' data-bs-dismiss='modal' onclick=''>Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>

</html>