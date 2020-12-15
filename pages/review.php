<div class="grid auto-cols-min grid-flow-col grid-cols-1 gap-8 mb-8">
    <div class="overflow-hidden rounded-lg shadow-lg object-cover bg-white p-4">

        <?php if (isset($_SESSION['user']->PersonID)) { ?>

            <form method="POST" class="w-full w-full">
                <p class="text-xs">Hoeveelheid sterren:</p>
                <fieldset name="stars" class="rating flex">
                    <input type="radio" id="star1" name="rating" value="1" <?php print $_SESSION['review']['form']['rating'] === '1' ? 'checked' : '' ?> /><label class="full" for="star1" title="1 star"></label>
                    <input type="radio" id="star2" name="rating" value="2" <?php print $_SESSION['review']['form']['rating'] === '2' ? 'checked' : '' ?> /><label class="full" for="star2" title="2 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" <?php print $_SESSION['review']['form']['rating'] === '3' ? 'checked' : '' ?> /><label class="full" for="star3" title="3 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" <?php print $_SESSION['review']['form']['rating'] === '4' ? 'checked' : '' ?> /><label class="full" for="star4" title="4 stars"></label>
                    <input type="radio" id="star5" name="rating" value="5" <?php print $_SESSION['review']['form']['rating'] === '5' ? 'checked' : '' ?> /><label class="full" for="star5" title="5 stars"></label>
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

        <?php } ?>

        <?php foreach ($arg as $review) { ?>

            <?php include "partials/review.php"; ?>

        <?php } ?>

    </div>

</div>