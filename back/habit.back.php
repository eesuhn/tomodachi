<?php
    class Habit {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function addHabit($userID, $habitTitle) {
            $sql = "INSERT INTO habit (userID, difficultyID, habitTitle, habitDesc) VALUES (:userID, 1, :habitTitle, '')";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':habitTitle', $habitTitle);

            $stmt->execute();
        }

        public function getUserHabits($userID) {
            $sql = "SELECT * FROM habit WHERE userID = :userID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        }

        public function updateHabit($habitID, $difficultyID, $habitTitle, $habitDesc, $habitPositive, $habitNegative) {
            $sql = "UPDATE habit SET difficultyID = :difficultyID, habitTitle = :habitTitle, habitDesc = :habitDesc, habitPositive = :habitPositive, habitNegative = :habitNegative WHERE habitID = :habitID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':habitID', $habitID);
            $stmt->bindParam(':difficultyID', $difficultyID);
            $stmt->bindParam(':habitTitle', $habitTitle);
            $stmt->bindParam(':habitDesc', $habitDesc);
            $stmt->bindParam(':habitPositive', $habitPositive);
            $stmt->bindParam(':habitNegative', $habitNegative);

            $stmt->execute();
        }

        public function deleteHabit($habitID) {
            $sql = "DELETE FROM habit WHERE habitID = :habitID";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->bindParam(':habitID', $habitID);

            $stmt->execute();
        }
    }
?>