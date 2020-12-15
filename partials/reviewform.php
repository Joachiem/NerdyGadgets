<?php $error_messages = isset($_SESSION['review']['error_messages']) ? (object)$_SESSION['review']['error_messages'] : [] ?>

<form method="POST" class="w-full w-full">
    <fieldset name="stars" class="rating flex">
        <span class="star"><input type="radio" class="starbtn" id="star1" name="rating" value="1" checked /><label class="full" for="star1" title="1 star"></label></span>
        <span class="star"><input type="radio" class="starbtn" id="star2" name="rating" value="2" <?php isset($_SESSION['review']['form']['rating']) ? print $_SESSION['review']['form']['rating'] === '2' ? 'checked' : '' : '' ?> /><label class="full" for="star2" title="2 stars"></label></span>
        <span class="star"><input type="radio" class="starbtn" id="star3" name="rating" value="3" <?php isset($_SESSION['review']['form']['rating']) ? print $_SESSION['review']['form']['rating'] === '3' ? 'checked' : '' : '' ?> /><label class="full" for="star3" title="3 stars"></label></span>
        <span class="star"><input type="radio" class="starbtn" id="star4" name="rating" value="4" <?php isset($_SESSION['review']['form']['rating']) ? print $_SESSION['review']['form']['rating'] === '4' ? 'checked' : '' : '' ?> /><label class="full" for="star4" title="4 stars"></label></span>
        <span class="star"><input type="radio" class="starbtn" id="star5" name="rating" value="5" <?php isset($_SESSION['review']['form']['rating']) ? print $_SESSION['review']['form']['rating'] === '5' ? 'checked' : '' : '' ?> /><label class="full" for="star5" title="5 stars"></label></span>
    </fieldset>

    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        <?php //print $GLOBALS['t']['title'] 
        ?>
        title
    </label>
    <input class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php print isset($error_messages->title) ? 'border-red-500' : 'border-gray-200' ?>"" name=" title" id="title" type="text" value="<?php isset($_SESSION['review']['form']['title']) ? print($_SESSION['review']['form']['title']) : '' ?>">

    <?php if (isset($error_messages->title)) { ?>

        <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->title] ?></p>

    <?php } ?>

    <label class="block text-gray-700 text-sm font-bold mb-2" for="review">
        <?php //print $GLOBALS['t']['review'] 
        ?>
        review
    </label>
    <textarea class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php print isset($error_messages->review) ? 'border-red-500' : 'border-gray-200' ?>"" name=" review" id="review" type="text"><?php isset($_SESSION['review']['form']['review']) ? print($_SESSION['review']['form']['review']) : '' ?></textarea>

    <?php if (isset($error_messages->review)) { ?>

        <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->review] ?></p>

    <?php } ?>

    <input class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Submit Review">
</form>

<style>
.starbnt {
    content: '\f005  ';
}

.star {
    background-color: yellow;
}

.star:hover ~ .star {
    background-color: gray;
}

</style>