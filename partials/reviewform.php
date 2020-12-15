<?php $error_messages = isset($_SESSION['review']['error_messages']) ? (object)$_SESSION['review']['error_messages'] : [] ?>

<form method="POST" class="w-full">
    <div class="w-full flex flex-col">
        <fieldset name="rating" class="rating flex">
            <input type="radio" class="starbtn" id="star1" name="rating" value="1" checked /> <label class="full" for="star1" title="1 star"></label>
            <input type="radio" class="starbtn" id="star2" name="rating" value="2" <?php isset($_SESSION['review']['form']['rating']) ? print $_SESSION['review']['form']['rating'] === '2' ? 'checked' : '' : '' ?> /> <label class="full" for="star2" title="2 stars"></label>
            <input type="radio" class="starbtn" id="star3" name="rating" value="3" <?php isset($_SESSION['review']['form']['rating']) ? print $_SESSION['review']['form']['rating'] === '3' ? 'checked' : '' : '' ?> /> <label class="full" for="star3" title="3 stars"></label>
            <input type="radio" class="starbtn" id="star4" name="rating" value="4" <?php isset($_SESSION['review']['form']['rating']) ? print $_SESSION['review']['form']['rating'] === '4' ? 'checked' : '' : '' ?> /> <label class="full" for="star4" title="4 stars"></label>
            <input type="radio" class="starbtn" id="star5" name="rating" value="5" <?php isset($_SESSION['review']['form']['rating']) ? print $_SESSION['review']['form']['rating'] === '5' ? 'checked' : '' : '' ?> /> <label class="full" for="star5" title="5 stars"></label>
        </fieldset>

        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            <?php print $GLOBALS['t']['title'] ?>
        </label>
        <input class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php print isset($error_messages->title) ? 'border-red-500' : 'border-gray-200' ?>" name=" title" id="title" type="text" value="<?php isset($_SESSION['review']['form']['title']) ? print($_SESSION['review']['form']['title']) : '' ?>">

        <?php if (isset($error_messages->title)) { ?>

            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->title] ?></p>

        <?php } ?>

        <label class="block text-gray-700 text-sm font-bold mb-2" for="review">
            Review
        </label>
        <textarea class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php print isset($error_messages->review) ? 'border-red-500' : 'border-gray-200' ?>" name=" review" id="review" type="text"><?php isset($_SESSION['review']['form']['review']) ? print($_SESSION['review']['form']['review']) : '' ?></textarea>

        <?php if (isset($error_messages->review)) { ?>

            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->review] ?></p>

        <?php } ?>

    </div>

    <input class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="<?php print $GLOBALS['t']['submit_review'] ?>">
</form>

<style>
    /****** Style Star Rating Widget *****/

    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

    fieldset,
    label {
        margin: 0;
        padding: 0;
    }

    /****** Style Star Rating Widget *****/

    .rating {
        border: none;
        float: left;
    }

    .rating>input {
        display: none;
    }

    .rating>label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating>.half:before {
        content: "\f089";
        position: absolute;
    }

    .rating>label {
        color: #ddd;
        float: right;
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating>input:checked~label,
    /* show gold star when clicked */
    .rating:not(:checked)>label:hover,
    /* hover current star */
    .rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    /* hover previous stars in list */

    .rating>input:checked+label:hover,
    /* hover current star when changing rating */
    .rating>input:checked~label:hover,
    .rating>label:hover~input:checked~label,
    /* lighten current selection */
    .rating>input:checked~label:hover~label {
        color: #FFED85;
    }
</style>