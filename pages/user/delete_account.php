<section class="container py-4 flex justify-center w-full">
    <div class="flex justify-center w-full md:w-1/2">
        <div class="mx-4 overflow-hidden rounded-lg shadow-lg mb-8 w-full">
            <div class="leading-tight p-2 md:p-4 bg-white">
                <form action method="POST" class="w-full w-full">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" tekst="delete_account">
                            <?php print $GLOBALS['t']['areyousure'] ?>
                        </label>
                    </div>
                    <div class="flex justify-between">
                        <a class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-8 rounded" href="profile">
                            <?php print $GLOBALS['t']['goback'] ?>
                        </a>

                        <a class="inline-block text-right inset-y-0 right-0 font-bold text-sm text-red-600 hover:text-red-700 p-2" href="deleted">
                            <?php print $GLOBALS['t']['deleteaccount'] ?>
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>