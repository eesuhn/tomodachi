<?php
    include '../connection.back.php';
    include '../currency.back.php';

    $db = new Database();

    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $userID = $_SESSION['userID'];

    /*
        sql query ->
        currencyNum from currency table,
        based on userID from currency table
    */
    $sql = "SELECT currencyNum FROM currency WHERE userID = :userID";

    $stmt = $db->connect()->prepare($sql);

    $stmt->bindParam(':userID', $userID);

    $stmt->execute(array(
            ':userID' => $userID));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $currencyNum = $row['currencyNum'];

    echo 
    "<img src='../assets/images/coin.png' style='height: 19px; width: 19px; margin: 10px;'>".$currencyNum;
?>