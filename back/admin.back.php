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
            $sql = "SELECT * FROM pet";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute();

            return $stmt;
        }
    }
?>