<?php
    include '../back/connection.back.php';
    include '../back/admin.back.php';

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
        case 'addPet':
            addPet();
            break;
        case 'addFood':
            addFood();
            break;
        case 'addWallpaper':
            addWallpaper();
            break;
    }

    function addPet() {
        $petName = $_POST['petName'];
        $petRarity = $_POST['petRarity'];
        $petDesc = $_POST['petDesc'];

        if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
            $fileName = $_FILES['fileUpload']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');

            if (in_array($fileExtension, $allowedfileExtensions)){
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = "../assets/pets/";
                $dest_path = $uploadFileDir . $newFileName;
                move_uploaded_file($fileTmpPath, $dest_path);
            }
        }

        $petImg = $dest_path;

        $admin = new Admin();

        $admin->addPet($petName, $petRarity, $petDesc, $petImg);

        echo "
        <script>
            alert('Pet added successfully!');
            window.location.href = '../front/admin_dashboard.front.php';
        </script>";
    }

    function addFood() {
        $foodName = $_POST['foodName'];
        $foodDesc = $_POST['foodDesc'];
        $foodPrice = $_POST['foodPrice'];
        $foodHealth = $_POST['foodHealth'];
        $foodHapp = $_POST['foodHapp'];

        if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
            $fileName = $_FILES['fileUpload']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');

            if (in_array($fileExtension, $allowedfileExtensions)){
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = "../assets/pets/";
                $dest_path = $uploadFileDir . $newFileName;
                move_uploaded_file($fileTmpPath, $dest_path);
            }
        }

        $foodImg = $dest_path;

        $admin = new Admin();

        $admin->addFood($foodName, $foodDesc, $foodPrice, $foodHealth, $foodHapp, $foodImg);

        echo "
        <script>
            alert('Food added successfully!');
            window.location.href = '../front/admin_dashboard.front.php';
        </script>";
    }

    function addWallpaper() {
        $wallpaperName = $_POST['wallpaperName'];
        $wallpaperDesc = $_POST['wallpaperDesc'];
        $wallpaperPrice = $_POST['wallpaperPrice'];

        if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
            $fileName = $_FILES['fileUpload']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');

            if (in_array($fileExtension, $allowedfileExtensions)){
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = "../assets/pets/";
                $dest_path = $uploadFileDir . $newFileName;
                move_uploaded_file($fileTmpPath, $dest_path);
            }
        }

        $wallpaperImg = $dest_path;

        $admin = new Admin();

        $admin->addWallpaper($wallpaperName, $wallpaperDesc, $wallpaperPrice, $wallpaperImg);

        echo "
        <script>
            alert('Wallpaper added successfully!');
            window.location.href = '../front/admin_dashboard.front.php';
        </script>";
    }

    $admin = new Admin();

    $stmt = $admin->getTotal();

    $total = $stmt->fetch(PDO::FETCH_ASSOC);

    $userCount = $total['userCount'];
    $petCount = $total['petCount'];
    $foodCount = $total['foodCount'];
    $wallpaperCount = $total['wallpaperCount'];

    $adminName = $_SESSION['adminName'];
?>