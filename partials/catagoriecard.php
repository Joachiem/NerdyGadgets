<article class="overflow-hidden rounded-lg shadow-lg bg-white md:col-span-1 col-span-1 lg:col-span-2">
                <a href="/products?category_id=<?php print $StockGroup->StockGroupID ?>">
                    <div>
                        <img alt="Placeholder" class="block object-cover h-48 w-full"
                             src="public/StockGroupIMG/<?php print $StockGroup->ImagePath ?>">
                    </div>
                </a>

                <div class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black"
                           href="/products?category_id=<?php print $StockGroup->StockGroupID ?>">
                            <?php print $StockGroup->StockGroupName ?>
                        </a>
                    </h1>
                </div>
            </article>