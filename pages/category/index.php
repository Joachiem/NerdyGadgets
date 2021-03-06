<div class="container my-4 mb-8 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8">

        <?php foreach ($arg as $StockGroup) { ?>

            <article class="overflow-hidden rounded-lg shadow-lg bg-white">
                <a href="/products?category_id=<?php print $StockGroup->StockGroupID ?>">
                    <div>
                        <img alt="Placeholder" class="block object-cover h-48 w-full" src="public/StockGroupIMG/<?php print $StockGroup->ImagePath ?>">
                    </div>
                </a>

                <div class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="/products?category_id=<?php print $StockGroup->StockGroupID ?>">
                            <?php print isset($GLOBALS['t'][$StockGroup->StockGroupName]) ? $GLOBALS['t'][$StockGroup->StockGroupName] : $StockGroup->StockGroupName ?>
                        </a>
                    </h1>
                </div>
            </article>

        <?php } ?>

    </div>
</div>