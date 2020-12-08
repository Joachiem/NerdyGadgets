<article class="overflow-hidden rounded-lg shadow-lg pb-4 ">
    <div class="flex flex-col w-full p-2 text-gray-800 bg-white shadow-lg pin-r pin-y rounded">
        <table class="w-full text-sm lg:text-base table-auto" cellspacing="0">
            <thead>
                <tr class="h-12 uppercase">
                    <th class="text-left">Order-ID</th>
                    <th class="text-left"><?php print $GLOBALS['t']['products'] ?></th>
                    <th class="lg:text-right text-left pl-5 lg:pl-0">
                        <span class="lg:inline">Qty<?php //print $GLOBALS['t']['amount'] 
                                                    ?></span>
                    </th>
                    <th class="text-right"> <?php print $GLOBALS['t']['price'] ?></th>
                </tr>
            </thead>
            <tbody>




                <?php foreach ($arg->orders as $order) { ?>

                    <tr class="border-b-2 ">
                        <td class="pb-4 md:table-cell">
                            <a href="/products/view?id=<?php print $order->OrderID
                                                        ?>"><?php print $order->OrderID ?>

                            </a>
                        </td>


                        <td class="pb-4 pt-1">
                            <ul>
                                <?php foreach ($order->lines as $lines) {
                                ?>
                                    <li> <a href="/products/view?id=<?php print $lines->StockItemID ?> " target="_blank">
                                            <?php print_r($lines->Description); ?>
                                        </a>
                                    </li>

                                <?php } ?>
                            </ul>


                        </td>

                        <td class="pb-4 md:table-cell m-4 text-right ">
                            <ul>
                                <?php foreach ($order->lines as $lines) {
                                ?>
                                    <li> <?php print_r($lines->Quantity); ?>
                                    </li>

                                <?php } ?>
                            </ul>


                        </td>


                        <td class="pb-4 md:table-cell m-4 text-right ">
                            <ul>
                                <?php foreach ($order->lines as $lines) {
                                ?>
                                    <li> <?php print_r($lines->UnitPrice); ?>
                                    </li>

                                <?php } ?>
                            </ul>


                        </td>


                    </tr>

                <?php } ?>

            </tbody>
        </table>


    </div>
</article>