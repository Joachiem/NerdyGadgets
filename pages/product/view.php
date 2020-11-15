<?php if ($arg) { ?>


    <div class="grid auto-cols-min grid-flow-col grid-cols-2 gap-8">

        <!-- <div> -->
        <div class="overflow-hidden rounded-lg shadow-lg object-cover">
            <?php for ($i = 0; $i < count($arg['images']); $i++) { ?>
                <img alt="Placeholder" class="h-full object-cover w-auto" src="/public/StockItemIMG/<?php print $arg['images'][$i]['ImagePath'] ?>">
            <?php } ?>
        </div>


        <!-- </div> -->


        <div class="overflow-hidden rounded-lg shadow-lg p-2 md:p-4">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl"> <?php print $arg["StockItemName"]; ?> </h1>
            </div>

            <div class="flex flex-col mb-4">
                <p class="text-grey-darker text-xl font-bold"><?php printf("€ %.2f", $arg['SellPrice']) ?></p>
            </div>

            <div class="flex flex-col mb-6">
                <button id="add-to-cart-btn" class="text-xl shadow bg-green-500 hover:bg-green-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">In mijn winkelmandje</button>
            </div>

            <div class="flex flex-col mb-2">
                <h2 class="text-2xl font-bold">Productinformatie</h2>
            </div>

            <div class="flex flex-col mb-6">
                <p><?php print $arg['SearchDetails']; ?></p>
            </div>

            <div class="flex flex-col">
                <h2 class="text-2xl font-bold">Specificaties</h2>
            </div>


            <?php
            $CustomFields = json_decode($arg['CustomFields'], true);
            if (is_array($CustomFields)) { ?>

                <table class="table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Naam</th>
                            <th class="px-4 py-2">Data</th>
                        </tr>
                    </thead>
                    <tbody class=" bg-white">
                        <tr>
                            <td class="border px-4 py-2">Intro to CSS</td>
                            <td class="border px-4 py-2">Adam</td>
                        </tr>

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

                <p><?php print $arg['CustomFields']; ?>.</p>

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