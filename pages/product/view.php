<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

</head>
<?php
$Query = " 
        SELECT SI.StockItemID, 
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

    if ($Result != null) {
    ?>
            <body>
                <div class="centercontainer">
                    <div class="prodname">
                        <h1><?php print $Result['StockItemName']; ?></h1>
                    </div>
                    <div class="prodprev">
                        <div class="slideshow-container">
                            <?php for ($i = 0; $i < count($Images); $i++) {
                            ?>
                                <div class="mySlides fade" style="display: block;">
                                    <img src="/public/StockItemIMG/<?php print $Images[$i]['ImagePath'] ?>">
                                </div>
                            <?php } ?>

                            <?php if (count($Images) >= 2) { ?>
                                <a class="prev" onclick="plusSlides(-1)">❮</a>
                                <a class="next" onclick="plusSlides(1)">❯</a>

                        </div>
                        <br>

                        <div style="text-align:center">
                            <?php for ($i = 0; $i < count($Images); $i++) {
                            ?>
                                <span class="miniprev" onclick="currentSlide(<?php print($i + 1) ?>)"><img src="/public/StockItemIMG/<?php print $Images[$i]['ImagePath'] ?>"></span>
                        <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="title">
                        <h2><?php print sprintf("€ %.2f", $Result['SellPrice']); ?></h2>
                        <ul>
                            <li>verzending binnen 2 werkdagen</li>
                            <li>verzending boven 20 euro gratis</li>
                            <li>2 jaar garantie</li>
                        </ul>
                        <a href="winkelmandje.php">
                            <div class="buybutton">In winkelmandje</div>
                        </a>
                    </div>
                    <div class="infobox">
                        <h2>Beschrijving</h2>
                        <p><?php print $Result['SearchDetails']; ?></p>
                    </div>
                    <div class="infobox">
                        <h2>Specificaties</h2>
                        <?php
                        $CustomFields = json_decode($Result['CustomFields'], true);
                        if (is_array($CustomFields)) { ?>
                            <table>
                                <thead>
                                    <th>Naam</th>
                                    <th>Data</th>
                                </thead>
                                <?php
                                foreach ($CustomFields as $SpecName => $SpecText) { ?>
                                    <tr>
                                        <td>
                                            <?php print $SpecName; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (is_array($SpecText)) {
                                                foreach ($SpecText as $SubText) {
                                                    print $SubText . " ";
                                                }
                                            } else {
                                                print $SpecText;
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                <?php } ?>

                            </table>

                        <?php } else { ?>

                            <p><?php print $Result['CustomFields']; ?>.</p>

                        <?php } ?>

                    </div>

                <?php } else { ?>

                    <h2 id="ProductNotFound">Het opgevraagde product is niet gevonden.</h2>

                <?php } ?>

                </div>

        </div>
</div>


<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>

<script>
    (() => {
        const addToCartBtn = document.querySelector('#add-to-card-btn')

        addToCartBtn.addEventListener("click", () => {
            let request = new XMLHttpRequest()
            request.open('POST', '/products/add?id=1')
            request.send()
        })
    })()
</script>

</body>

</html>