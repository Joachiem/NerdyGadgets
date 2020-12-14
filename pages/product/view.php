<?php if ($arg) { ?>
    <div>


        <div class="grid auto-cols-min grid-flow-col grid-cols-2 gap-8 mb-8">
            <div>
                <div class="overflow-hidden rounded-lg shadow-lg object-cover bg-white" style="height: 30rem;">

                    <?php if (isset($arg->images)) { ?>
                        <?php $i = 0 ?>
                        <?php foreach ($arg->images as $image) { ?>

                            <img id="big-img-<?php print $i ?>" alt="Placeholder" class="h-full w-full big-img object-contain p-2 <?php print $i > 0 ? 'hidden' : 'block' ?>" src="/public/StockItemIMG/<?php print $image->ImagePath ?>">

                            <?php $i++ ?>
                        <?php } ?>
                    <?php } else { ?>

                        <img alt="Placeholder" class="h-full w-full object-cover w-auto" src="/public/StockGroupIMG/<?php print $arg->StockGroupImagePath ?>">

                    <?php } ?>

                </div>

                <?php if (isset($arg->images)) { ?>
                    <?php if (count($arg->images) > 1) { ?>

                        <div class="grid grid-cols-4 gap-4 mt-4">

                            <?php $i = 0 ?>
                            <?php foreach ($arg->images as $image) { ?>

                                <div class="img-btn flex w-full rounded-lg shadow-lg bg-white">
                                    <img id="img-btn-<?php print $i ?>" alt="Placeholder" class="hover:bg-gray-200 p-1 relative rounded object-contain h-auto" src="/public/StockItemIMG/<?php print $image->ImagePath ?>">

                                    <?php $i++ ?>

                                </div>

                            <?php } ?>

                        </div>

                    <?php } ?>
                <?php } ?>

            </div>

            <div class="overflow-hidden rounded-lg shadow-lg p-2 md:p-4 bg-white">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl"> <?php print $arg->StockItemName; ?> </h1>
                </div>

                <?php if (isset($arg->DiscountPrice)) { ?>

                    <div class="w-full bg-red-600 text-center mb-4 rounded">
                        <h5 class="text-white font-bold p-1">Christmas Sale</h5>
                    </div>

                    <div>
                        <p class="text-gray-700 text-xl font-bold line-through"><?php printf("€ %.2f", $arg->SellPrice) ?> </p>
                        <p class="text-grey-darker text-2xl font-bold"><?php printf("€ %.2f", $arg->DiscountPrice) ?> </p>
                    </div>

                    <div class="mb-4">
                        <p class="text-gray-800 text-md font-bold"><?php printf("€ %.2f", $arg->DiscountPriceNoVat) .  print ' ' . $GLOBALS['t']['excl-vat'] ?></p>
                    </div>

                <?php } else { ?>

                    <div>
                        <p class="text-grey-darker text-2xl font-bold"><?php printf("€ %.2f", $arg->SellPrice) ?> </p>
                    </div>

                    <div class="mb-4">
                        <p class="text-grey text-gray-800 text-md font-bold"><?php printf("€ %.2f", $arg->RecommendedRetailPrice) .  print ' ' . $GLOBALS['t']['excl-vat'] ?></p>
                    </div>

                <?php } ?>

                <div class="flex flex-col mb-2">
                    <p class="text-grey-darker text-xl font-bold"><?php print($GLOBALS['t']['quantity-on-hand'] . ': ' . $arg->QuantityOnHand) ?></p>
                </div>

                <div class="flex flex-col mb-6">
                    <button id="add-to-cart-btn" class="text-xl shadow bg-green-500 hover:bg-green-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"><?php print $GLOBALS['t']['productpage-add-to-cart'] ?></button>
                </div>

                <div class="flex flex-col mb-2">
                    <h2 class="text-2xl font-bold"><?php print $GLOBALS['t']['productpage-product-information'] ?></h2>
                </div>

                <?php if (isset($arg->temp)) { ?>

                    <div>
                        <p><?php print('Temp: ' . $arg->temp) ?></p>
                    </div>

                <?php } ?>

                <div class="flex flex-col mb-6">
                    <p><?php print $arg->SearchDetails; ?></p>
                </div>

                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold"><?php print $GLOBALS['t']['productpage-specifications'] ?></h2>
                </div>


                <?php
                $CustomFields = json_decode($arg->CustomFields, true);
                if (is_array($CustomFields)) { ?>

                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2"><?php print $GLOBALS['t']['productpage-name'] ?></th>
                                <th class="px-4 py-2">Data</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($CustomFields as $SpecName => $SpecText) { ?>

                                <tr>
                                    <td class="border px-4 py-2"><?php print $SpecName; ?></td>
                                    <td class="border px-4 py-2">
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

                        </tbody>
                    </table>

                <?php } else { ?>

                    <p><?php print $arg->CustomFields; ?>.</p>

                <?php } ?>

            </div>
        </div>

        <div class="grid auto-cols-min grid-flow-col grid-cols-1 gap-8 mb-8">
            <div class="overflow-hidden rounded-lg shadow-lg object-cover bg-white p-4">

                <form method="POST" class="w-full w-full">

                    <p class="text-xs">Hoeveelheid sterren:</p>
                    <fieldset name="stars" class="rating flex">
                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="1 star"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="2 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="3 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="4 stars"></label>
                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="5 stars"></label>
                    </fieldset>

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        <?php //print $GLOBALS['t']['title'] 
                        ?>
                        title
                    </label>
                    <input class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" id="title" type="text" value="<?php isset($_SESSION['review']['form']['title']) ? print($_SESSION['review']['form']['title']) : '' ?>">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="review">
                        <?php //print $GLOBALS['t']['review'] 
                        ?>
                        review
                    </label>
                    <textarea class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="review" id="review" type="text"><?php isset($_SESSION['review']['form']['review']) ? print($_SESSION['review']['form']['review']) : '' ?></textarea>
                    <input class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Submit Review">
                </form>

                <?php foreach ($arg->reviews as $review) { ?>

                    <?php include "partials/review.php"; ?>

                <?php } ?>

            </div>

        </div>
    </div>


<?php } ?>

<script>
    (() => {
        const addToCartBtn = document.querySelector('#add-to-cart-btn')
        const id = <?php print $arg->StockItemID ?>

        addToCartBtn.addEventListener('click', () => {

            request('/cart/increment', 'PUT', {
                'id': id
            }).then((result) => {
                new Alert({
                    title: result.title,
                    message: result.message,
                    time: 2000
                })

                changeCounter(1)
            })
        })

        const imageButtons = document.querySelectorAll('.img-btn')
        const bigImages = Array.from(document.querySelectorAll('.big-img'))

        imageButtons.forEach(btn => btn.addEventListener('click', showBigImg))

        function showBigImg(e) {
            const id = e.target.id.split('-')[2]

            bigImages.forEach(bigImg => bigImg.classList.add('hidden'))
            bigImages.find(e => e.id.split('-')[2] === id).classList.remove('hidden')
        }
    })()
</script>