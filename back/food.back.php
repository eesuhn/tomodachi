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

        public function getFoodDetails ($userID) {
            $sql = 
            "SELECT food.foodName, food.foodImg, food_inventory.userID, food_inventory.foodID, food_inventory.foodNum FROM food 
            INNER JOIN food_inventory ON food.foodID = food_inventory.foodID WHERE food_inventory.userID = :userID";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':userID', $userID);

            $stmt->execute(array(
                    ':userID' => $userID));

            return $stmt;
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
        public function decreaseFood_one ($userID, $foodID) {
            $sql = "UPDATE food_inventory SET foodNum = foodNum - 1 WHERE userID = :value1 AND foodID = :value2";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $userID);
            $stmt->bindParam(':value2', $foodID);

            $stmt->execute(array(
                    ':value1' => $userID,
                    ':value2' => $foodID));
        }

        public function getShopFoods($userID) {
            // get data on foods sold and quantity owned by users
            $sql = "SELECT food.*, food_inventory.foodNum
                    FROM food
                    LEFT JOIN food_inventory ON food.foodID = food_inventory.foodID AND food_inventory.userID = ?
                    ORDER BY food.foodPrice ASC";

            $db = new Database();
            $stmt = $db->connect()->prepare($sql);
            
            $stmt->execute([$userID]);
            $foods = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $foods;
        }

        public function purchaseFood($userID, $foodID) {
            // set the quantity to purchase to 1 by default
            $quantity = 1;
        
            // check if the food exists in the food table
            $sql = "SELECT * FROM food WHERE foodID = ?";

            $db = new Database();
            $stmt = $db->connect()->prepare($sql);

            $stmt->execute([$foodID]);
            $food = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // check if the user already has this food in their inventory
            $sql = "SELECT * FROM food_inventory WHERE userID = ? AND foodID = ?";
            $stmt = $db->connect()->prepare($sql);

            $stmt->execute([$userID, $foodID]);
            $inventory = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($inventory) {
                // user already has this food in their inventory, increase the quantity by 1
                $quantity = $inventory['foodNum'] + 1;
                $sql = "UPDATE food_inventory SET foodNum = ? WHERE userID = ? AND foodID = ?";

                $stmt = $db->connect()->prepare($sql);
                $stmt->execute([$quantity, $userID, $foodID]);
                
            } else {
                // user does not have this food in their inventory, insert a new row
                $sql = "INSERT INTO food_inventory (userID, foodID, foodNum) VALUES (?, ?, ?)";

                $stmt = $db->connect()->prepare($sql);
                $stmt->execute([$userID, $foodID, $quantity]);
            }
        }
    }
?>