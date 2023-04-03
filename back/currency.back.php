<?php
    class Currency {
        private $userID;
        private $currencyNum;

        public function __construct() {
            $this->userID = "";
            $this->currencyNum = "";
        }

        // initial currency amount
        public function setCurrencyDetails ($userID) {
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
        public function getCurrency () {
            $sql = "SELECT currencyNum FROM currency WHERE userID = :value1";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $this->userID);

            $stmt->execute(array(
                    ':value1' => $this->userID));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->currencyNum = $result['currencyNum'];

            return $this->currencyNum;
        }

        public function increaseCurrency ($currencyNum) {
            $sql = "UPDATE currency SET currencyNum = currencyNum + :value1 WHERE userID = :value2";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $currencyNum);
            $stmt->bindParam(':value2', $this->userID);

            $stmt->execute(array(
                    ':value1' => $currencyNum,
                    ':value2' => $this->userID));

            $this->getCurrency();
        }

        public function decreaseCurrency ($currencyNum) {
            $sql = "UPDATE currency SET currencyNum = currencyNum - :value1 WHERE userID = :value2";

            $db = new Database();

            $stmt = $db->connect()->prepare($sql);

            $stmt->bindParam(':value1', $currencyNum);
            $stmt->bindParam(':value2', $this->userID);

            $stmt->execute(array(
                    ':value1' => $currencyNum,
                    ':value2' => $this->userID));

            $this->getCurrency();
        }
    }
?>