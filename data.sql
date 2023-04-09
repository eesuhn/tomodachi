-- Dump data for table `food`
INSERT INTO `food` (`foodName`, `foodDesc`, `foodPrice`, `foodHunger`, `foodXP`, `foodImg`) VALUES 
('Donut', 
'A sweet and circular pastry with a hole in the middle, perfect for satisfying your sweet tooth cravings.', 
'6', '10', '10', '../assets/foods/donut.png'),
('Ramen', 
'A Japanese noodle soup dish, perfect for satisfying your hunger cravings.', 
'12', '20', '20', '../assets/foods/ramen.png'),
('Squid', 
'A sea creature that is perfect for satisfying your hunger cravings.', 
'8', '15', '15', '../assets/foods/squid.png'),
('Strawberry', 
'A sweet and juicy red fruit', 
'3', '6', '6', '../assets/foods/strawberry.png');

-- Dump data for table `pet_rarity`
INSERT INTO `pet_rarity` (`petRarity`, `petHealthIn`, `petHungerIn`) VALUES 
('Common', '100', '100'),
('Rare', '200', '200'),
('Legendary', '250', '250');

-- Dump data for table `pet`
INSERT INTO `pet` (`petName`, `petRarity`, `petDesc`, `petImg`) VALUES 
('Bird', 'Common', 
'This avian is a real chatterbox! They love showing off their beautiful feathers and mimicking human speech. With their sweet singing and playful antics, they\'re sure to brighten up your day.', 
'../assets/pets/bird.png'), 
('Capybara', 'Rare', 
'This gentle giant is the king of chill! They love lounging in the sun and taking dips in the water. With their large size and friendly nature, they\'re sure to make a unique and lovable addition to your pet collection.', 
'../assets/pets/capybara.png'), 
('Cat', 'Common', 
'This sassy feline may seem aloof, but they secretly love getting attention from their humans. With their sleek fur and piercing eyes, they\'re sure to make a stylish addition to your pet collection.', 
'../assets/pets/cat.png'), 
('Chicken', 'Common', 
'This feathered friend may seem unassuming, but they\'re full of surprises! They love scratching around in the dirt and clucking happily when they find a tasty treat. With their soft, downy feathers and quirky personality, they\'re sure to win your heart.', 
'../assets/pets/chicken.png'), 
('Dinosaur', 'Legendary', 
'This prehistoric pal is a blast from the past! Whether they\'re stomping around and roaring or curling up for a nap, they\'re sure to be a hit. With their scaly skin and fierce claws, they\'re the ultimate pet.', 
'../assets/pets/dinosaur.png'), 
('Dog', 'Common', 
'This loyal pup loves nothing more than playing fetch and cuddling up with their owner. With their wagging tail, friendly bark and immense bravery, they\'re sure to be your new best friend forever!', 
'../assets/pets/dog.png'), 
('Raccoon', 'Rare', 
'This mischievous critter is always up to something! Whether they\'re raiding your garbage can or snuggling up in a cozy spot, they\'re sure to keep you entertained. With their masked face and bushy tail, they\'re the perfect pet for anyone.', 
'../assets/pets/raccoon.png');

-- Dump data for table `food_inventory`
INSERT INTO `food_inventory` (`userID`, `foodID`, `foodNum`) VALUES 
('1', '1', '2'), 
('1', '2', '3'), 
('1', '3', '4'),
('1', '4', '5');

-- Dump data for table `wallpaper`
INSERT INTO `wallpaper` (`wallpaperName`, `wallpaperImg`, `wallpaperDesc`,`wallpaperPrice`) VALUES 
('Sky', '../assets/wallpapers/sky.png', 'A simple wallpaper design featuring a gradient of blue hues that evoke feelings of peace.','50'), 
('Meadow', '../assets/wallpapers/meadow.png', 'A calming and refreshing wallpaper design, featuring a serene landscape of gently swaying grasses and wildflowers','50'), 
('Folklore', '../assets/wallpapers/folklore.png', 'A rustic wallpaper design, , inspired by traditional tales and legends from around the world, featuring intricate patterns and symbols','50'), 
('Mars', '../assets/wallpapers/mars.png', 'A bold wallpaper design, featuring a stunning image of the Red Planet that captures the imagination and inspires a sense of adventure and exploration.','50'), 
('Campfire', '../assets/wallpapers/campfire.png', 'A cozy wallpaper design, featuring a warm and flickering fire that conjures up images of camping trips.','50'), 
('Starry Nights', '../assets/wallpapers/starrynight.png', 'A magical and enchanting wallpaper design, featuring a stunning night sky filled with twinkling stars','50');
