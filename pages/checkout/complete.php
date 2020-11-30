<div class="w-full py-6">
    <div class="flex">
        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                    <span class="grid text-white w-full">
                        <ion-icon class="place-self-center" size="small" name="person"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center text-gray-800 md:text-base"><?php print $GLOBALS['t']['information'] ?></div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center"
                     style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-white rounded items-center align-middle align-center flex-1">
                        <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                    <span class="grid text-white w-full">
                        <ion-icon class="place-self-center" size="small" name="home"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center text-gray-800 md:text-base"><?php print $GLOBALS['t']['shipping'] ?></div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center"
                     style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-white rounded items-center align-middle align-center flex-1">
                        <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto bg-green-500 border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                    <span class="grid text-white w-full">
                        <ion-icon class="place-self-center" size="small" name="card"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center text-gray-800 md:text-base"><?php print $GLOBALS['t']['payment'] ?></div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center"
                     style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-white rounded items-center align-middle align-center flex-1">
                        <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto bg-green-500 border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                    <span class="grid text-white w-full">
                        <ion-icon class="place-self-center" size="small" name="checkmark-done"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center text-gray-800 md:text-base"><?php print $GLOBALS['t']['overview'] ?></div>
        </div>
    </div>
</div>


<div class="flex justify-center">
    <div class="overflow-hidden rounded-lg shadow-lg mb-8 max-w-xl">

        <div class="leading-tight p-2 md:p-4 bg-white">
            <form class="w-full max-w-lg">

                <div class="justify-around text-xl flex w-full flex-wrap mb-6">
                    <h2><?php print $GLOBALS['t']['payment-done'] ?></h2>
                </div>
                <div>
                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                        <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left"><?php print $GLOBALS['t']['products'] ?></th>
                            <th class="lg:text-right text-left pl-5 lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Ant.</span>
                                <span class="hidden lg:inline"><?php print $GLOBALS['t']['quantity'] ?></span>
                            </th>
                            <th class="hidden text-right md:table-cell"><?php print $GLOBALS['t']['price'] ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($arg as $id => $product_obj) { ?>

                            <?php $Images = $product_obj['images'] ?>
                            <?php $Result = $product_obj['product'] ?>

                            <tr class="cart-items" id="row-<?php print $id; ?>">
                                <td class="hidden pb-4 md:table-cell">
                                    <img src="/public/StockItemIMG/<?php print $Images[0]->ImagePath; ?>"
                                         class="w-20 p-1 rounded" alt="Thumbnail">
                                </td>
                                <td>
                                    <a href="/products/view?id=<?php print $id; ?>">
                                        <p class="mb-2 md:ml-4"><?php print $Result[0]->StockItemName; ?></p>
                                    </a>
                                </td>
                                <td><?php print($product_obj['qty']) ?></td>
                                <td class="hidden text-right md:table-cell">
                                <span class="text-sm lg:text-base font-medium"> €
                                    <span id="price-<?php print($id) ?>">
                                        <?php print sprintf("%.2f", $Result[0]->SellPrice); ?>
                                    </span>
                                </span>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="flex md:items-center justify-around">
                    <a href="/"
                       class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                       type="button"><?php print $GLOBALS['t']['continue'] ?></a>
                </div>
            </form>
        </div>
    </div>
</div>