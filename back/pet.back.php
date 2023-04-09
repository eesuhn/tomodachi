<?php
    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class Pet {
        

        public function startingPet() {
            $sql = "SELECT * FROM pet WHERE petRarity = 'Common';";
            $db = new Database();

            $stmt = $db->connect()->prepare($sql);
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

        public function ownPet($userID, $petID) {
            $sql = "SELECT petHealthIn, petHungerIn FROM pet_rarity WHERE petRarity = (SELECT petRarity FROM pet WHERE petID = ?)";
            $db = new Database();

            $stmt = $db->connect()->prepare($sql);
            $stmt->execute([$petID]);

            $petRarityStats = $stmt->fetch();

            $healthIn = $petRarityStats['petHealthIn'];
            $hungerIn = $petRarityStats['petHungerIn'];

            $sql = "INSERT INTO pet_inventory (userID, petID, petLevel, petXP, petHealthTol, petHungerTol, petHealthCur, petHungerCur, petStatus) 
                    VALUES (?, ?, 1, 0, ?, ?, ?, ?, 'Equipped')";

            $stmt = $db->connect()->prepare($sql);
            $stmt->execute([$userID, $petID, $healthIn, $hungerIn, $healthIn, $hungerIn]);

            echo "
            <script>window.location.href='../front/dashboard.front.php';</script>";
        }

        public function getEquippedPet($userID) {
            $sql = "SELECT pet.*, pet_inventory.* 
                    FROM pet
                    INNER JOIN pet_inventory ON pet.petID = pet_inventory.petID
                    WHERE pet_inventory.userID = ? AND pet_inventory.petStatus = 'Equipped'";

            $db = new Database();
            $stmt = $db->connect()->prepare($sql);

            $stmt->execute([$userID]);
            $pet = $stmt->fetch();
            
            return $pet;
        }

        public function checkOwnedPets($userID) {
            $db = new Database();
            
            // check if the user owns all available pets
            $sql = "SELECT COUNT(*) as total FROM `pet` WHERE `petID` NOT IN (SELECT `petID` FROM `pet_inventory` WHERE `userID` = ?)";

            $stmt = $db->connect()->prepare($sql);

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
    
            $db = new Database();
            $pet = $this->getAvailablePet($petRarity, $userID, $db);
    
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
                $pet = $this->getAvailablePet($petRarity, $userID, $db);
            }
    
            if (!$pet) {
                // no pets available in any tier
                return false;
            }
    
            // get pet_rarity stats based on $pet['petID'] from $pet created above
            $sql = "SELECT * FROM `pet_rarity` WHERE `petRarity` = (SELECT `petRarity` FROM `pet` WHERE `petID` = ?)";

            $stmt = $db->connect()->prepare($sql);
            $stmt->execute([$pet['petID']]);

            $pet_rarity = $stmt->fetch();
    
            // insert the new pet into the pet_inventory table
            $sql = "INSERT INTO `pet_inventory` 
                    (`userID`, `petID`, `petLevel`, `petXP`, `petHealthTol`, `petHungerTol`, `petHealthCur`, `petHungerCur`, `petStatus`)
                    VALUES (?, ?, 1, 0, ?, ?, ?, ?, 'Kept')";

            $stmt = $db->connect()->prepare($sql);
            $stmt->execute([
                    $userID, $pet['petID'], $pet_rarity['petHealthIn'], 
                    $pet_rarity['petHungerIn'], $pet_rarity['petHealthIn'], 
                    $pet_rarity['petHungerIn']]);
            
            $_SESSION['petScoutID'] = $pet['petID'];

            return $pet;
        }

        private function getAvailablePet($petRarity, $userID, $db) {

            // select a pet of the same or higher rarity tier, excluding owned pets
            while (true) {

                // select a random pet with the determined rarity, excluding owned pets
                $sql = "SELECT * FROM `pet` 
                        WHERE `petRarity` = ? 
                        AND `petID` NOT IN (
                            SELECT `petID` FROM `pet_inventory` WHERE `userID` = ?)";
                            
                $stmt = $db->connect()->prepare($sql);
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
            $db = new Database();

            $stmt = $db->connect()->prepare($sql);
            $stmt->bindParam(':petRarity', $petRarity);

            $stmt->execute();
            $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $pets;
        }

        // show pets info based on petID 
        public function showPetDetails($petID) {
            $sql = "SELECT * from pet WHERE petID = :petID";
            $db = new Database();

            $stmt = $db->connect()->prepare($sql);
            $stmt->bindParam(':petID', $petID);

            $stmt->execute(array(
                ':petID' => $petID
            ));

            return $stmt;
        }

        public function showPetInventory($userID){
            $db = new Database();
            $sql = "SELECT pi.petID, p.petName, pi.petStatus, p.petImg
                    FROM pet_inventory pi
                    JOIN pet p ON pi.petID = p.petID
                    WHERE pi.userID = :userID";
            $stmt = $db->connect()->prepare($sql);
            $stmt->bindParam(':userID', $userID);
            $stmt->execute();
            $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $pets;
        }
        
    }
?>