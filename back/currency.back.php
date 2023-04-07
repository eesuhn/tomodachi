<?php
    class Currency {
        private $userID;
        private $currencyNum;

        // initial currency amount
        public function setCurrencyDetails_in ($userID) {
            $this->userID = $userID;
            $this->currencyNum = 0;
        }

        // register currency info
        public function registerCurrency () {
            $sql = "INSERT INTO currency (userID, currencyNum) VALUES (:value1, :value2)";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $this->userID);
            $stmt->bindParam(':value2', $this->currencyNum);

            $stmt->execute(array(
                    ':value1' => $this->userID,
                    ':value2' => $this->currencyNum));
        }

        // get currencyNum and store it in $this->currencyNum
        public function getCurrency ($userID) {
            $sql = "SELECT currencyNum FROM currency WHERE userID = :value1";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $userID);

            $stmt->execute(array(
                    ':value1' => $userID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->currencyNum = $result['currencyNum'];

            return $this->currencyNum;
        }

        public function increaseCurrency ($userID, $currencyNum) {
            $sql = "UPDATE currency SET currencyNum = currencyNum + :value1 WHERE userID = :value2";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $currencyNum);
            $stmt->bindParam(':value2', $userID);

            $stmt->execute(array(
                    ':value1' => $currencyNum,
                    ':value2' => $userID));

            // return currencyNum after increasing
            $this->getCurrency($userID);
        }

        public function decreaseCurrency ($userID, $currencyNum) {
            $sql = "UPDATE currency SET currencyNum = currencyNum - :value1 WHERE userID = :value2";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $currencyNum);
            $stmt->bindParam(':value2', $userID);

            $stmt->execute(array(
                    ':value1' => $currencyNum,
                    ':value2' => $userID));

            // return currencyNum after decreasing
            $this->getCurrency($userID);
        }
    }
?>