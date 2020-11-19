<div class="container mb-12 mx-auto px-4 md:px-12">

    <div class="flex justify-between h-auto text-center">
        <div class="flex items-center">
            <ion-icon class="pr-1 pt-1 text-green-500" name="checkmark-done" size="small"></ion-icon><?php print $GLOBALS['t']['salepoint-1'] ?>
        </div>
        <div class="flex items-center">
            <ion-icon class="pr-1 pt-1 text-green-500" name="checkmark-done" size="small"></ion-icon>Gratis levering boven de 50 euro
        </div>
        <div class="flex items-center">
            <ion-icon class="pr-1 pt-1 text-green-500" name="checkmark-done" size="small"></ion-icon>Vandaag besteld = Morgen in huis
        </div>
        <div class="flex items-center">
            <ion-icon class="pr-1 pt-1 text-green-500" name="checkmark-done" size="small"></ion-icon>Gratis retouneren
        </div>
    </div>

    <div class="flex flex-wrap mt-8 -mx-1 lg:-mx-4 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8">

        <?php foreach ($arg as $product) { ?>

            <article class="flex justify-between flex-col overflow-hidden rounded-lg shadow-lg bg-white">
                <a href="/products/view?id=<?php print $product->StockItemID ?>">
                    <div>
                        <img alt="Placeholder" class="block object-cover p-4 w-full" src="/public/StockItemIMG/<?php print $product->ImagePath ?>">
                    </div>
                </a>

                <div class="flex flex-col items-center text-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="/products/view?id=<?php print $product->StockItemID ?>">
                            <?php print $product->StockItemName ?>
                        </a>
                    </h1>

                    <h1 class="text-2xl pt-4">€ <?php print round($product->SellPrice, 2) ?></h1>
                </div>
            </article>

        <?php } ?>

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