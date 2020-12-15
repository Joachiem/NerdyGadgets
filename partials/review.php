<div class="flex items-start my-2">
    <div>
        <div class="flex items-baseline">
            <span class="text-gray-600 font-bold"><?php print($review->FullName); ?></span>

            <?php if (isset($arg->verified_buyer)) { ?>

                <span class="ml-2 text-green-600 text-xs">Verified Buyer</span>

            <?php } ?>

        </div>
        <div class="flex items-center">

            <?php for ($i = 0; $i < $review->Rating; $i++) { ?>

                <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" /></svg>

            <?php } ?>
            <?php for ($i = 5; $i > $review->Rating; $i--) { ?>

                <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" /></svg>

            <?php } ?>

        </div>
        <div class="">
            <p class="font-bold"><?php print($review->ReviewTitle); ?></p>

            <?php if ($review->Review) { ?>

                <p class=""><?php print($review->Review); ?></p>

            <?php } ?>

        </div>
    </div>
</div>