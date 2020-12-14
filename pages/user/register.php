<?php $error_messages = isset($_SESSION['register']['error_messages']) ? (object)$_SESSION['register']['error_messages'] : [] ?>

<section class="container py-4 flex justify-center w-full">
    <div class="flex justify-center w-full md:w-1/2">
        <div class="mx-4 overflow-hidden rounded-lg shadow-lg mb-8 w-full">
            <div class="leading-tight p-2 md:p-4 bg-white">
                <form method="POST" class="w-full w-full">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            <?php print $GLOBALS['t']['username'] ?>
                        </label>
                        <input class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" id="username" type="username" placeholder="<?php print $GLOBALS['t']['username'] ?>" value="<?php isset($_SESSION['register']['form']['username']) ? print($_SESSION['register']['form']['username']) : '' ?>">

                        <?php if (isset($error_messages->username)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->username] ?></p>

                        <?php } ?>

                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            <?php print $GLOBALS['t']['email'] ?>
                        </label>
                        <input class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="text" placeholder="E-mail" value="<?php isset($_SESSION['register']['form']['email']) ? print($_SESSION['register']['form']['email']) : '' ?>">

                        <?php if (isset($error_messages->email)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->email] ?></p>

                        <?php } ?>

                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            <?php print $GLOBALS['t']['password'] ?>
                        </label>
                        <input class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="******************" value="<?php isset($_SESSION['register']['form']['password']) ? print($_SESSION['register']['form']['password']) : '' ?>">

                        <?php if (isset($error_messages->password)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->password] ?></p>

                        <?php } ?>

                    </div>
                    <div class="mb-4">
                        <button type="button" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " onclick="toggleVisibility()">
                            <?php print $GLOBALS['t']['toggle-visibility']  ?>
                        </button>
                    </div>
                    <div class="flex md:items-center justify-between">
                        <input class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" name="submit" type="submit" value=<?php print $GLOBALS['t']['register'] ?>>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function toggleVisibility() {
        let x = document.getElementById('password');
        if (x.type === 'password') {
            x.type = 'text';
        } else {
            x.type = 'password';
        }
    }
</script>