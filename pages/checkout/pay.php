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
                <div class="absolute flex align-center items-center align-middle content-center"
                     style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
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
                <div class="absolute flex align-center items-center align-middle content-center"
                     style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="w-full bg-white rounded items-center align-middle align-center flex-1">
                        <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto bg-green-500 border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                    <span class="grid text-white w-full">
                        <ion-icon class="place-self-center" size="small" name="card"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center text-gray-800 md:text-base"><?php print $GLOBALS['t']['payment'] ?></div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex align-center items-center align-middle content-center"
                     style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
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
            <form class="w-full max-w-lg">
                <div class="flex text-center flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0"><?php print $GLOBALS['t']['mollie'] ?></div>
                </div>
                <div class="flex md:items-center justify-between">
                    <a href="/checkout/address"
                       class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                       type="button"><?php print $GLOBALS['t']['back'] ?></a>
                    <a href="/checkout/paying"
                       class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                       type="button"><?php print $GLOBALS['t']['pay'] ?></a>
                </div>
            </form>
        </div>
    </div>
</div>