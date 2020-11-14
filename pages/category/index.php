<?php
$Query = "SELECT StockGroupID, StockGroupName, ImagePath
            FROM stockgroups 
            WHERE StockGroupID IN (
                                    SELECT StockGroupID 
                                    FROM stockitemstockgroups
                                    ) AND ImagePath IS NOT NULL
            ORDER BY StockGroupID ASC";
$Statement = mysqli_prepare($Connection, $Query);
mysqli_stmt_execute($Statement);
$Result = mysqli_stmt_get_result($Statement);
$StockGroups = mysqli_fetch_all($Result, MYSQLI_ASSOC);
?>


<!-- start html -->
<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">


        <?php if (isset($StockGroups)) { ?>
            <?php foreach ($StockGroups as $StockGroup) { ?>


                <article class="overflow-hidden rounded-lg shadow-lg">
                    <a href="/products?category_id=<?php print $StockGroup["StockGroupID"]; ?>">
                        <div>
                            <img alt="Placeholder" class="block object-cover h-48 w-full" src="public/StockGroupIMG/<?php print $StockGroup["ImagePath"]; ?>">
                        </div>
                    </a>

                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="/products?category_id=<?php print $StockGroup["StockGroupID"]; ?>">
                                <?php print $StockGroup["StockGroupName"]; ?>
                            </a>
                        </h1>
                        <!-- <p class="text-grey-darker text-sm">
                                14/4/19
                            </p> -->
                    </header>
                </article>


            <?php } ?>
        <?php } ?>


    </div>
</div>