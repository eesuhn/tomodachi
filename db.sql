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
    `foodHunger` int(11) NOT NULL,
    `foodXP` int(11) NOT NULL,
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
    `petHungerIn` int(11) NOT NULL
);

-- pet_inventory table
CREATE TABLE `pet_inventory` (
    `userID` int(11) NOT NULL,
    `petID` int(11) NOT NULL,
    `petLevel` int(11) NOT NULL,
    `petXP` int(11) NOT NULL,
    `petHealthTol` int(11) NOT NULL,
    `petHungerTol` int(11) NOT NULL,
    `petHealthCur` int(11) NOT NULL,
    `petHungerCur` int(11) NOT NULL
);



-- Primary key
ALTER TABLE `user`
    ADD PRIMARY KEY (`userID`);

ALTER TABLE `currency`
    ADD PRIMARY KEY (`currencyID`);

ALTER TABLE `food`
    ADD PRIMARY KEY (`foodID`);

ALTER TABLE `pet`
    ADD PRIMARY KEY (`petID`);

ALTER TABLE `pet_rarity`
    ADD PRIMARY KEY (`petRarity`);



-- Auto increment
ALTER TABLE `user`
    MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `currency`
    MODIFY `currencyID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `food`
    MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pet`
    MODIFY `petID` int(11) NOT NULL AUTO_INCREMENT;



-- Foreign key
ALTER TABLE `currency`
    ADD CONSTRAINT `currency_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

ALTER TABLE `food_inventory`
    ADD CONSTRAINT `food_inventory_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
    ADD CONSTRAINT `food_inventory_ibfk_2` FOREIGN KEY (`foodID`) REFERENCES `food` (`foodID`);

ALTER TABLE `pet_inventory`
    ADD CONSTRAINT `pet_inventory_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
    ADD CONSTRAINT `pet_inventory_ibfk_2` FOREIGN KEY (`petID`) REFERENCES `pet` (`petID`);

ALTER TABLE `pet`
    ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`petRarity`) REFERENCES `pet_rarity` (`petRarity`);