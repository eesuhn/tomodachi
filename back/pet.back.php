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
    }
?>