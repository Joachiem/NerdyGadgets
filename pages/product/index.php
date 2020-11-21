<div>
    <form>
        <div>
            <input type="hidden" name="search" value="<?php print (isset($_GET['search'])) ? $_GET['search'] : ""; ?>">

            <h4><?php print $GLOBALS['t']['product-index-num-product'] ?></h4>

            <input type="hidden" name="category_id" value="<?php print (isset($_GET['category_id'])) ? $_GET['category_id'] : ""; ?>">

            <?php $p = $_SESSION['products_on_page'] ?>

            <select name="products_on_page" onchange="this.form.submit()">>
                <option value="25" <?php $p === "25" ? print "selected" : "" ?>>25</option>
                <option value="50" <?php $p === "50" ? print "selected" : "" ?>>50</option>
                <option value="75" <?php $p === "75" ? print "selected" : "" ?>>75</option>
            </select>

            <h4><?php print $GLOBALS['t']['product-index-sort'] ?></h4>

            <?php $s = $_SESSION['sort'] ?>

            <select name="sort" onchange="this.form.submit()">>
                <option value="price_low_high" <?php $s === "price_low_high" ? print "selected" : "" ?>><?php print $GLOBALS['t']['sort-price-asc'] ?></option>
                <option value="price_high_low" <?php $s === "price_high_low" ? print "selected" : "" ?>><?php print $GLOBALS['t']['sort-price-desc'] ?></option>
                <option value="name_low_high" <?php $s === "name_low_high" ? print "selected" : "" ?>><?php print $GLOBALS['t']['sort-name-asc'] ?></option>
                <option value="name_high_low" <?php $s === "name_high_low" ? print "selected" : "" ?>><?php print $GLOBALS['t']['sort-name-desc'] ?></option>
            </select>
        </div>

        <?php if ($arg->ammount > 0) { ?>
            <?php for ($i = 1; $i <= $arg->ammount; $i++) { ?>
                <?php if ($arg->page_number == ($i - 1)) { ?>

                    <div>
                        <?php print $i; ?>
                    </div>

                <?php } else { ?>

                    <button value="<?php print $i - 1 ?>" type="submit" name="page_number"><?php print $i ?></button>

                <?php } ?>
            <?php } ?>
        <?php } ?>

    </form>
</div>

<div>

    <?php if (isset($arg->products) && count($arg->products) > 0) { ?>
        <div class="flex mb-4 flex-wrap -mx-1 lg:-mx-4 grid lg:grid-cols-5 md:grid-cols-2 grid-cols-1 gap-8">

            <?php foreach ($arg->products as $product) {
                include "partials/productcard.php";
            } ?>

        </div>
    <?php } else { ?>

        <h2><?php print $GLOBALS['t']['product-index-not-found'] ?></h2>

    <?php } ?>

</div>