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
        case 'refreshViewFoods':
            refreshViewFoods();
            break;
        case 'refreshViewWallpapers':
            refreshViewWallpapers();
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
                    <center><img src='{$row['petImg']}' class='card-img-top' alt='Pet Image' style='max-width: 50%;'></center>
                    <div class='card-body d-flex flex-column'>
                        <h4 class='card-title' style='font-weight: 400;'>{$row['petName']}</h4>
                        <p class='card-text pet-stats'>
                            <img src='../assets/images/health.png' width='20'>{$row['petHealthIn']}
                            <img src='../assets/images/happy.png' width='20'>{$row['petHappIn']}
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

    function refreshViewFoods() {
        $admin = new Admin();

        $stmt = $admin->getAllFoods();

        echo '
        <style>
            p.food-stats img:not(:first-child) {
                margin-left: 20px;
            }
            
            p.food-stats img {
                margin-right: 6px;
            }
        </style>
        <div class="row">';
        
        foreach ($stmt as $row) {

            echo
            "<div class='col-md-4 px-3 py-3'>
                <div class='card h-100'>
                    <center><img src='{$row["foodImg"]}' class='card-img-top' alt='Food Image' style='max-width: 30%;'></center>
                    <div class='card-body d-flex flex-column'>
                        <h5 class='card-title'>{$row["foodName"]}</h5>
                        <p class='card-text food-stats'>
                            <img src='../assets/images/health.png' width='20'>{$row["foodHealth"]}
                            <img src='../assets/images/happy.png' width='20'>{$row["foodHapp"]}
                            <img src='../assets/images/coin.png' width='20'>{$row["foodPrice"]}
                        </p>
                        <p class='card-text'>{$row["foodDesc"]}</p>
                    </div>
                </div>
            </div>";
        }
        echo '</div>';
    }

    function refreshViewWallpapers() {
        $admin = new Admin();

        $stmt = $admin->getAllWallpapers();

        echo '
        <style>
            p.wallpaper-stats img:not(:first-child) {
                margin-left: 20px;
            }
            
            p.wallpaper-stats img {
                margin-right: 6px;
            }
        </style>
        <div class="row">';
        
        foreach ($stmt as $row) {

            echo
            "<div class='col-md-4 px-3 py-3'>
                <div class='card h-100'>
                    <center><img src='{$row["wallpaperImg"]}' class='card-img-top' alt='Wallpaper Image' style='max-width: 70%;'></center>
                    <div class='card-body d-flex flex-column'>
                        <h5 class='card-title'>{$row["wallpaperName"]}</h5>
                        <p class='card-text wallpaper-stats'>
                            <img src='../assets/images/coin.png' width='20'>{$row["wallpaperPrice"]}
                        </p>
                        <p class='card-text'>{$row["wallpaperDesc"]}</p>
                    </div>
                </div>
            </div>";
        }
        echo '</div>';
    }
?>