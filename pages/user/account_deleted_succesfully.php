<section class="container py-4 flex justify-center w-full">
    <div class="flex justify-center w-full md:w-1/2">
        <div class="mx-4 overflow-hidden rounded-lg shadow-lg mb-8 w-full">
            <div class="leading-tight p-2 md:p-4 bg-white">
                <form action method="POST" class="w-full w-full">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" tekst="delete_account">
                            <?php print $GLOBALS['t']['accountdeletedsuccessfull'] ?>
                        </label>
                        <div class="flex grid grid-cols-4 gap-2 text-right">
                        <a class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded" href="/">
                            <?php print $GLOBALS['t']['home'] ?>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php