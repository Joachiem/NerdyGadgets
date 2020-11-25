<?php $error_messages = isset($_SESSION['form']['error_messages']) ? (object)$_SESSION['form']['error_messages'] : [] ?>
<?php Checkout::noItemsInCart(); ?>

<div class="flex justify-center">
    <div class="overflow-hidden rounded-lg shadow-lg mb-8 max-w-lg">

        <div class="leading-tight p-2 md:p-4 bg-white">
            <form action method="POST" class="w-full max-w-lg">
                
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            E-mailadress
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php print isset($error_messages->email) ? 'border-red-500' : 'border-gray-200' ?>"
                               name="email" placeholder="bijv. jan@gmail.com" id="grid-email" type="text"
                               value="<?php isset($_SESSION['form']["email"]) ? print($_SESSION['form']["email"]) : '' ?>">

                        <?php if (isset($error_messages->email)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $error_messages->email ?></p>

                        <?php } ?>

                        <p class="text-gray-600 text-xs italic"></p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-password">
                            Wachtwoord
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php print isset($error_messages->phonenumber) ? 'border-red-500' : 'border-gray-200' ?>"
                               name="password" id="grid-password" type="pass"
                               value="<?php isset($_SESSION['form']["password"]) ? print($_SESSION['form']["phonenumber"]) : '' ?>">

                        <?php if (isset($error_messages->phonenumber)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $error_messages->phonenumber ?></p>

                        <?php } ?>

                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-passwordrepeat">
                            Wachtwoord herhalen
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php print isset($error_messages->phonenumber) ? 'border-red-500' : 'border-gray-200' ?>"
                               name="passwordrepeat" id="grid-passwordrepeat" type="passrepeat"
                               value="<?php isset($_SESSION['form']["passwordrepeat"]) ? print($_SESSION['form']["passwordrepeat"]) : '' ?>">

                        <?php if (isset($error_messages->passwordrepeat)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $error_messages->passwordrepeat ?></p>

                        <?php } ?>

                    </div>
                </div>
                <div class="flex md:items-center justify-between">
                    <a href="/cart"
                       class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                       type="button">Terug</a>
                    <input class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                           name="submit" type="submit" value="Registreren">
                </div>
            </form>
        </div>
    </div>
</div>