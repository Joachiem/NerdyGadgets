<?php

$GLOBALS['q'] = [
    /**
     * get all categories that have a image
     */
    'categories' => 'SELECT
    StockGroupID,
    StockGroupName,
    ImagePath
    FROM stockgroups
    WHERE StockGroupID 
    IN 
    (
        SELECT StockGroupID 
        FROM stockitemstockgroups
    ) 
    AND ImagePath IS NOT NULL
    ORDER BY StockGroupID ASC
    LIMIT ?',



    /**
     * get one product
     * @param ? id
     */
    'product' => "SELECT
    SI.StockItemID,
    SI.RecommendedRetailPrice,
    (RecommendedRetailPrice*(1+(TaxRate/100))) AS SellPrice,
    StockItemName,
    QuantityOnHand,
    SearchDetails, 
    SG.ImagePath AS StockGroupImagePath,
    (
        CASE WHEN (
            RecommendedRetailPrice * ( 1 + ( TaxRate / 100 ))
        ) > 50 THEN 0 ELSE 6.95 END
    )
    AS SendCosts, MarketingComments, CustomFields, SI.Video,
    (
        SELECT ImagePath
        FROM stockgroups
        JOIN stockitemstockgroups USING(StockGroupID)
        WHERE StockItemID = SI.StockItemID
        LIMIT 1
    ) 
    AS BackupImagePath, IsChillerStock 
    FROM stockitems SI 
    JOIN stockitemholdings SIH USING(stockitemid)
    JOIN stockitemstockgroups
    ON SI.StockItemID = stockitemstockgroups.StockItemID
    JOIN stockgroups AS SG USING(StockGroupID)
    WHERE SI.stockitemid = ?
    GROUP BY StockItemID",




    /**
     * get the most visited products 
     * @param ? limit
     */
    'popular-products' => "SELECT
    SI.StockItemID,
    RecommendedRetailPrice, 
    (RecommendedRetailPrice * ( 1 + ( TaxRate / 100 ))) AS SellPrice,
    StockItemName,
    QuantityOnHand,
    SearchDetails,
    stockgroups.ImagePath AS StockGroupImagePath,  
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
    WHERE SI.StockItemID NOT IN
        (SELECT SI.StockItemID
        FROM stockitems SI 
        JOIN stockitemstockgroups 
        ON SI.StockItemID = stockitemstockgroups.StockItemID
        WHERE StockGroupID = 11
        ORDER BY ClickedON DESC)
    GROUP BY StockItemID
    ORDER BY ClickedON DESC
    LIMIT ?",



    'popular-sale-products' => "SELECT SI.StockItemID, RecommendedRetailPrice, 
    (RecommendedRetailPrice*(1+(TaxRate/100))) AS SellPrice,
    StockItemName,
    QuantityOnHand,
    SearchDetails,
    stockgroups.ImagePath AS StockGroupImagePath,  
    (
        CASE WHEN (
            RecommendedRetailPrice * ( 1 + ( TaxRate / 100))
        ) > 50 THEN 0 ELSE 6.95 END
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
        RecommendedRetailPrice * ( 1 + (( TaxRate / 100))) * (1 - (SD.DiscountPercentage / 100))
    )
    AS DiscountPrice, 
    (
        RecommendedRetailPrice * (1 - (SD.DiscountPercentage / 100))
    )
    AS DiscountPriceNoVat, SD.DiscountPercentage,
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
    JOIN specialdeals SD ON SI.StockItemID = SD.StockItemID
    WHERE SI.StockItemID IN
        (
            SELECT StockItemID FROM specialdeals
        )
    GROUP BY StockItemID
    ORDER BY ClickedON DESC
    LIMIT ?",




    /**
     * update the product whith one click
     * @param ? id
     */
    'product-clicked' => 'UPDATE stockitems 
    SET ClickedON = ClickedON + 1
    WHERE StockItemID = ?',




    /**
     * get the images from products
     * @param ? id
     */
    'product-images' => 'SELECT ImagePath
    FROM stockitemimages
    WHERE StockItemID = ?',




    /**
     * get products
     * @param $1 [ids]
     */
    'products' => "SELECT SI.StockItemID, RecommendedRetailPrice, 
    (RecommendedRetailPrice*(1+(TaxRate/100))) AS SellPrice,
    StockItemName,
    QuantityOnHand,
    SearchDetails,
    stockgroups.ImagePath AS StockGroupImagePath, 

    (
        CASE WHEN (
            RecommendedRetailPrice * ( 1 + (TaxRate / 100))
        ) > 50 THEN 0 ELSE 6.95 END
    ) AS SendCosts, MarketingComments, CustomFields, SI.Video,

    (
        SELECT ImagePath
        FROM stockgroups
        JOIN stockitemstockgroups USING(StockGroupID)
        WHERE StockItemID = SI.StockItemID
        LIMIT 1
    ) AS BackupImagePath,

    (
        SELECT ImagePath
        FROM stockitemimages
        WHERE StockItemID = SI.StockItemID
        LIMIT 1
    ) AS ImagePath

    FROM stockitems SI 
    JOIN stockitemholdings SIH USING(stockitemid)
    JOIN stockitemstockgroups 
    ON SI.StockItemID = stockitemstockgroups.StockItemID
    JOIN stockgroups USING(StockGroupID)
    WHERE SI.stockitemid in ($1)
    GROUP BY StockItemID",




    /**
     * save the persons data
     */
    'save-people' => "INSERT INTO people 
    (FullName, PreferredName, SearchName, IsPermittedToLogon, IsExternalLogonProvider, IsSystemUser, IsEmployee, IsSalesperson, Phonenumber, EmailAddress, LastEditedBy)
    VALUES ('Kahn Aksu', 'Kahn', 'Kahn Kahn Aksu', 1, 0, 1, 0, 0, '(316) 40259250' , 'kahnaksu@hotmail.com', 1)",




    /**
     * save the transaction
     */
    'save-transaction' => "INSERT INTO customertransactions
    (CustomerID, TransactionTypeID, TransactionDate, AmountExcludingTax, TaxAmount, TransactionAmount, OutstandingBalance, LastEditedBy)
    VALUES (123, 1, '2020-11-17', 400.00, 60.00, 460.00, 0.00, 10)",



    /**
     * get all products but filterd, sorted and limited
     * @param $1 [ids]
     * @param $2 [ids]
     * @param ? [ids]
     * @param ? [ids]
     * @param ? [ids]
     */
    'filterd-products' => "SELECT
    SI.StockItemID,
    SI.StockItemName,
    SI.MarketingComments,
    RecommendedRetailPrice,
    ROUND(TaxRate * RecommendedRetailPrice / 100 + RecommendedRetailPrice, 2) as SellPrice,
    QuantityOnHand,

    (
        SELECT ImagePath
        FROM stockitemimages 
        WHERE StockItemID = SI.StockItemID 
        LIMIT 1
    ) as ImagePath,

    (
        SELECT ImagePath
        FROM stockgroups
        JOIN stockitemstockgroups
        USING(StockGroupID)
        WHERE StockItemID = SI.StockItemID
        LIMIT 1
    ) as BackupImagePath

    FROM stockitems SI
    JOIN stockitemholdings SIH USING(stockitemid)
    
    $1
    GROUP BY StockItemID
    ORDER BY $2
    LIMIT ? OFFSET ?",





    'filterd-products-catagory' => "SELECT
    SI.StockItemID,
    SI.StockItemName,
    SI.MarketingComments,
    RecommendedRetailPrice,
    ROUND(SI.TaxRate * SI.RecommendedRetailPrice / 100 + SI.RecommendedRetailPrice,2) as SellPrice,
    QuantityOnHand,

    (
        SELECT ImagePath
        FROM stockitemimages
        WHERE StockItemID = SI.StockItemID
        LIMIT 1
    ) as ImagePath,

    (
        SELECT ImagePath
        FROM stockgroups
        JOIN stockitemstockgroups
        USING(StockGroupID)
        WHERE StockItemID = SI.StockItemID
        LIMIT 1
    ) as BackupImagePath

    FROM stockitems SI 
    JOIN stockitemholdings SIH USING(stockitemid)
    JOIN stockitemstockgroups USING(StockItemID)
    JOIN stockgroups ON stockitemstockgroups.StockGroupID = stockgroups.StockGroupID
    WHERE $1 ? IN 
    (
        SELECT StockGroupID
        from stockitemstockgroups
        WHERE StockItemID = SI.StockItemID
    )

    GROUP BY StockItemID
    ORDER BY $2
    LIMIT ? OFFSET ?",



    'count-products' => "SELECT
    count(*) as ammount
    FROM stockitems SI
    $1",


    'count-products-catagory' => "SELECT
    count(*) as ammount
    FROM stockitems SI 
    WHERE $1 ? 
    IN 
    (
        SELECT SS.StockGroupID 
        from stockitemstockgroups SS 
        WHERE SS.StockItemID = SI.StockItemID
    )",


//Querys voor dataopslaan kopen producten.

    'get-product-info' => "SELECT Stockitemname, UnitpackageID, SearchDetails, Taxrate, RecommendedretailPrice FROM stockitems WHERE StockItemID = ? ",
    
    
    'set-product-info' => "INSERT INTO Orderlines (Orderid, Stockitemid, Discription, Packagetypeid, Quantity, Unitprice, Taxrate, lasteditedwhen)
    VALUES (23890, 1, 'Mug', 7, 2, 25, 6,'25-11-2020 12:00:00')",
    
    
    'set-people-info' => "INSERT INTO People(peopleid, Fullname, email, Phonenumber, Validfrom , ValidTo)
    VALUES (2873, 'Kahn Aksu', 'kahnaksu@hotmail.com', '0640259250', '9999-12-31 23:59:59', '2020-01-01 23:59:59')",

    'set-people-address' => "INSERT INTO Peopleaddress (addressid, Peopleid, address)
    VALUES (237, 2873, 'Willem dreeslaan 27')",

    'set-delivery-method' => "INSERT INTO invoices (DeliveryMethodID, Comments)
    VALUES (3, 'Afternoon') ",

    'set-order-info' => "INSERT INTO Orders (Orderid, Customerid, Orderdate,lasteditedwhen)
    VALUES (23890, 2873, '25-11-2020', '25-11-2020 12:00:00')",

    'set-order-details' => "INSERT INTO Orderlines (Orderid, Stockitemid, Discription, Packagetypeid, Quantity, Unitprice, Taxrate, lasteditedwhen)
    VALUES (23890, 1, 'Mug', 7, 2, 25, 6,'25-11-2020 12:00:00')",

    'set-invoice-details' => "INSERT INTO Invoices(invoiceid, customerid, billtocustomerid, orderid, deliverymethod, invoicedate, customerpurchaseordernumber, deliveryinstructions, totaldryitems, totalchilleritems, lasteditedwhen)
    VALUES (23890, 341, 341, 7, 3, '12-12-2012', 12626,'Willem Dreeslaan 27', 1, 1,'25-11-2020 12:00:00')",

    'set-invoicelines-details' => "INSERT INTO invoicelines(invoiceid, stockitemid, description, packagetype, Unitprice, Taxrate, Taxamount, extendedprice, lasteditedwhen)
    VALUES (23890, 1, 'mug', 7.00, 3.00, 6.00, 6.00, 25.00, '25-11-2020 12:00:00')",


    
];
