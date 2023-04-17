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
            echo "
            <div class='col-md-4 px-3 py-3'>
                <div class='card h-100'>
                    <center><img src='' class='card-img-top' alt='Pet Image' style='max-width: 55%;'></center>
                    <div class='card-body d-flex flex-column'>
                        <h5 class='card-title'></h5>
                        <p class='card-text pet-stats'>
                            <img src='../assets/images/health.png' width='20'>
                            <img src='../assets/images/hunger.png' width='20'>
                        </p>
                        
                        <h4 class='card-text'><img src='' width='32' alt='Pet Rarity' style='margin: -2px 6px 2px 2px;'></h4>
                        <p class='card-text'></p>
                    </div>
                </div>
            </div>";
        }
        echo "</div>";
    }
?>