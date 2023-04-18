-- Dump data for table `food`
INSERT INTO `food` (`foodName`, `foodDesc`, `foodPrice`, `foodHealth`, `foodHapp`, `foodImg`) VALUES
('Donut', 'Circular pastry with a hole in center, sweet, glazed or sprinkled topping for satisfying your cravings.', 
20, 10, 20, '../assets/foods/donut.png'),
('Ramen', 'Japanese noodle dish with savory broth, wheat noodles, and various toppings.', 
32, 20, 40, '../assets/foods/ramen.png'),
('Squid', 'Crispy, bite-sized pieces of deep-fried squid, seasoned with salt and spices.', 
26, 15, 30, '../assets/foods/squid.png'),
('Strawberry', 'Small, juicy, red fruit with sweet and tangy taste, edible seeds, provides health or energy boost.', 
20, 12, 24, '../assets/foods/strawberry.png');

-- Dump data for table `pet_rarity`
INSERT INTO `pet_rarity` (`petRarity`, `petHealthIn`, `petHappIn`) VALUES 
('Common', '100', '200'),
('Rare', '200', '150'),
('Legendary', '250', '100');

-- Dump data for table `pet`
INSERT INTO `pet` (`petName`, `petRarity`, `petDesc`, `petImg`) VALUES
('Bird', 'Common', 
'This avian is a real chatterbox! They love showing off their beautiful feathers and mimicking human speech, with their sweet singing and playful antics.', '../assets/pets/bird.png'),
('Dinosaur', 'Legendary', 
'This prehistoric pal is a blast from the past! Whether they\'re stomping around and roaring or curling up for a nap, they\'re the ultimate pet.', '../assets/pets/dinosaur.png'),
('Capybara', 'Legendary', 
'This gentle giant is the king of chill! They love lounging in the sun and taking dips in the water. With their large size and friendly nature, they\'re sure to make a unique personality to your pet collection.', '../assets/pets/capybara.png'),
('Cat', 'Common', 
'This sassy feline may seem aloof, but they secretly love getting attention from their humans, with their sleek fur and piercing eyes.', '../assets/pets/cat.png'),
('Chicken', 'Common', 
'This feathered friend may seem unassuming, but they\'re full of surprises! They love scratching around in the dirt and clucking happily when they find a tasty treat.', '../assets/pets/chicken.png'),
('Dog', 'Common', 
'This loyal pup loves nothing more than playing fetch and cuddling up with their owner. With their wagging tail, friendly bark and immense bravery, they\'re sure to be your new best friend forever!', '../assets/pets/dog.png'),
('Raccoon', 'Rare', 
'This mischievous critter is always up to something! Whether they\'re raiding your garbage can or snuggling up in a cozy spot, they\'re sure to keep you entertained.', '../assets/pets/raccoon.png');

-- Dump data for table `wallpaper`
INSERT INTO `wallpaper` (`wallpaperName`, `wallpaperDesc`, `wallpaperPrice`, `wallpaperImg`) VALUES
('Sky', 'A simple wallpaper design featuring a gradient of blue hues that evoke feelings of peace.', 0, '../assets/wallpapers/sky.png'),
('Meadow', 'A calming wallpaper design, featuring a serene landscape of gently swaying grasses and wildflowers.', 250, '../assets/wallpapers/meadow.png'),
('Folklore', 'A rustic wallpaper design, inspired by traditional tales from around the world.', 250, '../assets/wallpapers/folklore.png'),
('Campfire', 'Featuring a warm and flickering fire that conjures up images of camping trips.', 250, '../assets/wallpapers/campfire.png'),
('Mars', 'The Red Planet that captures the imagination and inspires a sense of adventure and exploration.', 500, '../assets/wallpapers/mars.png'),
('Starry Nights', 'A magical and enchanting wallpaper design, featuring a stunning night sky filled with twinkling stars', 500, '../assets/wallpapers/starrynight.png');

-- Dump data for table `difficulty`
INSERT INTO `difficulty` (`difficultyTitle`, `currencyReward`, `XPReward`, `healthPenalize`, `currencyPenalize`) VALUES 
('Easy', '5', '5', '10', '10'), 
('Medium', '10', '10', '20', '20'), 
('Hard', '20', '20', '30', '30');
