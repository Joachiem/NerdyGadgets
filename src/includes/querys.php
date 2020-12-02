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

    'get-product-info' => "SELECT Stockitemname, UnitpackageID, SearchDetails, Taxrate, RecommendedRetailPrice, IsChillerStock FROM stockitems WHERE StockItemID = ? ",
    
    
    'set-product-info' => "INSERT INTO Orderlines (OrderID, StockItemID, Description, PackageTypeID, Quantity, UnitPrice, TaxRate, PickedQuantity, PickingCompletedWhen, LastEditedBy, LastEditedWhen)
    VALUES (?, ?, ?, ?, ?, ?, 5, ?, '', 1, ?)",
    
    'set-customer-info' => "INSERT INTO Customers(CustomerID, CustomerName, BillToCustomerID, CustomerCategoryID, PrimaryContactPersonID, DeliveryMethodID, DeliveryCityID, PostalCityID, AccountOpenedDate, StandardDiscountPercentage, 
    IsStatementSent, IsOnCreditHold, PaymentDays, PhoneNumber, FaxNumber, WebsiteURL, DeliveryAddressLine1, DeliveryPostalCode, PostalAddressLine1, PostalPostalCode, LastEditedBy, ValidFrom, ValidTo)
    VALUES (?, ?, ?, 5, ?, 1, 1, 1, ?, 0, 1, 0, 0, ?, 0, '1', ?, ?, ?, ?, 1, ?, '9999-12-31 23:59:59')",
    
    'set-people-info' => "INSERT INTO People(FullName, PreferredName, SearchName, IsPermittedToLogon, IsExternalLogonProvider, IsSystemUser, IsEmployee, IsSalesPerson, EmailAddress, PhoneNumber, LastEditedBy, ValidFrom , ValidTo)
    VALUES (?, 'Rick', 'Roll', 1, 1, 1, 0, 0, ?, ?, 1, ?, '9999-12-31 23:59:59')",

    'set-people-address' => "INSERT INTO Peopleaddress (peopleid, zipcode, housenmr)
    VALUES (?, ?, ?)",

    'set-order-info' => "INSERT INTO Orders (OrderID, CustomerID, SalespersonPersonID, ContactPersonID, OrderDate, ExpectedDeliveryDate, IsUndersupplyBackordered, LastEditedBy, LastEditedWhen)
    VALUES (?, ?, 5, 5, ?, '9999-12-31', 0, 5, ?)",

    'set-invoice-details' => "INSERT INTO Invoices(InvoiceID, CustomerID, BillToCustomerID, OrderID, DeliveryMethodID, ContactPersonID, AccountsPersonID, SalespersonPersonID, PackedByPersonID, InvoiceDate, CustomerPurchaseOrderNumber, IsCreditNote, DeliveryInstructions, TotalDryItems, TotalChillerItems, LastEditedBy, LastEditedWhen)
    VALUES (?, ?, ?, ?, 1, 5, 5, 5, 5, ?, 0, 0, ?, ?, ?, 1, ?)",

    'set-invoicelines-details' => "INSERT INTO invoicelines(InvoiceID, StockItemID, Description, PackageTypeID, Quantity, UnitPrice, TaxRate, TaxAmount, LineProfit, ExtendedPrice, LastEditedBy, LastEditedWhen)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, 5, ?, 7 ,?)",


    
];
