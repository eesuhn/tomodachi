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
    }
?>