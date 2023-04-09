
<?php

class Wallpaper{

        public function getAllWallpapers() {

                // get all wallpaper details
                $sql = "SELECT * FROM wallpaper ORDER BY wallpaperPrice ASC";
                
                $db = new Database();
                $stmt = $db->connect()->prepare($sql);
                
                $stmt->execute();
                $wallpapers = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                return $wallpapers;

        }

        public function purchaseWallpaper($userID, $wallpaperID) {

                // add record to wallpaper_inventory table
                $sql = "INSERT INTO wallpaper_inventory (userID, wallpaperID, wallpaperStatus) VALUES (?, ?, 'Kept')";
            
                $db = new Database();
                $stmt = $db->connect()->prepare($sql);
                
                $result = $stmt->execute([$userID, $wallpaperID]);
            
                return $result;

        }

        public function checkWallpaper($userID, $wallpaperID) {
                $db = new Database();
                $stmt = $db->connect()->prepare("SELECT * FROM wallpaper_inventory WHERE userID = ? AND wallpaperID = ?");
                $stmt->execute([$userID, $wallpaperID]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
                return $result ? true : false;
        }
            
}

?>