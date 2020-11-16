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
    WHERE StockItemID = ?'
];
