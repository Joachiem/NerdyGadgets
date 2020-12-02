<section class="container py-8 flex justify-center">
    <div class="flex justify-center">
        <div class="overflow-hidden rounded-lg shadow-lg mb-8 max-w-lg">
            <div class="leading-tight p-2 md:p-4 bg-white">
                <form action method="POST" class="w-full max-w-lg">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            <?php print $GLOBALS['t']['username'] ?>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" id="username" type="username" placeholder="<?php print $GLOBALS['t']['username'] ?>">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            <?php print $GLOBALS['t']['email'] ?>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="email" placeholder="E-mail">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            <?php print $GLOBALS['t']['password'] ?>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="******************">

                        <button type="button" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " onclick="toggleVisibility()" >
                            <?php print $GLOBALS['t']['toggle-visibility']  ?> 
                        </button>
                    </div>
                    <div class="mb-6">

                        <?php if (isset($_SESSION['register']["loginfail"]) === TRUE) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t']['nameoremailorpasswordwrong'] ?></p>

                        <?php } ?>

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
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>