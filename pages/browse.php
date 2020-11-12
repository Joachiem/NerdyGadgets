<?php
$ReturnableResult = null;
$AmountOfPages = 0;
$queryBuildResult = "";
$ShowStockLevel = 1000;

$SearchString = isset($_GET['search']) ? $_GET['search'] : "";
$CategoryID = isset($_GET['category_id']) ? $_GET['category_id'] : "";
$PageNumber = isset($_GET['page_number']) ? $_GET['page_number'] : 0;



if (isset($_GET['sort'])) {
    $SortOnPage = $_GET['sort'];
    $_SESSION["sort"] = $_GET['sort'];
} elseif (isset($_SESSION["sort"])) {
    $SortOnPage = $_SESSION["sort"];
} else {
    $SortOnPage = "price_low_high";
    $_SESSION["sort"] = "price_low_high";
}

if (isset($_GET['products_on_page'])) {
    $ProductsOnPage = $_GET['products_on_page'];
    $_SESSION['products_on_page'] = $_GET['products_on_page'];
} elseif (isset($_SESSION['products_on_page'])) {
    $ProductsOnPage = $_SESSION['products_on_page'];
} else {
    $ProductsOnPage = 25;
    $_SESSION['products_on_page'] = 25;
}

$Offset = $PageNumber * $ProductsOnPage;

$sort_options = [
    'price_low_high' => 'SellPrice',
    'price_high_low' => 'SellPrice DESC',
    'name_low_high' => 'StockItemName',
    'name_high_low' => 'StockItemName DESC'
];

$Sort = $sort_options[$SortOnPage] ?: 'SellPrice';


$searchValues = explode(" ", $SearchString);

if ($SearchString != "") {
    for ($i = 0; $i < count($searchValues); $i++) {
        if ($i != 0) {
            $queryBuildResult .= "AND ";
        }
        $queryBuildResult .= "SI.SearchDetails LIKE '%$searchValues[$i]%' ";
    }
    if ($queryBuildResult != "") {
        $queryBuildResult .= " OR ";
    }
    if ($SearchString != "" || $SearchString != null) {
        $queryBuildResult .= "SI.StockItemID ='$SearchString'";
    }
}


if ($CategoryID === "") {
    if ($queryBuildResult !== "") {
        $queryBuildResult = "WHERE " . $queryBuildResult;
    }

    $allowed = ["SellPrice DESC", "SellPrice", "StockItemName DESC", "StockItemName"];
    $key = array_search($Sort, $allowed, true);

    if ($key === "") throw new InvalidArgumentException("Invalid field name");

    $Query = "SELECT SI.StockItemID, SI.StockItemName, SI.MarketingComments, ROUND(TaxRate * RecommendedRetailPrice / 100 + RecommendedRetailPrice,2) as SellPrice,
                (CASE WHEN (SIH.QuantityOnHand) >= ? THEN 'Ruime voorraad beschikbaar.' ELSE CONCAT('Voorraad: ',QuantityOnHand) END) AS QuantityOnHand, 
                (SELECT ImagePath
                FROM stockitemimages 
                WHERE StockItemID = SI.StockItemID LIMIT 1) as ImagePath,
                (SELECT ImagePath FROM stockgroups JOIN stockitemstockgroups USING(StockGroupID) WHERE StockItemID = SI.StockItemID LIMIT 1) as BackupImagePath
                FROM stockitems SI
                JOIN stockitemholdings SIH USING(stockitemid)
                $queryBuildResult
                GROUP BY StockItemID
                ORDER BY $Sort
                LIMIT ? OFFSET ?";


    $Statement = mysqli_prepare($Connection, $Query);
    mysqli_stmt_bind_param($Statement, "iii", $ShowStockLevel, $ProductsOnPage, $Offset);
    mysqli_stmt_execute($Statement);
    $ReturnableResult = mysqli_stmt_get_result($Statement);
    $ReturnableResult = mysqli_fetch_all($ReturnableResult, MYSQLI_ASSOC);

    $Query = "
            SELECT count(*)
            FROM stockitems SI
            $queryBuildResult";
    $Statement = mysqli_prepare($Connection, $Query);
    mysqli_stmt_execute($Statement);
    $Result = mysqli_stmt_get_result($Statement);
    $Result = mysqli_fetch_all($Result, MYSQLI_ASSOC);
} else {
    if ($queryBuildResult != "") {
        $queryBuildResult .= " AND ";
    }

    $Query = "SELECT SI.StockItemID, SI.StockItemName, SI.MarketingComments, 
                ROUND(SI.TaxRate * SI.RecommendedRetailPrice / 100 + SI.RecommendedRetailPrice,2) as SellPrice, 
                (CASE WHEN (SIH.QuantityOnHand) >= ? THEN 'Ruime voorraad beschikbaar.' ELSE CONCAT('Voorraad: ',QuantityOnHand) END) AS QuantityOnHand,
                (SELECT ImagePath FROM stockitemimages WHERE StockItemID = SI.StockItemID LIMIT 1) as ImagePath,
                (SELECT ImagePath FROM stockgroups JOIN stockitemstockgroups USING(StockGroupID) WHERE StockItemID = SI.StockItemID LIMIT 1) as BackupImagePath           
                FROM stockitems SI 
                JOIN stockitemholdings SIH USING(stockitemid)
                JOIN stockitemstockgroups USING(StockItemID)
                JOIN stockgroups ON stockitemstockgroups.StockGroupID = stockgroups.StockGroupID
                WHERE " . $queryBuildResult . " ? IN (SELECT StockGroupID from stockitemstockgroups WHERE StockItemID = SI.StockItemID)
                GROUP BY StockItemID
                ORDER BY " . $Sort . " 
                LIMIT ? OFFSET ?";

    $Statement = mysqli_prepare($Connection, $Query);
    mysqli_stmt_bind_param($Statement, "iiii", $ShowStockLevel, $CategoryID, $ProductsOnPage, $Offset);
    mysqli_stmt_execute($Statement);
    $ReturnableResult = mysqli_stmt_get_result($Statement);
    $ReturnableResult = mysqli_fetch_all($ReturnableResult, MYSQLI_ASSOC);

    $Query = "
                SELECT count(*)
                FROM stockitems SI 
                WHERE " . $queryBuildResult . " ? IN (SELECT SS.StockGroupID from stockitemstockgroups SS WHERE SS.StockItemID = SI.StockItemID)";
    $Statement = mysqli_prepare($Connection, $Query);
    mysqli_stmt_bind_param($Statement, "i", $CategoryID);
    mysqli_stmt_execute($Statement);
    $Result = mysqli_stmt_get_result($Statement);
    $Result = mysqli_fetch_all($Result, MYSQLI_ASSOC);
}
$amount = $Result[0];
if (isset($amount)) {
    $AmountOfPages = ceil($amount["count(*)"] / $ProductsOnPage);
}
?>
















