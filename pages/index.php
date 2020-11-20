<div class="container mx-auto pb-8 px-4 md:px-18">

    <div class="md:hidden hidden lg:flex justify-between h-auto text-center">
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

    <div class="grid -mx-1 lg:-mx-4 mb-8 mt-4 md:grid-cols-1 grid-cols-1 lg:grid-cols-6 grid-rows-2 gap-8">
        <div class="md:col-span-1 col-span-1 lg:col-span-5 row-span-2 bg-white shadow-lg rounded object-cover overflow-hidden">
            <img class="rounded object-cover h-full w-full" src="/public/Img/christmas-sale-purple-discount-banner-with-garland_7993-5998.jpg">
        </div>

        <?php $product = $arg->popularSaleProducts[0] ?>

        <div class="flex">
            <?php include "partials/productcard.php"; ?>
        </div>

        <?php $product = $arg->popularSaleProducts[1] ?>

        <div class="flex">
            <?php include "partials/productcard.php"; ?>
        </div>
    </div>
    <p class="-mx-1 lg:-mx-4 text-gray-600 text-xl"><?php print $GLOBALS['t']['populair'] ?></p>
    <div class="flex mb-4 flex-wrap -mx-1 lg:-mx-4 grid lg:grid-cols-6 md:grid-cols-2 grid-cols-1 gap-8">

        <?php foreach ($arg->popularProducts as $product) {
            include "partials/productcard.php";
        } ?>

    </div>

    <p class="-mx-1 lg:-mx-4 text-gray-600 text-xl"><?php print $GLOBALS['t']['catogories'] ?></p>
    <div class="flex mb-4 flex-wrap -mx-1 lg:-mx-4 grid lg:grid-cols-6 md:grid-cols-2 grid-cols-1 gap-8">

        <?php foreach ($arg->categories as $StockGroup) {
            include "partials/catagoriecard.php";
        } ?>

    </div>

    <p class="-mx-1 lg:-mx-4 text-gray-600 text-xl"><?php print $GLOBALS['t']['products'] ?></p>
    <div class="flex mb-4 flex-wrap -mx-1 lg:-mx-4 grid lg:grid-cols-6 md:grid-cols-2 grid-cols-1 gap-8">

        <?php foreach ($arg->products as $product) {
            include "partials/productcard.php";
        } ?>

    </div>
</div>
<script>
    const cartButton = document.querySelectorAll(`.cart-btn`);

    cartButton.forEach(btn => {
        btn.addEventListener('click', addToCart);
    });

    function addToCart(e) {
        new Alert({
            title: '<?php print $GLOBALS['t']['add-alert-title'] ?>',
            message: '<?php print $GLOBALS['t']['add-alert-message'] ?>',
            time: 2000
        })

        changeCounter(1)

        let id = e.target.id.split('-')[2]
        let request = new XMLHttpRequest()
        request.open('POST', `/cart/add?id=${id}`)
        request.send()
    }
</script>