<?php

$GLOBALS['q'] = [
    // test for 
    'test' => 'SELECT StockGroupID, StockGroupName, ImagePath
    FROM stockgroups
    $1 
    limit ?',

    // get all categories that have a image
    'categories' => 'SELECT StockGroupID, StockGroupName, ImagePath
    FROM stockgroups
    WHERE StockGroupID 
    IN 
    (
        SELECT StockGroupID 
        FROM stockitemstockgroups
    ) 
    AND ImagePath IS NOT NULL
    ORDER BY StockGroupID ASC',

    // get a product
    'product' => "SELECT SI.StockItemID,
    (RecommendedRetailPrice*(1+(TaxRate/100))) AS SellPrice,
    StockItemName,
    CONCAT('Voorraad: ',QuantityOnHand) AS QuantityOnHand,
    SearchDetails, 
    (
        CASE WHEN (RecommendedRetailPrice*(1+(TaxRate/100))) > 50 THEN 0 ELSE 6.95 END
    )
    AS SendCosts, MarketingComments, CustomFields, SI.Video,
    (
        SELECT ImagePath
        FROM stockgroups
        JOIN stockitemstockgroups USING(StockGroupID)
        WHERE StockItemID = SI.StockItemID
        LIMIT 1
    ) 
    AS BackupImagePath   
    FROM stockitems SI 
    JOIN stockitemholdings SIH USING(stockitemid)
    JOIN stockitemstockgroups 
    ON SI.StockItemID = stockitemstockgroups.StockItemID
    JOIN stockgroups USING(StockGroupID)
    WHERE SI.stockitemid = ?
    GROUP BY StockItemID",

    'product-images' => 'SELECT ImagePath
    FROM stockitemimages
    WHERE StockItemID = ?',

    'products' => "SELECT SI.StockItemID, RecommendedRetailPrice, 
    (RecommendedRetailPrice*(1+(TaxRate/100))) AS SellPrice,
    StockItemName,
    CONCAT('Voorraad: ',QuantityOnHand) AS QuantityOnHand,
    SearchDetails, 
    (
        CASE WHEN (RecommendedRetailPrice*(1+(TaxRate/100))) > 50 THEN 0 ELSE 6.95 END
    )
    AS SendCosts, MarketingComments, CustomFields, SI.Video,
    (
        SELECT ImagePath
        FROM stockgroups
        JOIN stockitemstockgroups USING(StockGroupID)
        WHERE StockItemID = SI.StockItemID
        LIMIT 1
    ) 
    AS BackupImagePath, 

     (
        SELECT ImagePath
        FROM stockitemimages
        WHERE StockItemID = SI.StockItemID
        LIMIT 1
    )
    AS ImagePath

    FROM stockitems SI 
    JOIN stockitemholdings SIH USING(stockitemid)
    JOIN stockitemstockgroups 
    ON SI.StockItemID = stockitemstockgroups.StockItemID
    JOIN stockgroups USING(StockGroupID)

    -- JOIN stockitemimages AS SII
    -- ON SI.StockItemID = SII.StockItemID

    WHERE SI.stockitemid in ($1)
    GROUP BY StockItemID",


    'voorbeeld' => 'select * from people $1',


    'save-people' => "INSERT INTO people 
    (FullName, PreferredName, SearchName, IsPermittedToLogon, IsExternalLogonProvider, IsSystemUser, IsEmployee, IsSalesperson, Phonenumber, EmailAddress, LastEditedBy)
    VALUES ('Kahn Aksu', 'Kahn', 'Kahn Kahn Aksu', 1, 0, 1, 0, 0, '(316) 40259250' , 'kahnaksu@hotmail.com', 1)",


    'save-transaction' => "INSERT INTO customertransactions
    (CustomerID, TransactionTypeID, TransactionDate, AmountExcludingTax, TaxAmount, TransactionAmount, OutstandingBalance, LastEditedBy)
    VALUES (123, 1, '2020-11-17', 400.00, 60.00, 460.00, 0.00, 10)"


];
