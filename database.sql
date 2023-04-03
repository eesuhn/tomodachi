CREATE TABLE `user` (
    `userID` int(11) NOT NULL,
    `userName` varchar(255) NOT NULL,
    `userEmail` varchar(255) NOT NULL,
    `userPwd` varchar(255) NOT NULL
);

-- Primary key
ALTER TABLE `user`
    ADD PRIMARY KEY (`userID`);

-- Auto increment
ALTER TABLE `user`
    MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

//petIDisFKofpettable 
ALTER TABLE `petInventory`
  ADD CONSTRAINT `petInventory_ibfk_1` FOREIGN KEY (`petID`) REFERENCES `pet` (`petID`);

//userIDisFKofusertable
ALTER TABLE `petInventory`
  ADD CONSTRAINT `petInventory_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

