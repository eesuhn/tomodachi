
<?php
	class Wallpaper {

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

		public function getUserWallpapers($userID) {

			$sql = "SELECT w.wallpaperName, wi.wallpaperStatus, w.wallpaperImg, w.wallpaperID
					FROM wallpaper w
					INNER JOIN wallpaper_inventory wi ON w.wallpaperID = wi.wallpaperID
					WHERE wi.userID = ?
					";
			$db = new Database();
			$stmt = $db->connect()->prepare($sql);

			$stmt->execute([$userID]);
			$userWallpapers = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $userWallpapers;
		}

		public function equipWallpaper($userID, $wallpaperID) {

			// Set all wallpapers of the user to "Kept" status except for the wallpaper to be equipped
			$sql = "UPDATE wallpaper_inventory SET wallpaperStatus = 'Kept' WHERE userID = :userID AND wallpaperID != :wallpaperID";
			$db = new Database();

			$stmt = $db->connect()->prepare($sql);

			$stmt->bindParam(':userID', $userID);
			$stmt->bindParam(':wallpaperID', $wallpaperID);

			$stmt->execute();

			// Set the selected wallpaper to "Equipped" status
			$sql = "UPDATE wallpaper_inventory SET wallpaperStatus = 'Equipped' WHERE userID = :userID AND wallpaperID = :wallpaperID";

			$stmt = $db->connect()->prepare($sql);

			$stmt->bindParam(':userID', $userID);
			$stmt->bindParam(':wallpaperID', $wallpaperID);

			$stmt->execute();
		}

		public function getEquippedWallpaper($userID) {
			$sql = "SELECT wallpaper.*, wallpaper_inventory.* 
					FROM wallpaper
					INNER JOIN wallpaper_inventory ON wallpaper.wallpaperID = wallpaper_inventory.wallpaperID
					WHERE wallpaper_inventory.userID = ? AND wallpaper_inventory.wallpaperStatus = 'Equipped'";

			$db = new Database();
			$stmt = $db->connect()->prepare($sql);

			$stmt->execute([$userID]);
			$wallpaper = $stmt->fetch();

			return $wallpaper;
		}

		public function startingWallpaper($userID) {
			$sql = "INSERT INTO wallpaper_inventory (userID, wallpaperID, wallpaperStatus) VALUES (?, 1, 'Equipped')";
			$db = new Database();
			
			$stmt = $db->connect()->prepare($sql);
			$stmt->execute([$userID]);
		}
	}
?>