<?php
class Todo{

    public function submitTask($userID, $taskName){

        $db = new Database();
        $sql = "INSERT INTO todo (userID, taskTitle) VALUES (:userID, :taskName)";
        $stmt = $db->connect()->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':taskName', $taskName);
        $stmt->execute();
    }
    public function getUserTasks($userID, $currentState){

        $db = new Database();
        $sql = "SELECT * FROM todo WHERE userID = :userID AND status = :status";
        $stmt = $db->connect()->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindValue(':status', $currentState);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    }


    public function updateTask($taskID, $title, $dueDate, $description){

        $db = new Database();
        $sql = "UPDATE todo SET taskTitle = :title, taskDue = :dueDate, taskDesc = :description WHERE taskID = :taskID";
        $stmt = $db->connect()->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':dueDate', $dueDate);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':taskID', $taskID);
        $stmt->execute();
        return true;
    }

    public function addTask($userID, $title, $dueDate){
        $db = new Database();
        $sql = "INSERT INTO todo (userID, taskTitle, taskDesc, taskDue, status) VALUES (:userID, :title, '', :dueDate, 'Active')";
        $stmt = $db->connect()->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':dueDate', $dueDate);
        $stmt->execute();
        return true;
    }

    public function deleteTask($taskID){
        $db = new Database();
        $sql = "DELETE FROM todo WHERE taskID = :taskID";
        $stmt = $db->connect()->prepare($sql);
        $stmt->bindParam(':taskID', $taskID);
        $stmt->execute();
        return true;
    }
}
