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

        // get all the users
        public function getAllUsers() {
            $sql = "SELECT * FROM user";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute();

            return $stmt;
        }
    }
?>