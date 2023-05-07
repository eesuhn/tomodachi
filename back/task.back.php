<?php
class Task {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserTasks($userID, $taskStatus) {
        $sql = "SELECT * FROM task WHERE userID = :userID AND taskStatus = :taskStatus";

        $stmt = $this->db->connect()->prepare($sql);

        $stmt->bindParam(':userID', $userID);
        $stmt->bindValue(':taskStatus', $taskStatus);

        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;
    }

    public function updateTask($taskID, $taskTitle, $taskDue, $taskDesc) {
        $sql = "UPDATE task SET taskTitle = :taskTitle, taskDue = :taskDue, taskDesc = :taskDesc WHERE taskID = :taskID";

        $stmt = $this->db->connect()->prepare($sql);

        $stmt->bindParam(':taskTitle', $taskTitle);
        $stmt->bindParam(':taskDue', $taskDue);
        $stmt->bindParam(':taskDesc', $taskDesc);
        $stmt->bindParam(':taskID', $taskID);

        $stmt->execute();
        return true;
    }

    public function addTask($userID, $taskTitle, $taskDue) {
        $sql = "INSERT INTO task (userID, taskTitle, taskDesc, taskDue) VALUES (:userID, :taskTitle, '', :taskDue)";
        
        $stmt = $this->db->connect()->prepare($sql);

        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':taskTitle', $taskTitle);
        $stmt->bindParam(':taskDue', $taskDue);

        $stmt->execute();
        return true;
    }

    public function deleteTask($taskID) {
        $sql = "DELETE FROM task WHERE taskID = :taskID";

        $stmt = $this->db->connect()->prepare($sql);

        $stmt->bindParam(':taskID', $taskID);

        $stmt->execute();
        return true;
    }

    public function deleteCompletedTasks($userID) {
        $sql = "DELETE FROM task WHERE userID = :userID AND taskStatus = 'Completed';";

        $stmt = $this->db->connect()->prepare($sql);

        $stmt->bindParam(':userID', $userID);

        $stmt->execute();
        return true;
    }

    public function updateStatus($taskID, $taskStatus) {
        $sql = "UPDATE task SET taskStatus = :taskStatus WHERE taskID = :taskID";

        $stmt = $this->db->connect()->prepare($sql);

        $stmt->bindParam(':taskID', $taskID);
        $stmt->bindParam(':taskStatus', $taskStatus);

        $stmt->execute();
        return true;
    }
}
?>