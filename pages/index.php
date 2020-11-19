<div class="container mx-auto pb-8 px-4 md:px-12">

    <div class="flex justify-between h-auto text-center">
        <div class="flex items-center">
            <ion-icon class="pr-1 pt-1 text-green-500" name="checkmark-done" size="small"></ion-icon><?php print $GLOBALS['t']['salepoint-1'] ?>
        </div>
        <div class="flex items-center">
            <ion-icon class="pr-1 pt-1 text-green-500" name="checkmark-done" size="small"></ion-icon><?php print $GLOBALS['t']['salepoint-2'] ?>
        </div>
        <div class="flex items-center">
            <ion-icon class="pr-1 pt-1 text-green-500" name="checkmark-done" size="small"></ion-icon><?php print $GLOBALS['t']['salepoint-3'] ?>
        </div>
        <div class="flex items-center">
            <ion-icon class="pr-1 pt-1 text-green-500" name="checkmark-done" size="small"></ion-icon><?php print $GLOBALS['t']['salepoint-4'] ?>
        </div>
    </div>

    <div class="grid -mx-1 lg:-mx-4 mt-8 grid-cols-4 gap-8">
        <div class="col-span-3">
            <a><img class="rounded object-cover w-full" src="/public/Img/christmas-sale-purple-discount-banner-with-garland_7993-5998.jpg"></a>
        </div>
        <?php $product = $arg[0] ?>
        <div class="flex">
            <article class="max-w-sm rounded material-card bg-white">
                <a href="/products/view?id=<?php print $product->StockItemID ?>">
                    <div class="h-full flex flex-col justify-between">
                        <div class="h-full flex items-center">
                            <img class="w-full rounded-t p-1" src="/public/StockItemIMG/<?php print $product->ImagePath ?>">
                        </div>
                        <div class="px-2 py-2 inset-x-0 bottom-0">
                            <div class="font-bold text-sm tracking-wide text-left"><?php print $product->StockItemName ?></div>
                            <div class="flex flex-wrap grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-0">
                                <div class="text-gray-500 text-sm">€ <?php print round($product->SellPrice, 2) ?><p class="text-xs">€ <?php print round($product->RecommendedRetailPrice, 2) ?> ex. btw</p>
                                </div>
                                <div class="text-right">
                                    <p class="tracking-wider uppercase font-bold text-green-700 hover:bg-green-200 bg-green-100 rounded pt-1 pr-2 pl-1 inline-block right-0" href="#">
                                        <ion-icon name="cart-outline" size="10px"></ion-icon>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

            </article>
        </div>
    </div>
    <div class="flex flex-wrap mt-8 -mx-1 lg:-mx-4 grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-8">

        <?php foreach ($arg as $product) { ?>

            <article class="max-w-sm rounded material-card bg-white">
                <a href="/products/view?id=<?php print $product->StockItemID ?>">
                    <div class="h-full flex flex-col justify-between">
                        <div class="h-full flex items-center">
                            <img class="w-full rounded-t p-1" src="/public/StockItemIMG/<?php print $product->ImagePath ?>">
                        </div>
                        <div class="px-2 py-2 inset-x-0 bottom-0">
                            <div class="font-bold text-sm tracking-wide text-left"><?php print $product->StockItemName ?></div>
                            <div class="flex flex-wrap grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-0">
                                <div class="text-gray-500 text-sm">€ <?php print round($product->SellPrice, 2) ?><p class="text-xs">€ <?php print round($product->RecommendedRetailPrice, 2) ?> ex. btw</p>
                                </div>
                                <div class="text-right">
                                    <p class="tracking-wider uppercase font-bold text-green-700 hover:bg-green-200 bg-green-100 rounded pt-1 pr-2 pl-1 inline-block right-0" href="#">
                                        <ion-icon name="cart-outline" size="10px"></ion-icon>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

            </article>

        <?php } ?>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <style>
            .material-card {
                font-family: 'Roboto', sans-serif;
                box-shadow: 0px 2px 1px -1px rgba(0, 0, 0, 0.2), 0px 1px 1px 0px rgba(0, 0, 0, 0.14), 0px 1px 3px 0px rgba(0, 0, 0, .12);
            }
        </style>

    </div>
</div>
