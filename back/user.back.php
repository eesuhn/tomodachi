<?php
    class User {
        private $userName;
        private $userEmail;
        private $userPwd;
        private $db;

        public function __construct() {
            $this->db = new Database();
        }
        
        public function setAccountDetails($userName, $userEmail, $userPwd) {
            $this->userName = $userName;
            $this->userEmail = $userEmail;
            $this->userPwd = $userPwd;
        }

        public function checkEmail() {
            $sql = "SELECT userEmail FROM user WHERE userEmail = :email";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':email', $this->userEmail);

            $stmt->execute(array(
                ':email' => $this->userEmail
            ));

            if ($stmt->rowCount()>0) {
                echo 
                "<script>alert('Email is already in use'); 
                window.location.href='../front/login.front.php';</script>";

                return null;
            } else {

                // return userID based on userEmail
                return $this->registerUser();
            }
        }

        public function registerUser() {
            $hashedPwd = password_hash($this->userPwd, PASSWORD_DEFAULT); // hash the password
            
            $sql = "INSERT INTO user (userName, userEmail, userPwd) VALUES (:value1, :value2, :value3)";
        
            $stmt = $this->db->connect()->prepare($sql);
        
            $stmt->bindParam(':value1', $this->userName);
            $stmt->bindParam(':value2', $this->userEmail);
            $stmt->bindParam(':value3', $hashedPwd); // use the hashed password
        
            if ($stmt->execute(
                array(
                    ':value1' => $this->userName,
                    ':value2' => $this->userEmail,
                    ':value3' => $hashedPwd))) {
        
                    echo 
                    "<script>alert('Account Created!'); 
                    window.location.href='../front/login.front.php';</script>";
        
                    return $this->getUserID($this->userEmail);
            } else {
                $error = $stmt->errorInfo();
                echo "Error: " . $error[2];
            }
        }        

        public function loginUser($userEmail, $userPwd) {
            $sql = "SELECT * FROM user WHERE userEmail = :email";
        
            $stmt = $this->db->connect()->prepare($sql);
        
            $stmt->bindParam(':email', $userEmail);
        
            $stmt->execute();
        
            if ($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $hashedPwd = $row['userPwd'];
                
                if (password_verify($userPwd, $hashedPwd)) { // check if the passwords match
                    session_start();
                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['userName'] = $row['userName'];

                    $userName = $_SESSION['userName'];
        
                    $petInventorySql = "SELECT * FROM pet_inventory WHERE userID = :userID";
                    $petInventoryStmt = $this->db->connect()->prepare($petInventorySql);
                    $petInventoryStmt->bindParam(':userID', $_SESSION['userID']);
                    $petInventoryStmt->execute();
        
                    if ($petInventoryStmt->rowCount()>0) {
                        // redirect to dashboard
                        echo "<script>alert('Welcome back! $userName'); 
                              window.location.href='../front/dashboard.front.php'</script>";
                    } else {
                        // redirect to welcome page
                        echo "<script>alert('Welcome back! $userName'); 
                              window.location.href='../front/welcome.front.php'</script>";
                    }
                } else {
                    echo "<script>alert('Incorrect password'); 
                          window.location.href='../front/login.front.php'</script>";
                }
            } else {
                echo "<script>alert('No account has been found'); 
                      window.location.href='../front/login.front.php'</script>";
            }
        }        
        
        // get userID based on userEmail
        public function getUserID($userEmail) {
            $sql = "SELECT userID FROM user WHERE userEmail = :email";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':email', $userEmail);

            $stmt->execute(array(
                ':email' => $userEmail
            ));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['userID'];
        }

        public function getTutFlag($userID){
            $sql = "SELECT tutModal FROM user WHERE userID = :userID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['tutModal'];
        }

        public function updateTutFlag($userID){
            $sql = "UPDATE user SET tutModal = 1 WHERE userID = :userID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);
            
            $stmt->execute();
        }
    }
?>