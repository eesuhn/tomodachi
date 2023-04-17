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
        case 'refreshViewPets':
            refreshViewPets();
            break;
    }

    function refreshViewPets() {
        $admin = new Admin();

        $stmt = $admin->getAllPets();

        echo "
        <style>
            p.pet-stats img:not(:first-child) {
                margin-left: 20px;
            }
            
            p.pet-stats img {
                margin-right: 6px;
            }
        </style>
        <div class='row'>";

        foreach ($stmt as $row) {
            $petRarityImg = getPetRarityImg($row['petRarity']);

            echo "
            <div class='col-md-4 px-3 py-3'>
                <div class='card h-100'>
                    <center><img src='{$row['petImg']}' class='card-img-top' alt='Pet Image' style='max-width: 55%;'></center>
                    <div class='card-body d-flex flex-column'>
                        <h4 class='card-title' style='font-weight: 400;'>{$row['petName']}</h4>
                        <p class='card-text pet-stats'>
                            <img src='../assets/images/health.png' width='20'>{$row['petHealthIn']}
                            <img src='../assets/images/hunger.png' width='20'>{$row['petHappIn']}
                        </p>
                        <div style='margin: -10px -4px -2px;'>
                            <h4 class='card-text'><img src='$petRarityImg' width='80px' alt='Pet Rarity'></h4>
                        </div>
                        <p class='card-text'>{$row['petDesc']}</p>
                    </div>
                </div>
            </div>";
        }
        echo "</div>";
    }

    function getPetRarityImg($petRarity) {
        if ($petRarity === "Legendary"){
            return "../assets/images/legendary.png";

        } else if ($petRarity === "Rare"){
            return "../assets/images/rare.png";

        }else{
            return "../assets/images/common.png";
        }
    }
?>