<!-- start html -->

<div>
    <form>
        <div>
            <h4>Zoeken</h4>

            <input type="text" name="search" id="search" value="<?php print (isset($_GET['search'])) ? $_GET['search'] : ""; ?>" class="form-submit">

            <h4>Aantal producten op pagina</h4>

            <input type="hidden" name="category_id" id="category_id" value="<?php print (isset($_GET['category_id'])) ? $_GET['category_id'] : ""; ?>">

            <?php $p = $_SESSION['products_on_page'] ?>

            <select name="products_on_page" id="products_on_page" onchange="this.form.submit()">>
                <option value="25" <?php $p === "25" ? print "selected" : "" ?>>25</option>
                <option value="50" <?php $p === "50" ? print "selected" : "" ?>>50</option>
                <option value="75" <?php $p === "75" ? print "selected" : "" ?>>75</option>
            </select>

            <h4>Sorteren</h4>

            <?php $s = $_SESSION['sort'] ?>

            <select name="sort" id="sort" onchange="this.form.submit()">>
                <option value="price_low_high" <?php $s === "price_low_high" ? print "selected" : "" ?>>Prijs oplopend
                </option>
                <option value="price_high_low" <?php $s === "price_high_low" ? print "selected" : "" ?>>Prijs aflopend
                </option>
                <option value="name_low_high" <?php $s === "name_low_high" ? print "selected" : "" ?>>Naam oplopend
                </option>
                <option value="name_high_low" <?php $s === "name_high_low" ? print "selected" : "" ?>>Naam aflopend
                </option>
            </select>
        </div>

        <?php if ($AmountOfPages > 0) { ?>
            <?php for ($i = 1; $i <= $AmountOfPages; $i++) { ?>
                <?php if ($PageNumber == ($i - 1)) { ?>

                    <div id="SelectedPage">
                        <?php print $i; ?>
                    </div>

                <?php } else { ?>

                    <button id="page_number" class="PageNumber" value="<?php print $i - 1 ?>" type="submit" name="page_number"><?php print $i ?></button>

                <?php } ?>
            <?php } ?>
        <?php } ?>

    </form>
</div>

<div>

    <?php if (isset($ReturnableResult) && count($ReturnableResult) > 0) { ?>
        <?php foreach ($ReturnableResult as $row) { ?>

            <a class="ListItem" href='view?id=<?php print $row['StockItemID']; ?>'>
                <div id="ProductFrame">

                    <?php if (isset($row['ImagePath'])) { ?>

                        <img src="<?php print "public/StockItemIMG/" . $row['ImagePath']; ?>"></img>

                    <?php } elseif (isset($row['BackupImagePath'])) { ?>

                        <div class="ImgFrame" style="background-image: url('<?php print "public/StockGroupIMG/" . $row['BackupImagePath'] ?>'); background-size: cover;"></div>

                    <?php } ?>

                    <div id="StockItemFrameRight">
                        <div class="CenterPriceLeftChild">
                            <h1 class="StockItemPriceText"><?php print sprintf("€ %0.2f", $row["SellPrice"]); ?>
                            </h1>
                            <h6>Inclusief BTW </h6>
                        </div>
                    </div>
                    <h1 class="StockItemID">Artikelnummer: <?php print $row["StockItemID"]; ?>
                    </h1>
                    <p class="StockItemName"><?php print $row["StockItemName"]; ?>
                    </p>
                    <p class="StockItemComments"><?php print $row["MarketingComments"]; ?>
                    </p>
                    <h4 class="ItemQuantity"><?php print $row["QuantityOnHand"]; ?>
                    </h4>
                </div>
            </a>

        <?php } ?>
    <?php } else { ?>

        <h2>Yarr, er zijn geen resultaten gevonden.</h2>

    <?php } ?>

</div>