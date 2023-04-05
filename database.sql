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
    `foodImg` varchar(255) NOT NULL,
    `foodName` varchar(255) NOT NULL,
    `foodDesc` varchar(255) NOT NULL,
    `foodPrice` int(11) NOT NULL,
    `foodHunger` int(11) NOT NULL,
    `foodXP` int(11) NOT NULL
);

-- food_inventory table
CREATE TABLE `food_inventory` (
    `userID` int(11) NOT NULL,
    `foodID` int(11) NOT NULL,
    `foodNum` int(11) NOT NULL
);

-- Primary key
ALTER TABLE `user`
    ADD PRIMARY KEY (`userID`);

ALTER TABLE `currency`
    ADD PRIMARY KEY (`currencyID`);

ALTER TABLE `food`
    ADD PRIMARY KEY (`foodID`);

-- Auto increment
ALTER TABLE `user`
    MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `currency`
    MODIFY `currencyID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `food`
    MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT;

-- Foreign key
ALTER TABLE `currency`
    ADD CONSTRAINT `currency_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

ALTER TABLE `food_inventory`
    ADD CONSTRAINT `food_inventory_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
    ADD CONSTRAINT `food_inventory_ibfk_2` FOREIGN KEY (`foodID`) REFERENCES `food` (`foodID`);



-- Dump data for table `food`
INSERT INTO `food` (`foodImg`, `foodName`, `foodDesc`, `foodPrice`, `foodHunger`, `foodXP`) VALUES 
('../assets/foods/donut.png', 'Donut', 
'A sweet and circular pastry with a hole in the middle, perfect for satisfying your sweet tooth cravings.',
'6', '10', '10'),
('../assets/foods/ramen.png', 'Ramen',
'A Japanese dish consisting of noodles in a meat or fish-based broth, often flavored with soy sauce or miso.',
'10', '20', '20'),
('../assets/foods/squid.png', 'Squid',
'A marine mollusk with a soft body and eight tentacles, often served as a delicacy.',
'15', '30', '30'),
('../assets/foods/strawberry.png', 'Strawberry',
'A sweet and juicy red fruit, perfect for satisfying your sweet tooth cravings.',
'5', '10', '10');


CREATE TABLE `petRarity` (
  `rarity` varchar(10) NOT NULL,
  `petHealth` int(11) NOT NULL,
  `petHunger` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pet` (
  `petID` int(2) NOT NULL,
  `petName` varchar(25) NOT NULL,
  `petDesc` varchar(255) NOT NULL,
  `petRarity` varchar(10) NOT NULL,
  `petImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`petRarity`) REFERENCES `petRarity` (`rarity`);

INSERT INTO `pet` (`petID`, `petName`, `petDesc`, `petRarity`, `petImage`) VALUES
(1, 'Dog', 'This loyal pup loves nothing more than playing fetch and cuddling up with their owner. With their wagging tail, friendly bark and immense bravery, they\'re sure to be your new best friend forever!', 'Common', '../assets/pets/dog.png'),
(2, 'Cat ', 'This sassy feline may seem aloof, but they secretly love getting attention from their humans. With their sleek fur and piercing eyes, they\'re sure to make a stylish addition to your pet collection.', 'Common', '../assets/pets/cat.png'),
(3, 'Bird', 'This avian is a real chatterbox! They love showing off their beautiful feathers and mimicking human speech. With their sweet singing and playful antics, they\'re sure to brighten up your day.', 'Common', '../assets/pets/bird.png'),
(4, 'Chicken', 'This feathered friend may seem unassuming, but they\'re full of surprises! They love scratching around in the dirt and clucking happily when they find a tasty treat. With their soft, downy feathers and quirky personality, they\'re sure to win your heart.', 'Rare', '../assets/pets/chicken.png'),
(5, 'Raccoon', 'This mischievous critter is always up to something! Whether they\'re raiding your garbage can or snuggling up in a cozy spot, they\'re sure to keep you entertained. With their masked face and bushy tail, they\'re the perfect pet for anyone.', 'Rare', '../assets/pets/raccoon.png'),
(6, 'Capybara', 'This gentle giant is the king of chill! They love lounging in the sun and taking dips in the water. With their large size and friendly nature, they\'re sure to make a unique and lovable addition to your pet collection.', 'Rare', '../assets/pets/capybara.png'),
(7, 'Dinosaur', 'This prehistoric pal is a blast from the past! Whether they\'re stomping around and roaring or curling up for a nap, they\'re sure to be a hit. With their scaly skin and fierce claws, they\'re the ultimate pet.', 'Legendary', '../assets/pets/dinosaur.png');


CREATE TABLE `petInventory` (
  `userID` int(255) NOT NULL,
  `petID` int(2) NOT NULL,
  `petLevel` int(3) NOT NULL,
  `petXP` int(3) NOT NULL,
  `petHealth` int(3) NOT NULL,
  `petHunger` int(3) NOT NULL
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `petInventory`
  ADD PRIMARY KEY (`userID`,`petID`);

//petIDisFKofpettable 
ALTER TABLE `petInventory`
  ADD CONSTRAINT `petInventory_ibfk_1` FOREIGN KEY (`petID`) REFERENCES `pet` (`petID`);

//userIDisFKofusertable
ALTER TABLE `petInventory`
  ADD CONSTRAINT `petInventory_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

