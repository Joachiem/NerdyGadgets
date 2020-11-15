<?php
class Product
{
    /**
     * index page
     * @param mixed $callback
     */
    public static function index()
    {
        try {
            $Connection = mysqli_connect("localhost", "root", "", "nerdygadgets");
            mysqli_set_charset($Connection, 'latin1');
            $DatabaseAvailable = true;
        } catch (mysqli_sql_exception $e) {
            $DatabaseAvailable = false;
        }
        if (!$DatabaseAvailable) {
            print '<h2>Website wordt op dit moment onderhouden.</h2>';
            die();
        }

        $Query = "SELECT SI.StockItemID,
        (RecommendedRetailPrice*(1+(TaxRate/100))) AS SellPrice, 
        StockItemName,
        CONCAT('Voorraad: ',QuantityOnHand)AS QuantityOnHand,
        SearchDetails, 
        (CASE WHEN (RecommendedRetailPrice*(1+(TaxRate/100))) > 50 THEN 0 ELSE 6.95 END) AS SendCosts, MarketingComments, CustomFields, SI.Video,
        (SELECT ImagePath FROM stockgroups JOIN stockitemstockgroups USING(StockGroupID) WHERE StockItemID = SI.StockItemID LIMIT 1) as BackupImagePath   
        FROM stockitems SI 
        JOIN stockitemholdings SIH USING(stockitemid)
        JOIN stockitemstockgroups ON SI.StockItemID = stockitemstockgroups.StockItemID
        JOIN stockgroups USING(StockGroupID)
        WHERE SI.stockitemid = ?
        GROUP BY StockItemID";

        $ShowStockLevel = 1000;
        $Statement = mysqli_prepare($Connection, $Query);
        mysqli_stmt_bind_param($Statement, "i", $_GET['id']);
        mysqli_stmt_execute($Statement);
        $ReturnableResult = mysqli_stmt_get_result($Statement);
        if ($ReturnableResult && mysqli_num_rows($ReturnableResult) == 1) {
            $Result = mysqli_fetch_all($ReturnableResult, MYSQLI_ASSOC)[0];
        } else {
            $Result = null;
        }
        //Get Images
        $Query = "
            SELECT ImagePath
            FROM stockitemimages 
            WHERE StockItemID = ?";

        $Statement = mysqli_prepare($Connection, $Query);
        mysqli_stmt_bind_param($Statement, "i", $_GET['id']);
        mysqli_stmt_execute($Statement);
        $R = mysqli_stmt_get_result($Statement);
        $R = mysqli_fetch_all($R, MYSQLI_ASSOC);

        if ($R) {
            $Images = $R;
        }

        View::show('product/view', $Result);
    }
}
