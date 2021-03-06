<?php $error_messages = isset($_SESSION['error_messages']) ? (object)$_SESSION['error_messages'] : []; ?>
<div class="w-full py-6">
    <div class="flex">
        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                    <span class="grid text-white w-full">
                        <ion-icon class="place-self-center" size="small" name="person"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center text-gray-800 md:text-base"><?php print $GLOBALS['t']['information'] ?></div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-white rounded items-center align-middle align-center flex-1">
                        <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                    <span class="grid text-white w-full">
                        <ion-icon class="place-self-center" size="small" name="home"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center text-gray-800 md:text-base"><?php print $GLOBALS['t']['shipping'] ?></div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-white rounded items-center align-middle align-center flex-1">
                        <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                    <span class="grid text-gray-700 w-full">
                        <ion-icon class="place-self-center" size="small" name="card"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center text-gray-800 md:text-base"><?php print $GLOBALS['t']['payment'] ?></div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-white rounded items-center align-middle align-center flex-1">
                        <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                    <span class="grid text-gray-700 w-full">
                        <ion-icon class="place-self-center" size="small" name="checkmark-done"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center text-gray-800 md:text-base"><?php print $GLOBALS['t']['overview'] ?></div>
        </div>
    </div>
</div>


<div class="flex justify-center">
    <div class="overflow-hidden rounded-lg shadow-lg mb-8 max-w-lg">

        <div class="leading-tight p-2 md:p-4 bg-white">
            <form class="w-full max-w-lg" action="" method="POST">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            <?php print $GLOBALS['t']['zip'] ?>
                        </label>
                        <input value="<?php isset($_SESSION['form']["postcode"]) ? print($_SESSION['form']["postcode"]) : '' ?>" name="postcode" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php print isset($error_messages->postcode) ? 'border-red-500' : 'border-gray-200' ?>" id="grid-first-name" type="text">
                        <?php if (isset($error_messages->postcode)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->postcode]; ?></p>

                        <?php } ?>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            <?php print $GLOBALS['t']['house-number'] ?>
                        </label>
                        <input value="<?php isset($_SESSION['form']["housenmr"]) ? print($_SESSION['form']["housenmr"]) : '' ?>" name="housenmr" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php print isset($error_messages->housenmr) ? 'border-red-500' : 'border-gray-200' ?>" id="grid-last-name" type="text">
                        <?php if (isset($error_messages->housenmr)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->housenmr]; ?></p>
                        <?php } ?>

                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            <?php print $GLOBALS['t']['shipping'] ?>
                        </label>

                        <?php $s = isset($_SESSION['form']['shipping']) ? $_SESSION['form']['shipping'] : 'PostNl' ?>

                        <select value="<?php isset($_SESSION['form']["shipping"]) ? print($_SESSION['form']["shipping"]) : '' ?>" name="shipping" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php print isset($error_messages->shiping) ? 'border-red-500' : 'border-gray-200' ?>" id="email" type="email">
                            <option value="postnl" <?php print $s === 'postnl' ? 'selected' : '' ?>>PostNL</option>
                            <option value="dhl" <?php print $s === 'dhl' ? 'selected' : '' ?>>DHL</option>
                            <option value="ups" <?php print $s === 'ups' ? 'selected' : '' ?>>UPS</option>
                        </select>

                        <?php if (isset($error_messages->shipping)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->shipping]; ?></p>

                        <?php } ?>

                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            <?php print $GLOBALS['t']['delivery'] ?>
                        </label>

                        <?php $s = isset($_SESSION['form']['delivery']) ? $_SESSION['form']['delivery'] : 'Moring' ?>

                        <select value="<?php isset($_SESSION['form']["delivery"]) ? print($_SESSION['form']["delivery"]) : '' ?>" name="delivery" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white <?php print isset($error_messages->delivery) ? 'border-red-500' : 'border-gray-200' ?>" id="email" type="email">
                            <option value="morning" <?php print $s === 'morning' ? 'selected' : '' ?>>Morning</option>
                            <option value="afternoon" <?php print $s === 'afternoon' ? 'selected' : '' ?>>Afternoon</option>
                            <option value="evening" <?php print $s === 'evening' ? 'selected' : '' ?>>Evening</option>
                        </select>

                        <?php if (isset($error_messages->delivery)) { ?>

                            <p class="text-red-500 text-xs italic"><?php print $GLOBALS['t'][$error_messages->delivery]; ?></p>

                        <?php } ?>

                    </div>
                </div>
                <div class="flex md:items-center justify-between">
                    <a href="/checkout/account" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button"><?php print $GLOBALS['t']['back'] ?></a>
                    <input class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="<?php print $GLOBALS['t']['continue'] ?>" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>