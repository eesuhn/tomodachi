<?php

class User extends Database
{
    private $userName;
    private $userEmail;
    private $userPwd;
    private $userPwd2;

    public function __construct()
    {
        $this->userName = "";
        $this->userEmail = "";
        $this->userPwd = "";
        $this->userPwd2 = "";
    }
    public function setAccountDetails($userName, $userEmail, $userPwd, $userPwd2)
    {
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->userPwd = $userPwd;
        $this->userPwd2 = $userPwd2;
    }
    public function registerUser()
    {
        $sql = "INSERT INTO user (userName, userEmail, userPwd) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->userName, $this->userEmail, $this->userPwd]);
        echo "<script>alert('Account Created'); window.location.href='../front/login.front.php';</script>";
    }

    public function loginUser($userEmail, $userPwd)
    {
        $sql = "SELECT * FROM user WHERE userEmail = ? AND userPwd = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userEmail, $userPwd]);
        $result = $stmt->fetch();
        if ($result) {
            echo "<script>alert('You are now logged in'); 
                window.location.href='../front/dashboard.front.php'</script>";
        } else {
            echo "<script>alert('No account has been found'); 
                window.location.href='../front/login.front.php'</script>";
        }
    
        // Add this code to check for errors
        $error = $stmt->errorInfo();
        if ($error[0] !== '00000') {
            echo "Error: " . $error[2];
        } else {
            echo "Query successful";
        }
    }
    
}
