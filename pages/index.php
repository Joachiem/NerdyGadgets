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

    <div class="grid -mx-1 lg:-mx-4 mb-8 mt-8 grid-cols-6 grid-rows-2 gap-8">
        <div class="col-span-5 row-span-2">
            <a><img class="rounded object-cover w-full" src="/public/Img/christmas-sale-purple-discount-banner-with-garland_7993-5998.jpg"></a>
        </div>
        <?php $product = $arg[0] ?>
        <div class="flex">
        <?php include "partials/productcard.php";?>
        </div>
        <div class="flex">
        <?php include "partials/productcard.php";?>
        </div>
    </div>
    <p class="-mx-1 lg:-mx-4 text-gray-600">Meestbekeken</p>
    <div class="flex flex-wrap -mx-1 lg:-mx-4 grid lg:grid-cols-6 md:grid-cols-2 grid-cols-1 gap-8">

        <?php foreach ($arg as $product) {include "partials/productcard.php";} ?>

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