<?php
    include '../connection.back.php';
    include '../pet.back.php';
    include '../currency.back.php';
    include '../food.back.php';
    include '../wallpaper.back.php';
    include '../task.back.php';
    include '../habit.back.php';
    include '../level.back.php';

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
        case 'refreshStatsHeader':
            refreshStatsHeader();
            break;

        case 'refreshFood':
            refreshFood();
            break;

        case 'refreshInventory':
            refreshInventory();
            break;
            
        case 'refreshPetImg':
            refreshPetImg();
            break;
        
        case 'refreshWallpaper':
            refreshWallpaper();
            break;

        case 'refreshTask':
            refreshTask();
            break;

        case 'refreshHabit':
            refreshHabit();
            break;
    }

    function refreshStatsHeader () {
        $userID = $_SESSION['userID'];

        $pet = new Pet();

        $petData = $pet->getEquippedPet($userID);
        $petID = $petData['petID'];
        $petName = $petData['petName'];
        $petImg = $petData['petImg'];
        $petHealthTol = $petData['petHealthTol'];
        $petHappTol = $petData['petHappTol'];
        $petXP = $petData['petXP'];
        $petLevel = $petData['petLevel'];
        $petHealthCur = $petData['petHealthCur'];
        $petHappCur = $petData['petHappCur'];

        $currency = new Currency();

        $currencyNum = $currency->getCurrency($userID);

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $today = date("l, j F Y");

        $healthBar = $petHealthCur / $petHealthTol * 100;
        $happBar = $petHappCur / $petHappTol * 100;

        $level = new Level();
        $level->checkHappReset($userID, $petData['petID']);

        echo 
        "<div class='row py-4'>
            <div class='card flex-row flex-wrap' style='padding: 10px; background-color: white; color: black;'>
                <div class='card-header border-0'>";

        if (checkPetLevel()<=0){
            echo "
                    <img src='../assets/images/dead.png' style='margin: 20px -10px 0px; width: 80px; aspect-ratio: 1/1;'>
                </div>
                <div class='card-block px-3 col-3'>
                    <h5>$petName</h5>
                    <h4>Your Pet has Died!</h4>
                    <img src='../assets/images/coin.png' style='width: 28px; margin-bottom: 5px; padding: 5px 4px 5px 0px;'><span style='font-size: 20px; margin-right: 4px;'>200</span>
                    <button class='btn btn-danger' onclick='revivePet({$userID}, {$petID})' style='margin-bottom: 5px; height: fit-content; font-size: 16px;'>Revive Pet</button>
                </div>
                <div class='card-block px-3 col-2'></div>
            
                <div class='card-block px-3 col-2'>
                    <img src='../assets/images/coin.png' style='width: 28px; margin: 10px;'><span style='font-size: 20px;'>$currencyNum</span>
                    <h4>$today</h4>
                </div>
            </div>
        </div>";

        }else{
            echo "
                    <img src='$petImg' style='margin: 20px -10px 0px; width: 120px; aspect-ratio: 1.6/1;'>
                </div>
                <div class='card-block px-3 col-3'>
                    <h5>$petName</h5>
                    <img src='../assets/images/level.png' style='height: 13px; width: 13px; margin: 5px;'></i>Level: $petLevel<br>
                    <div class='progress' style='height:3px;'>
                        <div class='progress-bar bg-info' role='progressbar' style='width: $petXP%' aria-valuemin='0' aria-valuemax='100'></div>
                    </div>

                    <img src='../assets/images/health.png' style='height: 13px; width: 13px; margin: 5px;'>Health: $petHealthCur/$petHealthTol<br>
                    <div class='progress' style='height:3px;'>
                        <div class='progress-bar bg-danger' role='progressbar' style='width: $healthBar%' aria-valuemin='0' aria-valuemax='$petHealthTol'></div>
                    </div>

                    <img src='../assets/images/hunger.png' style='height: 13px; width: 13px; margin: 5px;'>Happiness: $petHappCur/$petHappTol<br>
                    <div class='progress' style='height:3px;'>
                        <div class='progress-bar bg-warning' role='progressbar' style='width: $happBar%' aria-valuemin='0' aria-valuemax='$petHappTol'></div>
                    </div>
                </div>

                <div class='card-block px-3 col-2'></div>
            
                <div class='card-block px-3 col-2'>
                    <img src='../assets/images/coin.png' style='width: 28px; margin: 10px;'><span style='font-size: 20px;'>$currencyNum</span>
                    <h4>$today</h4>
                </div>
            </div>
        </div>";
        }            
    }

    function refreshFood () {

        $pet = new Pet();
        $petData = $pet->getEquippedPet($_SESSION['userID']);

        $petID = $petData['petID'];

        $userID = $_SESSION['userID'];

        $foodData = new Food();

        $stmt = $foodData->getFoodDetails($userID);

        $foodCount = 0;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($row['foodNum'] != 0) {
                echo 
                "<div class='col-3 col-lg-3'>
                    <div class='count-data text-center' style='font-size: 20px;'>
                        <button class='foodCounter' onclick='decreaseFood_one(".$row['userID'].", ".$row['foodID'].", $petID)'>
                            <img src='"
                            .$row['foodImg'] . 
                            "' width='30px'>
                            <p class='m-0px font-w-300'>".$row['foodName']. 
                            " x "
                            .$row['foodNum']."</p>
                        </button>
                    </div>
                </div>";
            }
            $foodCount += $row['foodNum'];
        }
        if ($foodCount == 0) {
            echo "
            <div style='height: 60px;'>
                <p style='font-size: 22px; margin-left: 20px; font-weight: 400; margin-top: 10px;'>Your food storage is empty :(</p>
            </div>";
        }
    }

    function refreshInventory() {
        $userID = $_SESSION['userID'];
        
        $petData = new Pet();
        $wallpaperData = new Wallpaper();

        $stmt = $petData->showPetInventory($userID);
        $stmt2 = $wallpaperData->getUserWallpapers($userID);

        echo "<div class='row'>
                <div clas='col-12 d-flex justify content center'>
                    <h3>Owned Pets</h3>
                </div>";
        foreach ($stmt as $row) { 

            // check if the pet is equipped
            $isEquipped = ($row['petStatus'] == 'Equipped');

            // print the pet information and the "Equip" button
            echo "
                <div class='col-md-3 px-3 py-3'>
                    <div class='card'>
                        <img src='{$row['petImg']}' class='card-img-top' width='120'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['petName']}</h5>
                            <button class='btn btn-primary' onclick='equipPet({$userID}, {$row['petID']})' style='border: none; " .($isEquipped ? "background-color: black;' disabled>Equipped" : "'>Equip"). "</button>
                        </div>
                    </div>
                </div>
            ";
        }
        echo "</div>";

        echo "<div class='row'>
                <div clas='col-12 d-flex justify content center'>
                    <h3>Owned Wallpapers</h3>
                </div>";
        foreach ($stmt2 as $row2) {

            // check if the wallpaper is equipped
            $isEquipped2 = ($row2['wallpaperStatus'] == 'Equipped');

            // print the wallpaper information and the "Equip" button
            echo "
                <div class='col-md-3 px-3 py-3'>
                    <div class='card'>
                        <img src='{$row2['wallpaperImg']}' class='card-img-top' width='120'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row2['wallpaperName']}</h5>
                            <button class='btn btn-primary' onclick='equipWallpaper({$userID}, {$row2['wallpaperID']})' style='border: none; " .($isEquipped2 ? "background-color: black;' disabled>Equipped" : "'>Equip"). "</button>
                        </div>
                    </div>
                </div>
            ";
        }
        echo "</div>";
    }

    function refreshPetImg(){
        $userID = $_SESSION['userID'];

        $pet = new Pet();
        $petData = $pet->getEquippedPet($userID);
        $petImg = $petData['petImg'];

        if (checkPetLevel()<=0){
            echo ' <img src="../assets/images/dead.png" style="width: auto; height: 200px;">';

        }else{
            echo ' <img src="' .$petImg. '" style="width: auto; height: 200px;">';
        }
    }
    
    function refreshWallpaper() {
        $userID = $_SESSION['userID'];

        $wallpaper = new Wallpaper();
        $wallpaperData = $wallpaper->getEquippedWallpaper($userID);
        $imageUrl = $wallpaperData['wallpaperImg'];
        
        echo json_encode(array('imageUrl' => $imageUrl));
    }

    function refreshTask() {
        $userID = $_SESSION['userID'];

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $today = date("Y-m-d");
        
        $taskData = new Task();
        $status = $_POST['status'];

        $stmt = $taskData->getUserTasks($userID, $status);

        $btnFlag1 = "";
        $btnFlag2 = "";

        if ($status == "Active") {
            $btnFlag1 = "active";

        } else if ($status == "Completed") {
            $btnFlag2 = "active";
        }

        echo "
            <style>
                .task-nav-btn button.active {
                    background-color: #212529;
                }

                .option-menu a:hover {
                    background-color: #dcdcdc;
                }

                .option-menu a:active {
                    color: black;
                }

                .task-checkbox {
                    border: 1px solid #5c636a;
                }
            </style>

            <h3><img src='../assets/images/task.png' width='30' style='margin-right: 10px;'>To-Do's</h3>
            <div class='container' style='height: 500px; width: 100%; overflow-y: scroll; position: relative; background-color: #A4A4A4; border-radius: 6px; display: flex; flex-direction: column;'>";

        if ($status == "Active") {
            echo "
                <input type='text' class='form-control' id='taskTitle' name='taskTitle' placeholder='Add a new task' style='margin-top: 10px; font-size: 18px;' autocomplete='off'>";
        }

        if ($status == "Completed"){
            echo "
                <div class='row d-flex justify-content-center px-2 py-2'>
                    <button type='button' class='btn btn-danger' style='margin-top: 2px; margin-bottom: -8px; width: 98.4%;' onclick='deleteCompletedTasks($userID)'>Delete Completed Tasks</button>
                </div>";
        }

        echo "
                <div class='btn-group justify-content-end task-nav-btn' style='margin-top: 10px;'>
                    <button type='button' id='active-btn' class='btn btn-secondary $btnFlag1'>Active</button>
                    <button type='button' id='completed-btn' class='btn btn-secondary $btnFlag2'>Completed</button>
                </div>";

        // check if there are any tasks
        if (count($stmt) > 0){
        
            foreach ($stmt as $row) {

                $formattedDate = date("d-M-Y", strtotime($row['taskDue']));

                if ($row['taskStatus'] == "Active" && $status == "Active") {
                    echo "
                    <div class='card' style='margin-top: 10px;'>
                        <div class='card-body'>
                            <div class='row align-items-center'>
                                <div class='col-2 d-flex justify-content-center align-items-center'>
                                    <div class='form-check'>
                                        <input class='form-check-input task-checkbox' type='checkbox' value='' id='task{$row['taskID']}' style='padding: 10px;' data-task-id='{$row['taskID']}'>
                                        <label class='form-check-label' for='task{$row['taskID']}'></label>
                                    </div>
                                </div>
                                <div class='col-8 flex-grow-1'>
                                    <h5 class='card-title' style='margin-bottom: -4px; font-size: 20px; font-weight: 400;'>{$row['taskTitle']}</h5>";
                                    if ($row['taskDesc'] != "") {
                                        echo "
                                        <div style='margin-bottom: 2px;'>
                                            <p class='card-text text-muted'>{$row['taskDesc']}</p>
                                        </div>";
                                    } else {
                                        echo "
                                        <div style='margin-top: 6px;'>";
                                    }
                                    echo "
                                    <p class='card-text'>Due on: &nbsp; &nbsp;<span class='card-text text-muted'>$formattedDate</span></p>";
                                    if ($row['taskDesc'] == "") {
                                        echo "
                                        </div>";
                                    }
                                    echo 
                                    "</div>
                                <div class='col-2 text-right'>
                                    <div class='dropdown'>
                                        <a href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                            <i class='fa-solid fa-ellipsis-h fa-xl dropdown-opt' style='color: #212529;'></i>
                                        </a>
                                        <ul class='dropdown-menu option-menu' aria-labelledby='dropdownMenuLink'>
                                            <li><a class='dropdown-item' href='edit' data-bs-target='#editTask{$row['taskID']}' data-bs-toggle='modal'>Edit</a></li>
                                            <li><a class='dropdown-item' href='#' onclick='deleteTask({$row['taskID']})'>Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class='modal fade' id='editTask{$row['taskID']}' tabindex='-1' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                                <div class='row'>
                                    <div class='col-12 d-flex justify-content-center px-2 py-2'>
                                        <h2>Edit Task</h2>
                                    </div>

                                    <form>
                                        <div class='col-12 px-2'>
                                            <label for='editTaskTitle{$row['taskID']}'>Title</label>
                                        </div>
                                        <div class='col-12 d-flex justify-content-center px-2'>
                                            <input type='text' class='form-control' id='editTaskTitle{$row['taskID']}' value='{$row['taskTitle']}' required>
                                        </div>
                                        <div class='col-12 px-2'>
                                            <label for='editTaskDesc{$row['taskID']}' style='margin-top: 10px;'>Description</label>
                                        </div>
                                        <div class='col-12 d-flex justify-content-center px-2'>
                                            <textarea class='form-control' id='editTaskDesc{$row['taskID']}' rows='4' style='resize: none; overflow-y: scroll;'>{$row['taskDesc']}</textarea>
                                        </div>
                                        <div class='col-12 px-2'>
                                            <label for='editTaskDue{$row['taskID']}' style='margin-top: 10px;'>Due Date</label>
                                        </div>
                                        <div class='col-12 d-flex justify-content-center px-2'>
                                            <input type='date' min='$today' class='form-control' id='editTaskDue{$row['taskID']}' value='{$row['taskDue']}'>
                                        </div>

                                        <center><button type='button' class='btn btn-link' data-bs-dismiss='modal' onclick='deleteTask({$row['taskID']})'>Delete this task?</button></center>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='submit' class='btn btn-dark' data-bs-dismiss='modal'>Cancel</button>
                                    <button type='submit' class='btn btn-primary' data-bs-dismiss='modal' onclick='updateTask({$row['taskID']})'>Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.getElementById('task{$row['taskID']}').addEventListener('change', function(event) {
                            var taskID = event.target.dataset.taskId;
                            var taskStatus = event.target.checked ? 'Completed' : 'Active';
                            updateTaskStatus(taskID, taskStatus);
                            taskReward();
                        });
                    </script>";
                }
                if ($row['taskStatus'] == "Completed" && $status == "Completed") {
                    echo "
                    <div class='card' style='margin-top: 10px;'>
                        <div class='card-body'>
                            <div class='row align-items-center'>
                                <div class='col-12 flex-grow-1'>
                                <h5 class='card-title' style='margin-bottom: -4px; font-size: 20px; font-weight: 400;'>{$row['taskTitle']}</h5>";
                                if ($row['taskDesc'] != "") {
                                    echo "
                                    <div style='margin-bottom: 2px;'>
                                        <p class='card-text text-muted'>{$row['taskDesc']}</p>
                                    </div>";
                                } else {
                                    echo "
                                    <div style='margin-top: 6px;'>";
                                }
                                echo "
                                <p class='card-text'>Due on: &nbsp; &nbsp;<span class='card-text text-muted'>$formattedDate</span></p>";
                                if ($row['taskDesc'] == "") {
                                    echo "
                                    </div>";
                                }
                                echo 
                                "</div>
                            </div>
                        </div>
                    </div>";
                }
            }
        } else {
            echo "
            <div class='row'>
                <div class='col-12 d-flex justify-content-center px-2 py-2'>
                    <p style='padding-top: 28%; font-size: 24px; font-weight: 400; color: #e9e9e9;'>You have no tasks yet :)</p>
                </div>
            </div>";
        }
        echo "
            <div style='margin-top: 10px;'></div>
            </div>
        </div>
        
        <script>

            var taskTitle = document.getElementById('taskTitle') ?? {textContent: ''};

            if (taskTitle && taskTitle.tagName === 'INPUT') {
                taskTitle.addEventListener('keypress', function(event) {
                    if (event.key === 'Enter') {
                        // prevent the form from being submitted
                        event.preventDefault();

                        // add task
                        addTask();
                    }
                });
            }

            $('#active-btn').on('click', function() {
                toggleStatus('active');
            });

            $('#completed-btn').on('click', function() {
                toggleStatus('completed');
            });

            function toggleStatus(status) {
                $('#active-btn').removeClass('active');
                $('#completed-btn').removeClass('active');
                $('#' + status + '-btn').addClass('active');

                refreshTask(checkActiveBtn());
            }

            function checkActiveBtn() {
                var activeBtn = document.getElementById('active-btn');
                var completedBtn = document.getElementById('completed-btn');

                if (activeBtn.classList.contains('active')) {
                    return 'Active';

                } else if (completedBtn.classList.contains('active')) {
                    return 'Completed';
                }
            }
        </script>";
    }

    function refreshHabit() {
        $userID = $_SESSION['userID'];

        $habitData = new Habit();
        $stmt = $habitData->getUserHabits($userID);

        echo "
        <style>
            .dropdown-opt {
                display: none;
            }

            .card:hover .dropdown-opt {
                display: inline-block;
            }

            .nature-btn {
                border: none;
                color: white;
                font-size: 18px;
                padding: 4px 12px;
                cursor: pointer;
                transition: 0.2s ease;
                border-radius: 4px;
                opacity: 0.6;
                font-weight: 500;
            }

            .nature-btn:focus {
                outline: none;
            }

            .nature-btn.positive.disabled {
                background-color: #009f65;
                color: white;
            }

            .nature-btn.negative.disabled {
                background-color: #f60b0b;
                color: white;
            }

            .nature-btn.positive:active,
            .nature-btn.negative:active {
                transform: translateY(2px);
            }

            .nature-btn.disabled {
                opacity: 1;
                cursor: default;
            }

            .nature-btn.positive {
                color: #009f65;
                border: 2px solid #009f65;
                background-color: transparent;
                margin-right: 14px;
            }
            .nature-btn.negative {
                color: #f60b0b;
                border: 2px solid #f60b0b;
                background-color: transparent;
            }

            .option-menu a:hover {
                background-color: #dcdcdc;
            }

            .option-menu a:active {
                color: black;
            }

            select#difficulty {
                background-image: url('../assets/images/arrow.png');
                background-repeat: no-repeat;
                background-position: right 10px center;
                background-size: 10px;
            }

            .nature-opt i:not(#disabled):hover {
                opacity: 0.8;
                transition: 0.2s ease;
                transform: translateY(-2px);
                cursor: pointer;
            }
        </style>";

        // check if there are any habits
        if (count($stmt) > 0){

            foreach ($stmt as $row) {

                $difficultyID = $row['difficultyID'];

                if ($difficultyID == 1) {
                    $difficultyTitle = "Easy ✦ ";

                } else if ($difficultyID == 2) {
                    $difficultyTitle = "Medium ✦ ✦ ";

                } else if ($difficultyID == 3) {
                    $difficultyTitle = "Hard ✦ ✦ ✦ ";
                }

                $btnPositive = ($row['habitPositive'] == 1) ? "true" : "false";
                $btnNegative = ($row['habitNegative'] == 1) ? "true" : "false";

                $btnPositiveClick = ($row['habitPositive'] == 1) ? "color: #009f65;' onclick='habitReward($difficultyID)'" : "color: #b7b7b7' id='disabled'";
                $btnNegativeClick = ($row['habitNegative'] == 1) ? "color: #f60b0b;' onclick='habitPenalize($difficultyID)''" : "color: #b7b7b7' id='disabled'";

                echo "
                <style>
                    select#difficulty{$row['habitID']} {
                        background-image: url('../assets/images/arrow.png');
                        background-repeat: no-repeat;
                        background-position: right 10px center;
                        background-size: 10px;
                    }
                </style>

                <div class='card' style='margin-top: 10px;'>
                    <div class='card-body'>
                        <div class='row align-items-center'>
                            <div class='col-2 d-flex justify-content-center align-items-center nature-opt'>
                                <i class='fa-sharp fa-solid fa-circle-plus fa-xl' style='font-size: 30px; $btnPositiveClick></i>
                            </div>

                            <div class='col-8 flex-grow-1'>
                                <div class='row align-items-center'>
                                    <div class='col-10'>
                                        <h5 class='card-title' style='margin-bottom: -4px; font-size: 20px; font-weight: 400;'>{$row['habitTitle']}</h5>";
                                        if ($row['habitDesc'] != "") {
                                            echo "
                                            <div style='margin-bottom: 2px;'>
                                                <p class='card-text text-muted'>{$row['habitDesc']}</p>
                                            </div>";
                                        } else {
                                            echo "
                                            <div style='margin-top: 6px;'>";
                                        }
                                        echo "
                                        <p class='card-text'>Difficulty: &nbsp; &nbsp;<span class='card-text text-muted'>$difficultyTitle</span></p>";
                                        if ($row['habitDesc'] == "") {
                                            echo "
                                            </div>";
                                        }
                                    echo "
                                    </div>

                                    <div class='col-1 text-right'>
                                        <div class='dropdown'>
                                            <a href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                                <i class='fa-solid fa-ellipsis-h fa-xl dropdown-opt' style='color: #212529;'></i>
                                            </a>

                                            <ul class='dropdown-menu option-menu' aria-labelledby='dropdownMenuLink'>
                                                <li><a class='dropdown-item' href='edit' data-bs-target='#editHabit{$row['habitID']}' data-bs-toggle='modal'>Edit</a></li>
                                                <li><a class='dropdown-item' href='#' onclick='deleteHabit({$row['habitID']})'>Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class='col-2 nature-opt'>
                                <i class='fa-solid fa-circle-minus fa-xl' style='font-size: 30px; $btnNegativeClick'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='modal fade' id='editHabit{$row['habitID']}' aria-hidden='true' tabindex='-1'>
                    <div class='modal-dialog modal-dialog-centered'>
                        <div class='modal-content'>
                            <div class='row'>
                                <div class='col-12 d-flex justify-content-center px-2 py-2'>
                                    <h2>Edit Habit</h2>
                                </div>

                                <form>
                                    <div class='col-12 px-2'>
                                        <label for='editHabitTitle{$row['habitID']}'>Title</label>
                                    </div>
                                    <div class='col-12 d-flex justify-content-center px-2'>
                                        <input type='text' class='form-control' id='editHabitTitle{$row['habitID']}' value='{$row['habitTitle']}' required>
                                    </div>
                                    <div class='col-12 px-2'>
                                        <label for='editHabitDesc{$row['habitID']}' style='margin-top: 10px;'>Description</label>
                                    </div>
                                    <div class='col-12 d-flex justify-content-center px-2'>
                                        <textarea class='form-control' id='editHabitDesc{$row['habitID']}' rows='4' style='resize: none; overflow-y: scroll;'>{$row['habitDesc']}</textarea>
                                    </div>

                                    <div class='col-12 d-flex justify-content-center px-2 py-2'>
                                        <input type='hidden' id='naturePositive{$row['habitID']}' value='$btnPositive'>
                                        <button type='button' class='nature-btn positive' id='togglePositive{$row['habitID']}' onclick='toggleNature{$row['habitID']}(\"positive\")'>Positive</button>

                                        <input type='hidden' id='natureNegative{$row['habitID']}' value='$btnNegative'>
                                        <button type='button' class='nature-btn negative' id='toggleNegative{$row['habitID']}' onclick='toggleNature{$row['habitID']}(\"negative\")'>Negative</button>
                                    </div>
                                    
                                    <div class='col-12 px-2'>
                                        <label for='difficulty'>Difficulty </label>
                                    </div>
                                    <div class='col-12 px-2'>
                                        <select class='form-control' id='difficulty{$row['habitID']}'>
                                            <option value='1' "; if ($difficultyID == 1) {
                                                echo 'selected';
                                            }
                                            echo
                                            ">Easy ✦ </option>
                                            <option value='2' "; if ($difficultyID == 2) {
                                                echo 'selected';
                                            }
                                            echo
                                            ">Medium ✦ ✦ </option>
                                            <option value='3' "; if ($difficultyID == 3) {
                                                echo 'selected';
                                            }
                                            echo
                                            ">Hard ✦ ✦ ✦ </option>
                                        </select>
                                    </div>
                                    <center><button type='button' class='btn btn-link' data-bs-dismiss='modal' onclick='deleteHabit({$row['habitID']})'>Delete this task?</button></center>
                                </form>
                            </div>

                            <div class='modal-footer'>
                                <button type='submit' class='btn btn-dark' data-bs-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary' data-bs-dismiss='modal' onclick='updateHabit({$row['habitID']})'>Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    var btnPositive = document.getElementById('naturePositive{$row['habitID']}').value;
                    var btnNegative = document.getElementById('natureNegative{$row['habitID']}').value;

                    if (btnPositive === 'true') {
                        document.getElementById('togglePositive{$row['habitID']}').classList.add('disabled');
                    }

                    if (btnNegative === 'true') {
                        document.getElementById('toggleNegative{$row['habitID']}').classList.add('disabled');
                    }

                    function toggleNature{$row['habitID']}(nature) {
                        var currentNature = nature;

                        const togglePositive = document.getElementById('togglePositive{$row['habitID']}');
                        const toggleNegative = document.getElementById('toggleNegative{$row['habitID']}');

                        const naturePositive = document.getElementById('naturePositive{$row['habitID']}');
                        const natureNegative = document.getElementById('natureNegative{$row['habitID']}');

                        if (currentNature === 'positive') {
                            if (togglePositive.classList.contains('disabled')) {
                                togglePositive.classList.remove('disabled');
                                naturePositive.value = 'false';

                            } else {
                                togglePositive.classList.add('disabled');
                                naturePositive.value = 'true';
                            }

                        } else if (currentNature === 'negative') {
                            if (toggleNegative.classList.contains('disabled')) {
                                toggleNegative.classList.remove('disabled');
                                natureNegative.value = 'false';

                            } else {
                                toggleNegative.classList.add('disabled');
                                natureNegative.value = 'true';
                            }
                        }
                    }
                </script>";
            }
        } else {
            echo "
            <div class='row'>
                <div class='col-12 d-flex justify-content-center px-2 py-2'>
                    <p style='padding-top: 39%; font-size: 24px; font-weight: 400; color: #e9e9e9;'>Record your first habit!</p>
                </div>
            </div>";
        }
    }

    function checkPetLevel() {
        $userID = $_SESSION['userID'];

        $pet = new Pet();

        $petData = $pet->getEquippedPet($userID);

        $petID = $petData['petID'];

        // check pet level
        $level = new Level();
        $petLevel = $level->checkLevel($userID, $petID);
        return $petLevel;
    }
?>