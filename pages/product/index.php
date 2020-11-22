<div>
    <form class="flex flex-col items-center">
<<<<<<< HEAD
        <div class="shadow-lg max-w-sm rounded material-card bg-white mb-12">
            <div class="h-full flex flex-row justify-center">
=======
        <div class="shadow-lg max-w-sm rounded material-card bg-white ">
            <div class="h-full grid grid-cols-2">
>>>>>>> 88a94ae925c9091be62d254e2fc3a1991d53acd8
                <div class="px-2 py-2 inset-x-0 bottom-0">
                    <label class="block uppercase tracking-wide text-center text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        <?php print $GLOBALS['t']['product-index-sort'] ?>
                    </label>

                    <?php $s = $arg->field_values->sort_on_page ?>

                    <select name="sort_on_page" class="appearance-none text-center block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white border-gray-200" onchange="this.form.submit()">
                        <option value="price_low_high" <?php $s === "price_low_high" ? print "selected" : "" ?>><?php print $GLOBALS['t']['sort-price-asc'] ?></option>
                        <option value="price_high_low" <?php $s === "price_high_low" ? print "selected" : "" ?>><?php print $GLOBALS['t']['sort-price-desc'] ?></option>
                        <option value="name_low_high" <?php $s === "name_low_high" ? print "selected" : "" ?>><?php print $GLOBALS['t']['sort-name-asc'] ?></option>
                        <option value="name_high_low" <?php $s === "name_high_low" ? print "selected" : "" ?>><?php print $GLOBALS['t']['sort-name-desc'] ?></option>
                    </select>
                </div>

                <div class="px-2 py-2 inset-x-0 bottom-0">
                    <label class="block uppercase tracking-wide text-center text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        <?php print $GLOBALS['t']['product-index-num-product'] ?>
                    </label>

                    <?php $p = $arg->field_values->products_on_page ?>

                    <select name="products_on_page" class="appearance-none text-center block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white border-gray-200" onchange="this.form.submit()">
                        <option value="25" <?php $p === "25" ? print "selected" : "" ?>>25</option>
                        <option value="50" <?php $p === "50" ? print "selected" : "" ?>>50</option>
                        <option value="75" <?php $p === "75" ? print "selected" : "" ?>>75</option>
                    </select>
                </div>

            </div>
        </div>

        <input type="hidden" name="search" value="<?php print (isset($_GET['search'])) ? $_GET['search'] : ""; ?>">
        <input type="hidden" name="category_id" value="<?php print (isset($_GET['category_id'])) ? $_GET['category_id'] : ""; ?>">

        <?php if ($arg->ammount > 1) { ?>
            <div class="flex flex-col items-center mb-12">
                <div class="flex text-gray-700">
                    <div class="flex h-12 font-medium rounded-full bg-gray-300">
                        <?php for ($i = 1; $i <= $arg->ammount; $i++) { ?>
                            <?php if ($arg->field_values->page_number == ($i - 1)) { ?>

                                <div class="w-12 md:flex justify-center items-center hidden rounded-full bg-purple-600 text-white">
                                    <?php print $i; ?>
                                </div>

                            <?php } else { ?>
                                <div class="w-12 md:flex justify-center items-center hidden">
                                    <button class="p-3 focus:outline-none" value="<?php print $i - 1 ?>" type="submit" name="page_number"><?php print $i ?></button>
                                </div>

                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>


    </form>


    <?php if (!isset($arg->products) && count($arg->products) === 0) return print $GLOBALS['t']['product-index-not-found'] ?>

    <div class="flex mb-4 flex-wrap -mx-1 lg:-mx-4 grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-8">

        <?php foreach ($arg->products as $product) include "partials/productcard.php" ?>

    </div>
    <form>
        <?php if ($arg->ammount > 1) { ?>
            <div class="flex flex-col items-center my-12">
                <div class="flex text-gray-700">
                    <div class="flex h-12 font-medium rounded-full bg-gray-300">
                        <?php for ($i = 1; $i <= $arg->ammount; $i++) { ?>
                            <?php if ($arg->field_values->page_number == ($i - 1)) { ?>

                                <div class="w-12 md:flex justify-center items-center hidden rounded-full bg-purple-600 text-white">
                                    <?php print $i; ?>
                                </div>

                            <?php } else { ?>
                                <div class="w-12 md:flex justify-center items-center hidden">
                                    <button class="p-3 focus:outline-none" value="<?php print $i - 1 ?>" type="submit" name="page_number"><?php print $i ?></button>
                                </div>

                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>

    </form>

</div>

<script>
    const cartButton = document.querySelectorAll(`.cart-btn`);

    cartButton.forEach(btn => {
        btn.addEventListener('click', addToCart);
    });

    function addToCart(e) {
        let id = e.target.id.split('-')[2]

        request('/cart/add', 'POST', {
            'id': id
        }).then((result) => {
            new Alert({
                title: result.title,
                message: result.message,
                time: 2000
            })

            changeCounter(1)
        })
    }
</script>