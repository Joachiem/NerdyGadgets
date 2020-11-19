<?php if ($arg) { ?>

    <div class="grid auto-cols-min grid-flow-col grid-cols-2 gap-8 mb-8">

        <div>
            <div class="overflow-hidden h-96 rounded-lg shadow-lg object-cover bg-white">


                <?php if (isset($arg->images)) { ?>
                    <?php $i = 0 ?>
                    <?php foreach ($arg->images as $image) { ?>

                        <img alt="Placeholder" class="object-cover w-auto <?php print $i > 0 ? 'hidden' : 'block' ?>" src="/public/StockItemIMG/<?php print $image->ImagePath ?>">
                        <?php $i++ ?>

                    <?php } ?>
                <?php } else { ?>

                    <img alt="Placeholder" class="object-cover w-auto" src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.clarksonmotors.co.uk%2Fwp-content%2Fuploads%2F2015%2F04%2Fplaceholder-600x400.png&f=1&nofb=1">

                <?php } ?>

            </div>


            <div class="flex gap-4 mt-4">

                <?php if (isset($arg->images)) { ?>
                    <?php $i = 0 ?>
                    <?php foreach ($arg->images as $image) { ?>
                        <div class="flex p-1 overflow-hidden h-20 w-20 rounded-lg shadow-lg bg-white">

                            <img alt="Placeholder" class="object-cover w-auto" src="/public/StockItemIMG/<?php print $image->ImagePath ?>">
                            <?php $i++ ?>
                        </div>

                    <?php } ?>
                <?php }  ?>
            </div>

        </div>

        <div class="overflow-hidden rounded-lg shadow-lg p-2 md:p-4 bg-white">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl"> <?php print $arg->StockItemName; ?> </h1>
            </div>

            <div class="">
                <p class="text-grey-darker text-2xl font-bold"><?php printf("€ %.2f", $arg->SellPrice) ?> </p>
                <p class="text-sm"><?php print $GLOBALS['t']['product-index-incl-vat'] ?></p>
            </div>

            <div class="mb-4">
                <p class="text-grey text-gray-800 text-md font-bold"><?php printf("€ %.2f", $arg->RecommendedRetailPrice) ?></p>
                <p class="text-sm"><?php print $GLOBALS['t']['product-index-excl-vat'] ?></p>
            </div>

            <div class="flex flex-col mb-2">
                <p class="text-grey-darker text-xl font-bold"><?php print($GLOBALS['t']['quantity-on-hand'] . ': ' . $arg->QuantityOnHand) ?></p>
            </div>

            <div class="flex flex-col mb-6">
                <button id="add-to-cart-btn" class="text-xl shadow bg-green-500 hover:bg-green-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"><?php print $GLOBALS['t']['productpage-add-to-cart'] ?></button>
            </div>

            <div class="flex flex-col mb-2">
                <h2 class="text-2xl font-bold"><?php print $GLOBALS['t']['productpage-product-information'] ?></h2>
            </div>

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


<?php } ?>

<script>
    (() => {
        const addToCartBtn = document.querySelector('#add-to-cart-btn')

        addToCartBtn.addEventListener("click", () => {
            let request = new XMLHttpRequest()
            request.open('POST', '/cart/add?id=<?php print($_GET['id']) ?>')
            request.send()
        })
    })()
</script>