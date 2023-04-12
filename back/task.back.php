<?php
class Task {

    public function submitTask($userID, $taskTitle) {
        $db = new Database();
        $sql = "INSERT INTO task (userID, taskTitle) VALUES (:userID, :taskTitle)";

        $stmt = $db->connect()->prepare($sql);

        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':taskTitle', $taskTitle);

        $stmt->execute();
    }

    public function getUserTasks($userID, $taskStatus) {
        $db = new Database();
        $sql = "SELECT * FROM task WHERE userID = :userID AND taskStatus = :taskStatus";

        $stmt = $db->connect()->prepare($sql);

        $stmt->bindParam(':userID', $userID);
        $stmt->bindValue(':taskStatus', $taskStatus);

        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;
    }

    public function updateTask($taskID, $taskTitle, $taskDue, $taskDesc) {
        $db = new Database();
        $sql = "UPDATE task SET taskTitle = :taskTitle, taskDue = :taskDue, taskDesc = :taskDesc WHERE taskID = :taskID";

        $stmt = $db->connect()->prepare($sql);

        $stmt->bindParam(':taskTitle', $taskTitle);
        $stmt->bindParam(':taskDue', $taskDue);
        $stmt->bindParam(':taskDesc', $taskDesc);
        $stmt->bindParam(':taskID', $taskID);

        $stmt->execute();
        return true;
    }

    public function addTask($userID, $taskTitle, $taskDue) {
        $db = new Database();
        $sql = "INSERT INTO task (userID, taskTitle, taskDesc, taskDue) VALUES (:userID, :taskTitle, '', :taskDue)";
        
        $stmt = $db->connect()->prepare($sql);

        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':taskTitle', $taskTitle);
        $stmt->bindParam(':taskDue', DATE($taskDue));

        $stmt->execute();
        return true;
    }

    public function deleteTask($taskID) {
        $db = new Database();
        $sql = "DELETE FROM task WHERE taskID = :taskID";

        $stmt = $db->connect()->prepare($sql);

        $stmt->bindParam(':taskID', $taskID);

        $stmt->execute();
        return true;
    }

    public function updateStatus($taskID, $taskStatus) {
        $db = new Database();
        $sql = "UPDATE task SET taskStatus = :taskStatus WHERE taskID = :taskID";

        $stmt = $db->connect()->prepare($sql);

        $stmt->bindParam(':taskID', $taskID);
        $stmt->bindParam(':taskStatus', $taskStatus);

        $stmt->execute();
        return true;
    }
}
?>