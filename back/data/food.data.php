<?php
    include '../connection.back.php';
    include '../food.back.php';

    $db = new Database();

    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $userID = $_SESSION['userID'];

    /* 
        sql query -> 
        foodName from food table, 
        foodNum from food_inventory table
        based on userID from food_inventory table
        join with foodID from food and food_inventory table
    */
    $sql = 
    "SELECT food.foodName, food.foodImg, food_inventory.foodInID, food_inventory.foodNum FROM food 
    INNER JOIN food_inventory ON food.foodID = food_inventory.foodID WHERE food_inventory.userID = :userID";

    $stmt = $db->connect()->prepare($sql);

    $stmt->bindParam(':userID', $userID);

    $stmt->execute(array(
            ':userID' => $userID));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo 
        "<div class='col-3 col-lg-3'>
            <a href='#food' data-bs-target='#food<?=" 
            . $row['foodInID'] .
            "?>' data-bs-toggle='modal' style='text-decoration: none; color: white'>
            <div class='count-data text-center'>
                <img src='"
                .$row['foodImg'] . 
                "' width='30px'>
                <p class='m-0px font-w-300'>"
                .$row['foodName']. 
                " x"
                .$row['foodNum'] .
                "</p>
            </div>
            </a>
        </div>
        <div class='modal fade' id='food<?=" .$row['foodInID']. "?>' aria-hidden='true' aria-labelledby='foodTitle' tabindex='-1' style='color:black'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h1 class='modal-title fs-5' id='foodTitle'>Feed ".$row['foodName']."?</h1>
                </div>

                <div class='modal-footer'>
                    <button class='btn btn-primary' onclick='decreaseFood_one(".$row['foodInID'].")' data-bs-dismiss='modal'>Yes</button>
                    <button type='button' class='btn btn-dark' data-bs-dismiss='modal'>No</button>
                </div>
                </div>
            </div>
        </div>";
    }

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = null;
    }

    switch ($action) {
        case 'decreaseFood_one':
            decreaseFood_one();
            break;
    }

    function decreaseFood_one () {
        $foodInID = $_GET['foodInID'];

        $foodData = new Food();

        $foodData->decreaseFood_one($foodInID);
    }
?>