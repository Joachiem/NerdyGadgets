<div class="container my-12 mx-auto px-4 md:px-12">

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

    <div class="flex flex-wrap mt-8 -mx-1 lg:-mx-4 grid lg:grid-cols-5 md:grid-cols-2 grid-cols-1 gap-8">

        <?php foreach ($arg as $product) { ?>

            <article class="max-w-sm rounded material-card bg-white">
                <a href="/products/view?id=<?php print $product->StockItemID ?>">
                    <div class="h-full">
                    <img class="w-full rounded-t" src="/public/StockItemIMG/<?php print $product->ImagePath ?>">
                        <div class="px-2 py-2 inset-x-0 bottom-0">
                            <div class="font-bold text-sm tracking-wide text-left"><?php print $product->StockItemName ?></div>
                            <div class="flex flex-wrap grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-0">
                                <div class="text-gray-500 text-sm">€ <?php print round($product->SellPrice, 2) ?><p class="text-xs">€ <?php print round($product->RecommendedRetailPrice, 2) ?> ex. btw</p></div>
                                <div class="text-right">
                                    <a class="tracking-wider uppercase font-bold text-green-700 hover:bg-green-200 bg-green-100 rounded pt-1 pr-2 pl-1 inline-block right-0" href="#"><ion-icon name="cart-outline" size="10px"></ion-icon></a>
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
            background-color: #FFF;
            box-shadow: 0px 2px 1px -1px rgba(0, 0, 0, 0.2), 0px 1px 1px 0px rgba(0, 0, 0, 0.14), 0px 1px 3px 0px rgba(0,0,0,.12);
        }
        </style>

    </div>
</div>




<!-- 


<section class="container pb-8">

    <div class="my-4">
        <h4 class="text-2xl my-2"><?php print $GLOBALS['t']['mainpage-recommended-products'] ?></h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
        </div>
    </div>

    <div class="my-4">
        <h4 class="text-2xl my-2"><?php print $GLOBALS['t']['mainpage-seen-recently'] ?></h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
            <div class="rounded bg-white shadow-md flex justify-center items-center flex-col px-4 py-2">
                <a class="h-32 w-32" href="/products/view?id=10">
                    <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
                </a>
                <a class="text-blue-700 font-semibold text-lg" href="/products/view?id=10">Product 1</a>
                <p class="text-gray-800  font-semibold text-lg">145,-</p>
            </div>
        </div>
    </div>
</section> -->