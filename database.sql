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

-- Primary key
ALTER TABLE `user`
    ADD PRIMARY KEY (`userID`);

ALTER TABLE `currency`
    ADD PRIMARY KEY (`currencyID`);

-- Auto increment
ALTER TABLE `user`
    MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `currency`
    MODIFY `currencyID` int(11) NOT NULL AUTO_INCREMENT;

-- Foreign key
ALTER TABLE `currency`
    ADD CONSTRAINT `currency_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);