-- user table
CREATE TABLE `user` (
    `userID` int(11) NOT NULL,
    `userName` varchar(255) NOT NULL,
    `userEmail` varchar(255) NOT NULL,
    `userPwd` varchar(255) NOT NULL
);

-- currency table
CREATE TABLE `currency` (
    `currencyID` int(11) NOT NULL,
    `userID` int(11) NOT NULL,
    `currencyNum` int(11) NOT NULL
);

-- food table
CREATE TABLE `food` (
    `foodID` int(11) NOT NULL,
    `foodName` varchar(255) NOT NULL,
    `foodDesc` varchar(255) NOT NULL,
    `foodPrice` int(11) NOT NULL,
    `foodXP` int(11) NOT NULL,
    `foodHealth` int(11) NOT NULL,
    `foodHapp` int(11) NOT NULL,
    `foodImg` varchar(255) NOT NULL
);

-- food_inventory table
CREATE TABLE `food_inventory` (
    `userID` int(11) NOT NULL,
    `foodID` int(11) NOT NULL,
    `foodNum` int(11) NOT NULL
);

-- pet table
CREATE TABLE `pet` (
    `petID` int(11) NOT NULL,
    `petName` varchar(255) NOT NULL,
    `petRarity` varchar(255) NOT NULL,
    `petDesc` varchar(255) NOT NULL,
    `petImg` varchar(255) NOT NULL
);

-- pet_rarity table
CREATE TABLE `pet_rarity` (
    `petRarity` varchar(255) NOT NULL,
    `petHealthIn` int(11) NOT NULL,
    `petHappIn` int(11) NOT NULL
);

-- pet_inventory table
CREATE TABLE `pet_inventory` (
    `userID` int(11) NOT NULL,
    `petID` int(11) NOT NULL,
    `petLevel` int(11) NOT NULL,
    `petXP` int(11) NOT NULL,
    `petHealthTol` int(11) NOT NULL,
    `petHappTol` int(11) NOT NULL,
    `petHealthCur` int(11) NOT NULL,
    `petHappCur` int(11) NOT NULL,
    `petStatus` varchar(255) NOT NULL DEFAULT 'Kept'
);

-- wallpaper table
CREATE TABLE `wallpaper` (
    `wallpaperID` int(11) NOT NULL,
    `wallpaperName` varchar(255) NOT NULL,
    `wallpaperDesc` varchar(255) NOT NULL,
    `wallpaperPrice` int(11) NOT NULL,
    `wallpaperImg` varchar(255) NOT NULL
);

-- wallpaper_inventory table
CREATE TABLE `wallpaper_inventory` (
    `userID` int(11) NOT NULL,
    `wallpaperID` int(11) NOT NULL,
    `wallpaperStatus` varchar(11) NOT NULL
);

-- task table
CREATE TABLE `task` (
    `taskID` int(11) NOT NULL,
    `userID` int(11) NOT NULL,
    `taskTitle` varchar(255) NOT NULL,
    `taskDesc` varchar(255) NOT NULL,
    `taskDue` date NOT NULL,
    `taskStatus` varchar(255) NOT NULL DEFAULT 'Active'
);

-- difficulty table
CREATE TABLE `difficulty` (
    `difficultyID` int(11) NOT NULL,
    `difficultyTitle` varchar(255) NOT NULL,
    `currencyReward` int(11) NOT NULL,
    `XPReward` int(11) NOT NULL,
    `healthPenalize` int(11) NOT NULL,
    `currencyPenalize` int(11) NOT NULL
);

-- habit table
CREATE TABLE `habit` (
    `habitID` int(11) NOT NULL,
    `userID` int(11) NOT NULL,
    `difficultyID` int(11) NOT NULL,
    `habitTitle` varchar(255) NOT NULL,
    `habitDesc` varchar(255) NOT NULL,
    `habitPositive` int(1) NOT NULL,
    `habitNegative` int(1) NOT NULL
);



-- Primary key
ALTER TABLE `user`
    ADD PRIMARY KEY (`userID`);

ALTER TABLE `currency`
    ADD PRIMARY KEY (`currencyID`);

ALTER TABLE `food`
    ADD PRIMARY KEY (`foodID`);

ALTER TABLE `food_inventory`
    ADD PRIMARY KEY (`userID`,`foodID`);

ALTER TABLE `pet`
    ADD PRIMARY KEY (`petID`);

ALTER TABLE `pet_rarity`
    ADD PRIMARY KEY (`petRarity`);

ALTER TABLE `pet_inventory`
    ADD PRIMARY KEY (`userID`,`petID`);

ALTER TABLE `wallpaper`
    ADD PRIMARY KEY (`wallpaperID`);

ALTER TABLE `wallpaper_inventory`
    ADD PRIMARY KEY (`userID`,`wallpaperID`);

ALTER TABLE `task`
    ADD PRIMARY KEY (`taskID`);

ALTER TABLE `difficulty`
    ADD PRIMARY KEY (`difficultyID`);

ALTER TABLE `habit`
    ADD PRIMARY KEY (`habitID`);



-- Auto increment
ALTER TABLE `user`
    MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `currency`
    MODIFY `currencyID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `food`
    MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pet`
    MODIFY `petID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `wallpaper`
    MODIFY `wallpaperID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `task`
    MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `difficulty`
    MODIFY `difficultyID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `habit`
    MODIFY `habitID` int(11) NOT NULL AUTO_INCREMENT;



-- Foreign key
ALTER TABLE `currency`
    ADD CONSTRAINT `currency_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

ALTER TABLE `food_inventory`
    ADD CONSTRAINT `food_inventory_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
    ADD CONSTRAINT `food_inventory_ibfk_2` FOREIGN KEY (`foodID`) REFERENCES `food` (`foodID`);

ALTER TABLE `pet`
    ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`petRarity`) REFERENCES `pet_rarity` (`petRarity`);

ALTER TABLE `pet_inventory`
    ADD CONSTRAINT `pet_inventory_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
    ADD CONSTRAINT `pet_inventory_ibfk_2` FOREIGN KEY (`petID`) REFERENCES `pet` (`petID`);

ALTER TABLE `wallpaper_inventory`
    ADD CONSTRAINT `wallpaper_inventory_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
    ADD CONSTRAINT `wallpaper_inventory_ibfk_2` FOREIGN KEY (`wallpaperID`) REFERENCES `wallpaper` (`wallpaperID`);

ALTER TABLE `task`
    ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

ALTER TABLE `habit`
    ADD CONSTRAINT `habit_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
    ADD CONSTRAINT `habit_ibfk_2` FOREIGN KEY (`difficultyID`) REFERENCES `difficulty` (`difficultyID`);
