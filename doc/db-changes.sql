use nerdygadgets;

ALTER TABLE stockitems DROP COLUMN IF EXISTS ClickedON;
ALTER TABLE stockitems
ADD ClickedON INT(14)
NOT NULL
DEFAULT (0);

UPDATE `specialdeals` SET `StockItemID` = '74' WHERE `specialdeals`.`SpecialDealID` = 1;
UPDATE `specialdeals` SET `StockItemID` = '46' WHERE `specialdeals`.`SpecialDealID` = 2;

DROP TABLE IF EXISTS peopleaddress;
CREATE TABLE peopleaddress
(
    `addresid` INT(14) NOT NULL AUTO_INCREMENT,
    `peopleid` INT(14) NOT NULL,
    `zipcode` VARCHAR(20) NOT NULL,
    `housenmr` VARCHAR(8) NOT NULL,
    PRIMARY KEY (`addresid`),
    INDEX (`peopleid`)
)
ENGINE = InnoDB;

DROP TABLE IF EXISTS discount_codes;
CREATE TABLE discount_codes (
    discount_code varchar(25) NOT NULL,
    discount int NOT NULL,
    expire date NOT NULL,
    primary key (discount_code)
)
ENGINE = InnoDB;

INSERT INTO `discount_codes` (`discount_code`, `discount`, `expire`) VALUES ('50off', '50', '2022-12-31');

ALTER TABLE customers DROP CONSTRAINT IF EXISTS FK_Sales_Customers_BillToCustomerID_Sales_Customers;
ALTER TABLE orders DROP CONSTRAINT IF EXISTS FK_Sales_Orders_CustomerID_Sales_Customers;

DROP TABLE IF EXISTS reviews;
CREATE TABLE reviews
(
    ReviewID INT(11) NOT NULL AUTO_INCREMENT,
    StockItemID INT(11) NULL,
    PersonID INT(11) NOT NULL,
    ReviewTitle VARCHAR(64) NOT NULL,
    Rating INT(1) NOT NULL,
    Review MEDIUMTEXT NULL,
    Date DATETIME NOT NULL,
    PRIMARY KEY (reviewID)
)
ENGINE = InnoDB;