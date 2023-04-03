<?php

class Pets extends Database
{

    public function __construct()
    {
        $this->connect();
    }
    public function startingPet()
    {    $sql = "SELECT petName, petDesc, petImage FROM pet WHERE petRarity = 'Common';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo '<div class="pets">
                <div class="row d-flex py-4 px-4 justify-content-center">';
            while ($row = $stmt->fetch()) {
                echo '<div class="col-md-3 justify-content-center d-flex px-4 py-4" style="text-align:center;">
                        <div class="logo hidden">
                            <img src="'.$row["petImage"].'" width="200">
                            <br>
                            <strong>'.$row["petName"].'</strong>
                            <p>'.$row["petDesc"].'</p>
                            <a href="#confirmation" class="btn btn-light">Select</a>
                        </div>
                    </div>';
            }
            echo '</div></div>';
        } else {
            echo "No pets found";
        }
    
    
}
}