<?php $error_messages = isset($_SESSION['form']['error_messages']) ? (object)$_SESSION['form']['error_messages'] : [] ?>

<div class="flex justify-center">
    <div class="overflow-hidden rounded-lg shadow-lg mb-8">

        <div class="leading-tight flex grid grid-cols-2 gap-8 p-2 md:p-4 bg-white">
            <div class="w-64 h-full flex flex-col justify-between">
                <h1 class="mb-2"><?php print $GLOBALS['t']['continue-guest'] ?></h1>
                <div class="inset-x-0 bottom-0">
                    <a href="/checkout/account">
                        <button class="mt-4 shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded block">
                            <span class="mt-5px"><?php print $GLOBALS['t']['continue'] ?></span>
                        </button>
                    </a>
                </div>
            </div>
            <div>
                <form action method="POST">
                    <h1 class="mb-2">Login</h1>
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email"> Email </label>
                    <input type="email"  class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php print isset($error_messages->email) ? 'border-red-500' : 'border-gray-200' ?>"
                        name="email" id="email" type="text"
                        value="<?php isset($_SESSION['form']["email"]) ? print($_SESSION['form']["email"]) : '' ?>">

                    <?php if (isset($error_messages->email)) { ?>

                        <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->email] ?></p>


                <?php } ?>

                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password"> <?php print $GLOBALS['t']['password'] ?> </label>
                    <input type="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php print isset($error_messages->password) ? 'border-red-500' : 'border-gray-200' ?>"
                        name="password" id="password" type="text">

                    <?php if (isset($error_messages->password)) { ?>

                        <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->password] ?></p>


                <?php } ?>
                
                <a href="/register" class="underline text-xs text-blue-700"><?php print $GLOBALS['t']['no-account'] ?></a>

                <a href="/checkout/account">
                    <button class="mt-4 shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded block">
                        <span class="mt-5px">Login</span>
                    </button>
                </a>
                </form>
            </div>
        </div>
    </div>
</div>