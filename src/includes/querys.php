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
];
