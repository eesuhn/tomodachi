<?php
    include '../connection.back.php';
    include '../pet.back.php';
    include '../currency.back.php';
    include '../food.back.php';
    include '../wallpaper.back.php';
    include '../task.back.php';

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
    }

    function refreshStatsHeader () {
        $userID = $_SESSION['userID'];

        $pet = new Pet();

        $petData = $pet->getEquippedPet($userID);

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

        echo 
        "<div class='row px-2 py-4'>
            <div class='card flex-row flex-wrap' style='padding: 10px; background-color: white; color: black;'>
                <div class='card-header border-0'>
                    <img src='$petImg' width='100px' style='margin-top: 30px'>
                </div>
                <div class='card-block px-3 col-4'>
                    <h5>$petName</h5>
                    <img src='../assets/images/level.png' style='height: 13px; width: 13px; margin: 5px;'></i>Level: $petLevel<br>
                    <div class='progress' style='height:3px;'>
                        <div class='progress-bar bg-info' role='progressbar' style='width: $petXP%' aria-valuemin='0' aria-valuemax='100'></div>
                    </div>

                    <img src='../assets/images/health.png' style='height: 13px; width: 13px; margin: 5px;'>Health: $petHealthCur/$petHealthTol<br>
                    <div class='progress' style='height:3px;'>
                        <div class='progress-bar bg-danger' role='progressbar' style='width: $petHealthCur%' aria-valuemin='0' aria-valuemax='$petHealthTol'></div>
                    </div>

                    <img src='../assets/images/hunger.png' style='height: 13px; width: 13px; margin: 5px;'>Happiness: $petHappCur/$petHappTol<br>
                    <div class='progress' style='height:3px;'>
                        <div class='progress-bar bg-warning' role='progressbar' style='width: $petHappCur%' aria-valuemin='0' aria-valuemax='$petHappTol'></div>
                    </div>
                </div>
                
                <div class='card-block px-3 col-4'>
                    <img src='../assets/images/coin.png' style='height: 19px; width: 19px; margin: 10px;'>$currencyNum
                    <h4>$today</h4>
                    <p>0 Tasks Today</p>
                </div>
            </div>
        </div>";
    }

    function refreshFood () {
        $userID = $_SESSION['userID'];

        $foodData = new Food();

        $stmt = $foodData->getFoodDetails($userID);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($row['foodNum'] != 0) {
                echo 
                "<div class='col-3 col-lg-3'>
                    <div class='count-data text-center' style='font-size: 20px;'>
                        <button href='#food' data-bs-target='#food<?=". $row['foodID'] ."?>' 
                        data-bs-toggle='modal' style='text-decoration: none; color: white; background-color: #212529; border: none;'>
                            <img src='"
                            .$row['foodImg'] . 
                            "' width='30px'>
                            <p class='m-0px font-w-300'>".$row['foodName']. 
                            " x "
                            .$row['foodNum']."</p>
                        </button>
                    </div>
                </div>

                <div class='modal fade' id='food<?=" .$row['foodID']. "?>' aria-hidden='true' aria-labelledby='foodTitle' tabindex='-1' style='color:black'>
                    <div class='modal-dialog modal-dialog-centered'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h1 class='modal-title fs-5' id='foodTitle'>Feed ".$row['foodName']."?</h1>
                            </div>

                            <div class='modal-footer'>
                                <button class='btn btn-primary' onclick='decreaseFood_one(".$row['userID'].", ".$row['foodID'].")' data-bs-dismiss='modal'>Yes</button>
                                <button type='button' class='btn btn-dark' data-bs-dismiss='modal'>No</button>
                            </div>
                        </div>
                    </div>
                </div>";
            }
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

        echo ' <img src="' . $petImg . '" style="width: auto; height: 200px;">';
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
        
        $taskData = new Task();
        $status = $_POST['status'];

        $stmt = $taskData->getUserTasks($userID, $status);
    
        foreach ($stmt as $row) {            
    
            echo "
            <div class='card' style='margin-top:10px;'>
                <div class='card-body'>
                    <div class='row align-items-center'>
                        <div class='col-2 d-flex justify-content-center align-items-center'>
                            <div class='form-check'>
                                <input class='form-check-input' type='checkbox' value='' id='task{$row['taskID']}' style='padding: 10px;' data-task-id='{$row['taskID']}' ";

            if ($row['taskStatus'] === "Completed") {
                echo "checked";
            }
            echo ">
                                <label class='form-check-label' for='task{$row['taskID']}'></label>
                            </div>
                        </div>
                        <div class='col-8 flex-grow-1'>
                            <h5 class='card-title'>{$row['taskTitle']}</h5>
                            <p class='card-text' style='margin-bottom: 0;'>{$row['taskDesc']}</p>
                            <p class='card-text text-muted'>Due On: {$row['taskDue']}</p>
                        </div>
                        <div class='col-2 text-right'>
                            <a href='edit' class='text-muted mr-3' data-bs-target='#editTask{$row['taskID']}' data-bs-toggle='modal'><i class='fas fa-edit'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class='modal fade' id='editTask{$row['taskID']}' tabindex='-1' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='editTask'>Update Task</h5>
                        </div>
                        <div class='modal-body'>
                            <form id='task-form-{$row['taskID']}'>
                                <div class='form-group'>
                                    <label for='editTaskTitle{$row['taskID']}'>Task Title</label>
                                    <input type='text' class='form-control' id='editTaskTitle{$row['taskID']}' value='{$row['taskTitle']}'>                                
                                </div>
                                <div class='form-group'>
                                    <label for='editTaskDesc{$row['taskID']}'>Task Description</label>
                                    <textarea class='form-control' id='editTaskDesc{$row['taskID']}' rows='3'>{$row['taskDesc']}</textarea>
                                </div>
                                <div class='form-group'>
                                    <label for='editTaskDue{$row['taskID']}'>Due Date</label>
                                    <input type='date' class='form-control' id='editTaskDue{$row['taskID']}' value='{$row['taskDue']}'>                                
                                </div>
                            </form>
                        </div>
                        <center><button type='button' class='btn btn-link' data-bs-dismiss='modal' onclick='deleteTask({$row['taskID']})'>Delete this task?</button></center>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                            <button type='button' class='btn btn-primary' data-bs-dismiss='modal' onclick='saveTask({$row['taskID']})'>Save</button>
                        </div>
                    </div> 
                </div>
            </div>

            <script>
                document.getElementById('task{$row['taskID']}').addEventListener('change', function(event) {
                    var taskID = event.target.dataset.taskId;
                    var taskStatus = event.target.checked ? 'Completed' : 'Active';
                    updateTaskStatus(taskID, taskStatus);
                });
            </script>";
        }
    }
?>