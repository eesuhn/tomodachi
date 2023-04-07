<?php
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

        public function equipPet() {

        }
            public function petScout($userID) {
                // Set rarity chances
                $chances = [
                    "Legendary" => 5,
                    "Rare" => 35,
                    "Common" => 60
                ];
        
                // Determine the pet rarity
                $rand = mt_rand(1, 100);
                $rarity = null;
        
                if ($rand <= $chances["Legendary"]) {
                    $rarity = "Legendary";
                } elseif ($rand <= $chances["Legendary"] + $chances["Rare"]) {
                    $rarity = "Rare";
                } else {
                    $rarity = "Common";
                }
        
                $db = new Database();
                $pet = $this->getAvailablePet($rarity, $userID, $db);
        
                // Try the next rarity tier if no available pets in the current tier
                if (!$pet) {
                    if ($rarity === "Legendary") {
                        $rarity = "Rare";
                    } elseif ($rarity === "Rare") {
                        $rarity = "Common";
                    } else {
                        // No pets available in any tier
                        return false;
                    }
                    $pet = $this->getAvailablePet($rarity, $userID, $db);
                }
        
                if (!$pet) {
                    // No pets available in any tier
                    return false;
                }
        
                // Get pet rarity attributes
                $sql = "SELECT * FROM `pet_rarity` WHERE `petRarity` = ?";
                $stmt = $db->connect()->prepare($sql);
                $stmt->execute([$rarity]);
                $pet_rarity = $stmt->fetch();
        
                // Insert the new pet into the pet_inventory table
                $sql = "INSERT INTO `pet_inventory` (`userID`, `petID`, `petLevel`, `petXP`, `petHealthTol`, `petHungerTol`, `petHealthCur`, `petHungerCur`, `petStatus`)
                          VALUES (?, ?, 1, 0, ?, ?, ?, ?, 'Kept')";
                $stmt = $db->connect()->prepare($sql);
                $stmt->execute([$userID, $pet['petID'], $pet_rarity['petHealthIn'], $pet_rarity['petHungerIn'], $pet_rarity['petHealthIn'], $pet_rarity['petHungerIn']]);
        
                return $pet;
            }
        
            private function getAvailablePet($rarity, $userID, $db) {
                // Select a random pet with the determined rarity, excluding owned pets
                $sql = "SELECT * FROM `pet` 
                        WHERE `petRarity` = ? 
                        AND `petID` NOT IN (
                            SELECT `petID` FROM `pet_inventory` WHERE `userID` = ?
                        )
                        ORDER BY RAND() LIMIT 1";
                $stmt = $db->connect()->prepare($sql);
                $stmt->execute([$rarity, $userID]);
                return $stmt->fetch();
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
    }
