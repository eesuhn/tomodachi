<?php
    class Admin {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function loginAdmin($adminEmail, $adminPwd) {
            $sql = "SELECT * FROM admin WHERE adminEmail = :email AND adminPwd = :pwd";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':email', $adminEmail);
            $stmt->bindParam(':pwd', $adminPwd);

            $stmt->execute(array(
                ':email' => $adminEmail,
                ':pwd' => $adminPwd
            ));

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $_SESSION['adminID'] = $row['adminID'];
                    $_SESSION['adminName'] = $row['adminName'];

                    echo "
                        <script>
                            alert('You are now logged in'); 
                            window.location.href='../front/admin_dashboard.front.php'
                        </script>";
                }
            } else {
                echo "
                    <script>
                        alert('No account has been found'); 
                        window.location.href='../front/admin_login.front.php'
                    </script>";
            }
        }

        /*
            select all from user table
            select currencyNum from currency table based on userID
        */
        public function getAllUsers() {
            $sql ="SELECT u.*, c.currencyNum FROM user u, currency c WHERE u.userID = c.userID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute();

            return $stmt;
        }

        public function updateUser($userID, $userName, $userEmail, $userPwd, $currencyNum) {
            $sql = "UPDATE user SET userName = :userName, userEmail = :userEmail, userPwd = :userPwd WHERE userID = :userID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':userName', $userName);
            $stmt->bindParam(':userEmail', $userEmail);
            $stmt->bindParam(':userPwd', $userPwd);

            $stmt->execute();

            $sql = "UPDATE currency SET currencyNum = :currencyNum WHERE userID = :userID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':currencyNum', $currencyNum);

            $stmt->execute();
        }

        public function getAllPets() {
            $sql = "SELECT p.*, pr.petHealthIn, pr.petHappIn FROM pet p, pet_rarity pr WHERE p.petRarity = pr.petRarity";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute();

            return $stmt;
        }

        public function getAllFoods() {
            $sql = "SELECT * FROM food";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute();

            return $stmt;
        }

        public function getAllWallpapers() {
            $sql = "SELECT * FROM wallpaper";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute();

            return $stmt;
        }

        public function addPet($petName, $petRarity, $petDesc, $petImg) {
            $sql = "INSERT INTO pet (petName, petRarity, petDesc, petImg) VALUES (:petName, :petRarity, :petDesc, :petImg)";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':petName', $petName);
            $stmt->bindParam(':petRarity', $petRarity);
            $stmt->bindParam(':petDesc', $petDesc);
            $stmt->bindParam(':petImg', $petImg);

            $stmt->execute();
        }

        public function addFood($foodName, $foodDesc, $foodPrice, $foodHealth, $foodHapp, $foodImg) {
            $sql = "INSERT INTO food (foodName, foodDesc, foodPrice, foodHealth, foodHapp, foodImg) VALUES (:foodName, :foodDesc, :foodPrice, :foodHealth, :foodHapp, :foodImg)";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':foodName', $foodName);
            $stmt->bindParam(':foodDesc', $foodDesc);
            $stmt->bindParam(':foodPrice', $foodPrice);
            $stmt->bindParam(':foodHealth', $foodHealth);
            $stmt->bindParam(':foodHapp', $foodHapp);
            $stmt->bindParam(':foodImg', $foodImg);

            $stmt->execute();
        }

        public function addWallpaper($wallpaperName, $wallpaperDesc, $wallpaperPrice, $wallpaperImg) {
            $sql = "INSERT INTO wallpaper (wallpaperName, wallpaperDesc, wallpaperPrice, wallpaperImg) VALUES (:wallpaperName, :wallpaperDesc, :wallpaperPrice, :wallpaperImg)";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':wallpaperName', $wallpaperName);
            $stmt->bindParam(':wallpaperDesc', $wallpaperDesc);
            $stmt->bindParam(':wallpaperPrice', $wallpaperPrice);
            $stmt->bindParam(':wallpaperImg', $wallpaperImg);

            $stmt->execute();
        }

        public function getTotal() {
            $sql = "SELECT
                    (SELECT COUNT(*) FROM user) AS userCount,
                    (SELECT COUNT(*) FROM pet) AS petCount,
                    (SELECT COUNT(*) FROM food) AS foodCount,
                    (SELECT COUNT(*) FROM wallpaper) AS wallpaperCount;";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute();

            return $stmt;
        }
    }
?>