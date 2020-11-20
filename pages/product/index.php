<?php
$arg = new stdClass();



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

    $ReturnableResult = DB::execute($GLOBALS['q']['filterd-products'], [$ShowStockLevel, $ProductsOnPage, $Offset], [$queryBuildResult, $Sort]);
    $ReturnableResult = json_decode(json_encode($ReturnableResult), true);

    $amount = DB::execute($GLOBALS['q']['count-products'], [], [$queryBuildResult])[0];
} else {

    if ($queryBuildResult != "") {
        $queryBuildResult .= " AND ";
    }

    $ReturnableResult = DB::execute($GLOBALS['q']['filterd-products-catagory'], [$ShowStockLevel, $ProductsOnPage, $Offset], [$queryBuildResult, $Sort]);
    $ReturnableResult = json_decode(json_encode($ReturnableResult), true);

    $amount = DB::execute($GLOBALS['q']['count-products-catagory'], [], [$queryBuildResult])[0];
}

if (isset($amount)) {
    $AmountOfPages = ceil($amount->ammount / $ProductsOnPage);
}

?>

<div>
    <form>
        <div>
            <input type="hidden" name="search" id="search" value="<?php print (isset($_GET['search'])) ? $_GET['search'] : ""; ?>">

            <h4><?php print $GLOBALS['t']['product-index-num-product'] ?></h4>

            <input type="hidden" name="category_id" id="category_id" value="<?php print (isset($_GET['category_id'])) ? $_GET['category_id'] : ""; ?>">

            <?php $p = $_SESSION['products_on_page'] ?>

            <select name="products_on_page" id="products_on_page" onchange="this.form.submit()">>
                <option value="25" <?php $p === "25" ? print "selected" : "" ?>>25</option>
                <option value="50" <?php $p === "50" ? print "selected" : "" ?>>50</option>
                <option value="75" <?php $p === "75" ? print "selected" : "" ?>>75</option>
            </select>

            <h4><?php print $GLOBALS['t']['product-index-sort'] ?></h4>

            <?php $s = $_SESSION['sort'] ?>

            <select name="sort" id="sort" onchange="this.form.submit()">>
                <option value="price_low_high" <?php $s === "price_low_high" ? print "selected" : "" ?>><?php print $GLOBALS['t']['product-index-sort-price-asc'] ?>
                </option>
                <option value="price_high_low" <?php $s === "price_high_low" ? print "selected" : "" ?>><?php print $GLOBALS['t']['product-index-sort-price-desc'] ?>
                </option>
                <option value="name_low_high" <?php $s === "name_low_high" ? print "selected" : "" ?>><?php print $GLOBALS['t']['product-index-sort-name-asc'] ?>
                </option>
                <option value="name_high_low" <?php $s === "name_high_low" ? print "selected" : "" ?>><?php print $GLOBALS['t']['product-index-sort-name-desc'] ?>
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

            <a class="ListItem" href='/products/view?id=<?php print $row['StockItemID']; ?>'>
                <div id="ProductFrame">

                    <?php if (isset($row['ImagePath'])) { ?>

                        <img src="<?php print "public/StockItemIMG/" . $row['ImagePath']; ?>"></img>

                    <?php } elseif (isset($row['BackupImagePath'])) { ?>

                        <div class="ImgFrame" style="background-image: url('<?php print "public/StockGroupIMG/" . $row['BackupImagePath'] ?>'); background-size: cover;"></div>

                    <?php } ?>

                    <div id="StockItemFrameRight">
                        <div class="CenterPriceLeftChild">
                            <h1 class="StockItemPriceText"><?php print sprintf("€ %0.2f", $row["SellPrice"]); ?></h1>
                            <h6><?php print $GLOBALS['t']['incl-vat'] ?></h6>
                        </div>
                    </div>
                    <h1 class="StockItemID"><?php print $GLOBALS['t']['product-index-product-num'] ?><?php print $row["StockItemID"]; ?></h1>
                    <p class="StockItemName"><?php print $row["StockItemName"]; ?></p>
                    <p class="StockItemComments"><?php print $row["MarketingComments"]; ?></p>
                    <h4 class="ItemQuantity"><?php print $row["QuantityOnHand"]; ?></h4>
                </div>
            </a>

        <?php } ?>
    <?php } else { ?>

        <h2><?php print $GLOBALS['t']['product-index-not-found'] ?></h2>

    <?php } ?>

</div>