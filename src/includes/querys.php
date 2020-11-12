<?php
$Query = 
"SELECT SI.StockItemID, SI.StockItemName, SI.MarketingComments, ROUND(TaxRate * RecommendedRetailPrice / 100 + RecommendedRetailPrice,2) as SellPrice,

(CASE WHEN (SIH.QuantityOnHand) >= ? 
THEN 'Ruime voorraad beschikbaar.' 
ELSE CONCAT('Voorraad: ',QuantityOnHand) 
END) AS QuantityOnHand, 

(SELECT ImagePath
FROM stockitemimages 
WHERE StockItemID = SI.StockItemID 
LIMIT 1) as ImagePath,

(SELECT ImagePath 
FROM stockgroups 
JOIN stockitemstockgroups 
USING(StockGroupID) 
WHERE StockItemID = SI.StockItemID 
LIMIT 1) as BackupImagePath

FROM stockitems SI
JOIN stockitemholdings SIH 
USING(stockitemid)
`$queryBuildResult`
GROUP BY StockItemID
ORDER BY `$Sort` 
LIMIT ? OFFSET ?";
