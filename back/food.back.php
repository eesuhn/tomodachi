<?php
    class Food {

        // get foodImg based on foodID
        public function getImg ($foodID) {
            $sql = "SELECT foodImg FROM food WHERE foodID = :value1";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $foodID);

            $stmt->execute(array(
                    ':value1' => $foodID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['foodImg'];
        }

        // get foodName based on foodID
        public function getName ($foodID) {
            $sql = "SELECT foodName FROM food WHERE foodID = :value1";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $foodID);

            $stmt->execute(array(
                    ':value1' => $foodID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['foodName'];
        }

        // get foodDesc based on foodID
        public function getDesc ($foodID) {
            $sql = "SELECT foodDesc FROM food WHERE foodID = :value1";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $foodID);

            $stmt->execute(array(
                    ':value1' => $foodID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['foodDesc'];
        }

        // get foodPrice based on foodID
        public function getPrice ($foodID) {
            $sql = "SELECT foodPrice FROM food WHERE foodID = :value1";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $foodID);

            $stmt->execute(array(
                    ':value1' => $foodID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['foodPrice'];
        }

        // get foodHunger based on foodID
        public function getHunger ($foodID) {
            $sql = "SELECT foodHunger FROM food WHERE foodID = :value1";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $foodID);

            $stmt->execute(array(
                    ':value1' => $foodID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['foodHunger'];
        }

        // get foodXP based on foodID
        public function getXP ($foodID) {
            $sql = "SELECT foodXP FROM food WHERE foodID = :value1";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $foodID);

            $stmt->execute(array(
                    ':value1' => $foodID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['foodXP'];
        }

        // get foodNum from food_inventory based on foodID and userID
        public function getFoodNum ($foodID, $userID) {
            $sql = "SELECT foodNum FROM food_inventory WHERE foodID = :value1 AND userID = :value2";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $foodID);
            $stmt->bindParam(':value2', $userID);

            $stmt->execute(array(
                    ':value1' => $foodID,
                    ':value2' => $userID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['foodNum'];
        }

        public function increaseFood ($foodInID, $foodNum) {
            $sql = "UPDATE food_inventory SET foodNum = foodNum + :value1 WHERE foodInID = :value2";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $foodNum);
            $stmt->bindParam(':value2', $foodInID);

            $stmt->execute(array(
                    ':value1' => $foodNum,
                    ':value2' => $foodInID));
        }

        // decrease foodNum by 1
        public function decreaseFood_one ($foodInID) {

            $sql = "UPDATE food_inventory SET foodNum = foodNum - 1 WHERE foodInID = :value1";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $foodInID);

            $stmt->execute(array(
                    ':value1' => $foodInID));
        }
    }
?>