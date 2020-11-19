<article class="max-w-sm rounded material-card bg-white">
    <a href="/products/view?id=<?php print $product->StockItemID ?>">
        <div class="h-full flex flex-col justify-between">
            <div class="h-full flex items-center">
                <img class="w-full rounded-t p-1" src="/public/StockItemIMG/<?php print $product->ImagePath ?>">
            </div>
            <div class="px-2 py-2 inset-x-0 bottom-0">
                <div class="font-bold text-sm tracking-wide text-left"><?php print $product->StockItemName ?></div>
                <div class="flex flex-wrap grid grid-cols-3 gap-0">
                    <div class="col-span-2 text-gray-700 text-sm">€ <?php print round($product->SellPrice, 2) ?><p class="text-gray-500 text-xs">€ <?php print round($product->RecommendedRetailPrice, 2) ?> ex.FAT</p>
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

<style>
    .material-card {
        font-family: 'Roboto', sans-serif;
        box-shadow: 0px 2px 1px -1px rgba(0, 0, 0, 0.2), 0px 1px 1px 0px rgba(0, 0, 0, 0.14), 0px 1px 3px 0px rgba(0, 0, 0, .12);
    }
</style>