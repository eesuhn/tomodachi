<?php

class Pets extends Database
{

    public function __construct()
    {
        $this->connect();
    }
    public function startingPet()
    {
        $sql = "SELECT petID, petName, petDesc, petImage FROM pet WHERE petRarity = 'Common';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo '<div class="pets">
                <div class="row d-flex py-4 px-4 justify-content-center">';
            while ($row = $stmt->fetch()) {
                echo '<div class="col-md-3 justify-content-center d-flex px-4 py-4" style="text-align:center;">
                        <div class="logo hidden">
                            <img src="' . $row["petImage"] . '" width="200">
                            <br>
                            <strong>' . $row["petName"] . '</strong>
                            <p>' . $row["petDesc"] . '</p>
                            <a href="../include/petselection.inc.php?petID=' . $row["petID"] . '" class="btn btn-light">Select</a>
                            </div>
                    </div>';
            }
            echo '</div></div>';
        } else {
            echo "No pets found";
        }
    }

    public function ownPet($userID, $petID)
    {
        $sql = "SELECT petHealth, petHunger FROM petRarity WHERE rarity = (SELECT petRarity FROM pet WHERE petID = ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$petID]);
        $petRarityStats = $stmt->fetch();
        $sql = "INSERT INTO petInventory (userID, petID, petLevel, petXP, petHealth, petHunger, status) VALUES (?, ?, 1, 0, ?, ?,'Equipped')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userID, $petID, $petRarityStats['petHealth'], $petRarityStats['petHunger']]);
        echo "
        <script>window.location.href='../front/dashboard.front.php';</script>";
    }

    public function getEquippedPet($userID){
        $sql = "SELECT pet.petName, pet.petImage, petInventory.petHealth, petInventory.petXP, petInventory.petLevel, petInventory.petHunger 
                FROM pet
                INNER JOIN petInventory ON pet.petID = petInventory.petID
                WHERE petInventory.userID = ? AND petInventory.status = 'Equipped'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userID]);
        $pet = $stmt->fetch();
        return $pet;
    }

    public function equipPets(){
    }

}
