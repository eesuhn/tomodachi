<?php

class Admin{

    private $adminEmail;
    private $adminPwd;
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function loginAdmin($adminEmail, $adminPwd){
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
                session_start();
                $_SESSION['adminID'] = $row['adminID'];
                $_SESSION['adminName'] = $row['adminName'];
                echo "<script>alert('You are now logged in'); 
                          window.location.href='../front/admindashboard.front.php'</script>";
            }
        } else {
            echo "<script>alert('No account has been found'); 
                  window.location.href='../front/adminlogin.front.php'</script>";
        }
    }

    public function countUsers() {
        $sql = "SELECT COUNT(*) as total FROM user";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function getAllUsers() {
        $sql = "SELECT * FROM user";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getAdminDetails($adminID){

    }

}
