<?php
    class Pet {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }
        
        public function startingPet() {
            $sql = "SELECT * FROM pet WHERE petRarity = 'Common';";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                echo '<div class="pets">
                        <div class="row d-flex py-4 px-4 justify-content-center">';

                while ($row = $stmt->fetch()) {
                    echo '<div class="col-md-3 justify-content-center d-flex px-4 py-4" style="text-align: center;">
                            <div class="logo hidden">
                                <img src="' . $row["petImg"] . '" width="200">
                                <br>
                                <strong>' . $row["petName"] . '</strong>
                                <p>' . $row["petDesc"] . '</p>
                                <a href="../include/pet_selection.inc.php?petID=' . $row["petID"] . '" class="btn btn-light">Select</a>
                            </div>
                        </div>';
                }
                echo '</div></div>';

            } else {
                echo "No pets found";
            }
        }

        public function ownPetStart($userID, $petID) {
            $sql = "SELECT petHealthIn, petHappIn FROM pet_rarity WHERE petRarity = (SELECT petRarity FROM pet WHERE petID = ?)";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->execute([$petID]);

            $petRarityStats = $stmt->fetch();

            $healthIn = $petRarityStats['petHealthIn'];
            $happIn = $petRarityStats['petHappIn'];

            date_default_timezone_set('Asia/Kuala_Lumpur');
            $petHappReset = date('Y-m-d');

            $sql = "INSERT INTO `pet_inventory` (userID, petID, petLevel, petXP, petHealthTol, petHappTol, petHealthCur, petHappCur, petStatus, petHappReset) 
                    VALUES (?, ?, 1, 0, ?, ?, ?, 0, 'Equipped', ?)";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->execute([$userID, $petID, $healthIn, $happIn, $healthIn, $petHappReset]);

            echo "
            <script>window.location.href='../front/dashboard.front.php';</script>";
        }

        public function getEquippedPet($userID) {
            $sql = "SELECT pet.*, pet_inventory.* 
                    FROM pet
                    INNER JOIN pet_inventory ON pet.petID = pet_inventory.petID
                    WHERE pet_inventory.userID = ? AND pet_inventory.petStatus = 'Equipped'";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute([$userID]);
            $pet = $stmt->fetch();
            
            return $pet;
        }

        public function checkOwnedPets($userID) {
            
            // check if the user owns all available pets
            $sql = "SELECT COUNT(*) as total FROM `pet` WHERE `petID` NOT IN (SELECT `petID` FROM `pet_inventory` WHERE `userID` = ?)";

            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute([$userID]);
            $result = $stmt->fetch();
        
            $ownedPets = ($result["total"] == 0);
        
            return $ownedPets;
        }
        
        public function petScout($userID) {
            
            // set rarity chances
            $chances = [
                "Legendary" => 5,
                "Rare" => 35,
                "Common" => 60
            ];
    
            // determine the pet rarity
            $rand = mt_rand(1, 100);
            $petRarity = null;
    
            if ($rand <= $chances["Legendary"]) {
                $petRarity = "Legendary";

            } elseif ($rand <= $chances["Legendary"] + $chances["Rare"]) {
                $petRarity = "Rare";

            } else {
                $petRarity = "Common";
            }
    
            $pet = $this->getAvailablePet($petRarity, $userID);
    
            // next rarity tier if no available pets in the current tier
            if (!$pet) {
                if ($petRarity === "Legendary") {
                    $petRarity = "Rare";

                } elseif ($petRarity === "Rare") {
                    $petRarity = "Common";

                } else {
                    // no pets available in any tier
                    return false;
                }
                $pet = $this->getAvailablePet($petRarity, $userID);
            }
    
            if (!$pet) {
                // no pets available in any tier
                return false;
            }
    
            // get pet_rarity stats based on $pet['petID'] from $pet created above
            $sql = "SELECT * FROM `pet_rarity` WHERE `petRarity` = (SELECT `petRarity` FROM `pet` WHERE `petID` = ?)";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->execute([$pet['petID']]);

            $pet_rarity = $stmt->fetch();

            date_default_timezone_set('Asia/Kuala_Lumpur');
            $petHappReset = date('Y-m-d');
    
            // insert the new pet into the pet_inventory table
            $sql = "INSERT INTO `pet_inventory` 
                    (`userID`, `petID`, `petLevel`, `petXP`, `petHealthTol`, `petHappTol`, `petHealthCur`, `petHappCur`, `petHappReset`)
                    VALUES (?, ?, 1, 0, ?, ?, ?, 0, ?)";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->execute([
                    $userID, $pet['petID'], $pet_rarity['petHealthIn'], 
                    $pet_rarity['petHappIn'], $pet_rarity['petHealthIn'],
                    $petHappReset]);
            
            $_SESSION['petScoutID'] = $pet['petID'];

            return $pet;
        }

        private function getAvailablePet($petRarity, $userID) {

            // select a pet of the same or higher rarity tier, excluding owned pets
            while (true) {

                // select a random pet with the determined rarity, excluding owned pets
                $sql = "SELECT * FROM `pet` 
                        WHERE `petRarity` = ? 
                        AND `petID` NOT IN (
                            SELECT `petID` FROM `pet_inventory` WHERE `userID` = ?)";
                            
                $stmt = $this->db->connect()->prepare($sql);
                $stmt->execute([$petRarity, $userID]);

                $pets = $stmt->fetchAll();
            
                if (count($pets) > 0) {
                    // select a random available pet
                    $randIndex = mt_rand(0, count($pets) - 1);
                    return $pets[$randIndex];

                } else {
                    // no available pets of the same tier

                    if ($petRarity === "Legendary") {
                        // no more pets available in any tier
                        return false;

                    } elseif ($petRarity === "Rare") {
                        // select a pet from Legendary rarity
                        $petRarity = "Legendary";

                    } elseif ($petRarity === "Common") {
                        // select a pet from Rare rarity
                        $petRarity = "Rare";
                    }
                }
            }
        }
        
        // show all pets based on pet rarity
        public function showPetDetails_rarity($petRarity) {
            $sql = "SELECT petName, petDesc, petImg from pet WHERE petRarity = :petRarity";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':petRarity', $petRarity);

            $stmt->execute();
            $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $pets;
        }

        // show pets info based on petID 
        public function showPetDetails($petID) {
            $sql = "SELECT * from pet WHERE petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute(array(
                ':petID' => $petID
            ));

            return $stmt;
        }

        public function showPetInventory($userID){

            $sql = "SELECT pi.petID, p.petName, pi.petStatus, p.petImg
                    FROM pet_inventory pi
                    JOIN pet p ON pi.petID = p.petID
                    WHERE pi.userID = :userID";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':userID', $userID);

            $stmt->execute();
            $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $pets;
        }

        public function equipPet($userID, $petID) {
        
            // Set all pets of the user to "Kept" status except for the pet to be equipped
            $sql = "UPDATE pet_inventory SET petStatus = 'Kept' WHERE userID = :userID AND petID != :petID";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute();
            
            // Set the selected pet to "Equipped" status
            $sql = "UPDATE pet_inventory SET petStatus = 'Equipped' WHERE userID = :userID AND petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute();
        }

        public function increaseXP($userID, $petID, $xp) {
            $sql = "UPDATE pet_inventory SET petXP = petXP + :xp WHERE userID = :userID AND petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':xp', $xp);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute();
        }

        public function decreaseHealth($userID, $petID, $health) {
            // get petHealthCur and petHealthTol
            $sql = "SELECT petHealthCur, petHealthTol FROM pet_inventory WHERE userID = :userID AND petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute();
            $pet = $stmt->fetch(PDO::FETCH_ASSOC);

            // store petHealthCur and petHealthTol in variables
            $petHealthCur = $pet['petHealthCur'];
            $petHealthTol = $pet['petHealthTol'];

            if ($petHealthCur - $health < 0) {
                // if petHealthCur - $health < 0, set petHealthCur to 0
                $health = $petHealthCur;
            }

            $sql = "UPDATE pet_inventory SET petHealthCur = petHealthCur - :health WHERE userID = :userID AND petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':health', $health);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute();
        }

        /* 
            check if adding $health to petHealthCur will exceed petHealthTol
            if yes, subtract the difference from petHealthCur
            if no, add $health to petHealthCur
        */
        public function increaseHealth($userID, $petID, $health) {
            $sql = "SELECT petHealthCur, petHealthTol FROM pet_inventory WHERE userID = :userID AND petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute();
            $pet = $stmt->fetch();

            if ($pet['petHealthCur'] + $health > $pet['petHealthTol']) {
                $health = $pet['petHealthTol'] - $pet['petHealthCur'];
            }

            $sql = "UPDATE pet_inventory SET petHealthCur = petHealthCur + :health WHERE userID = :userID AND petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':health', $health);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute();
        }

        /* 
            check if adding $happy to petHappCur will exceed petHappTol
            if yes, subtract the difference from petHappCur
            if no, add $happy to petHappCur
        */
        public function increaseHapp($userID, $petID, $happy) {
            $sql = "SELECT petHappCur, petHappTol FROM pet_inventory WHERE userID = :userID AND petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute();
            $pet = $stmt->fetch();

            if ($pet['petHappCur'] + $happy > $pet['petHappTol']) {
                $happy = $pet['petHappTol'] - $pet['petHappCur'];
            }

            $sql = "UPDATE pet_inventory SET petHappCur = petHappCur + :happy WHERE userID = :userID AND petID = :petID";

            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':happy', $happy);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute();
        }

        public function revivePet($userID, $petID) {
            $sql = "UPDATE pet_inventory SET petLevel = 1, petHappCur = 0, petXP = 0, petAlive = 1, dead_displayed = 0 WHERE userID = :userID AND petID = :petID";
            
            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':petID', $petID);
            $stmt->execute();
        }
        
        
    }
?> 