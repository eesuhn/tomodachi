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
    case 'refreshUsers':
        refreshUsers();
        break;
}

function refreshUsers()
{
    $users = new Admin();
    $users = $users->getAllUsers();

    echo '
    <thead class="thead-primary">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Action</th>
    </tr>
    </thead>';

    foreach ($users as $user) {
        echo '
        <tbody>
            <td>' . $user['userID'] . '</td>
            <td>' . $user['userName'] . '</td>
            <td>' . $user['userEmail'] . '</td>
            <td><button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#showPassword' . $user['userID'] . '">Show Password</button></td>
            <td><button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editUser' . $user['userID'] . '">Edit</button></td>
        </tbody>
        ';
    }

    foreach ($users as $user) {
        echo '
    <div class="modal fade" id="showPassword' . $user['userID'] . '" tabindex="-1" role="dialog" aria-labelledby="showPasswordLabel' . $user['userID'] . '" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showPasswordLabel' . $user['userID'] . '">User Password</h5>
            </div>
            <div class="modal-body">
                ' . $user['userPwd'] . '
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="editUser' . $user['userID'] . '" tabindex="-1" role="dialog" aria-labelledby="showPasswordLabel' . $user['userID'] . '" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="margin-top: 20px;"></div>
                <div class="form-outline mb-4 mx-4 my-1">
                    <input type="text" id="userID" name="text" class="form-control form-control-lg" value="' . $user['userID'] . '" readonly/>
                    <label class="form-label" for="email" style="font-size:large;">User ID</label>
                </div>
                <div class="form-outline mb-4 mx-4 my-1">
                    <input type="text" id="username" name="text" class="form-control form-control-lg" value="' . $user['userName'] . '"/>
                    <label class="form-label" for="text" style="font-size:large;">Password</label>
                </div>
                <div class="form-outline mb-4 mx-4 my-1">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" value="' . $user['userPwd'] . '"/>
                    <label class="form-label" for="password" style="font-size:large;">Password</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                    <center><button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width: 50%; margin: 10px;">Delete this account?</button></center>
                </div>
            </div>
        </div>
    </div>';
    }
}
