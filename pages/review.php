<div class="grid auto-cols-min grid-flow-col grid-cols-1 gap-8 mb-8">
    <div class="overflow-hidden rounded-lg shadow-lg object-cover bg-white p-4">

        <?php if (isset($_SESSION['user']->PersonID)) { ?>

            <?php include "partials/reviewform.php"; ?>

        <?php } ?>

        <?php foreach ($arg as $review) { ?>

            <?php include "partials/review.php"; ?>

        <?php } ?>

    </div>

</div>