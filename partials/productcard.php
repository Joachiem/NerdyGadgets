<?php if (!$product) return ?>

<article class="shadow-lg max-w-sm rounded material-card bg-white">
    <div class="h-full flex flex-col justify-between">
        <div class="h-full flex items-center">
            <a href="/products/view?id=<?php print $product->StockItemID ?>">

                <?php if (isset($product->ImagePath) and !empty($product->ImagePath)) { ?>

                    <img class="w-full rounded-t p-1" src="/public/StockItemIMG/<?php print $product->ImagePath ?>">

                <?php } elseif (isset($product->StockGroupImagePath) and !empty($product->StockGroupImagePath)) { ?>

                    <img class="w-full rounded-t p-1" src="/public/StockGroupIMG/<?php print $product->StockGroupImagePath ?>">

                <?php } else { ?>

                    <img class="w-full rounded-t p-1" src="/public/StockGroupIMG/<?php print $product->BackupImagePath ?>">

                <?php } ?>

            </a>
        </div>

        <div class="px-2 py-2 inset-x-0 bottom-0">
            <a href="/products/view?id=<?php print $product->StockItemID ?>">
                <div class="no-underline hover:underline font-bold text-sm tracking-wide text-left"><?php print $product->StockItemName ?></div>
            </a>

            <div class="flex justify-between gap-0">
                <div class="col-span-2 text-gray-700 text-sm">
                    <p>€ <?php print round($product->SellPrice, 2) ?></p>
                    <p class="text-gray-500 text-xs">€ <?php print round($product->RecommendedRetailPrice, 2) . $GLOBALS['t']['excl-vat'] ?></p>
                    <p class="text-gray-600 text-sm"><?php print print $GLOBALS['t']['in-stock'] . $product->QuantityOnHand; ?></p>

                </div>
                <div class="flex items-end">
                    <button id="cart-btn" class="cart-btn tracking-wider uppercase font-bold text-green-700 hover:bg-green-200 bg-green-100 rounded inline-block right-0">
                        <ion-icon id="cart-btn-<?php print $product->StockItemID ?>" name="cart-outline" class="pt-1 pr-2 pl-1" size="10px"></ion-icon>
                    </button>
                </div>

            </div>
        </div>
    </div>
</article>