<?php
    include '../connection.back.php';
    include '../admin.back.php';

    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        
    } else {
        $action = null;
    }

    switch ($action) {
        case 'refreshManageUsers':
            refreshManageUsers();
            break;
    }

    function refreshManageUsers() {
        $admin = new Admin();

        $stmt = $admin->getAllUsers();

        echo "
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

                .modal-content {
                    padding: 20px;
                }
            </style>
            
            <table class='table mx-4 my-4'>
                <thead class='thead-primary'>
                    <tr>
                        <th scope='col'>ID</th>
                        <th scope='col'>Username</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>Action</th>
                    </tr>
                </thead>
                
                <tbody>";

        foreach ($stmt as $row) {

            echo "
                    <tr>
                        <td>User ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>
                            <button type='button' class='btn btn-link edit-btn' data-bs-toggle='modal' data-bs-target='#editUser{$row['userID']}'>Edit</button>
                        </td>
                    </tr>
                    <div class='modal fade' id='editUser{$row['userID']}' aria-hidden='true' tabindex='-1'>
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
                    </div>";
        }
            echo "
                </tbody>
            </table>";
    }
?>