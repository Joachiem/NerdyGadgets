<?php $error_messages = isset($_SESSION['login']['error_messages']) ? (object)$_SESSION['login']['error_messages'] : [] ?>

<section class="container py-4 flex justify-center w-full">
    <div class="flex justify-center w-full md:w-1/2">
        <div class="mx-4 overflow-hidden rounded-lg shadow-lg mb-8 w-full">
            <div class="leading-tight p-2 md:p-4 bg-white">
                <form action method="POST" class="w-full w-full">

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            <?php print $GLOBALS['t']['email'] ?>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 mb-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="text" placeholder="email" value="<?php isset($_SESSION['login']['form']['email']) ? print($_SESSION['login']['form']['email']) : '' ?>">

                        <?php if (isset($error_messages->email)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->email] ?></p>

                        <?php } ?>

                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            <?php print $GLOBALS['t']['password'] ?>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="******************" value="<?php isset($_SESSION['login']['form']['password']) ? print($_SESSION['login']['form']['password']) : '' ?>">

                        <?php if (isset($error_messages->password)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->password] ?></p>

                        <?php } ?>

                    </div>
                    <div class="flex grid grid-cols-3 gap-2 text-right">
                        <input class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="<?php print $GLOBALS['t']['signin'] ?>">
                        <div class="text-right col-span-2">
                            <a class="w-full inline-block text-right inset-y-0 right-0 font-bold text-sm text-blue-500 hover:text-blue-800" href="forgot">
                                <?php print $GLOBALS['t']['forgotpassword'] ?>
                            </a>

                            <a class="w-full text-right inline-block inset-y-0 right-0 font-bold text-sm text-blue-500 hover:text-blue-800" href="register">
                                <p> <?php print $GLOBALS['t']['register'] ?></p>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>