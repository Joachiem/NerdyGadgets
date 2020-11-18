<nav class="flex flex-col fixed w-full z-50">
    <div class="nav flex flex-row p-2 justify-between lg:grid grid-cols-3">

        <div class="items-center flex flex-row justify-between">
            <a href="/" draggable="false">
                <img class="logo" id="logo" draggable="false" src="/public/img/logo.svg"/>
            </a>

            <div class="flex flex-row">
                <a href="/products">
                    <div class="p-2 pr-4 text-gray-200"><?php print $GLOBALS['t']['navbar-products'] ?></div>
                </a>

                <a href="/categories">
                    <div class="p-2 pr-4 text-gray-200"><?php print $GLOBALS['t']['navbar-categories'] ?></div>
                </a>
            </div>

        </div>

        <form method="get" action="/products" class="flex align-center bg-gray-100 rounded flex-grow lg:flex-grow-0 max-w-full mx-8 lg:mx-0">
            <div class="flex-grow">
                <input class="text-gray-800 rounded p-2 px-3 min-w-full bg-gray-100 form-submit min-h-full outline-none" type="text"
                       placeholder="Zoeken!" id="zoek" name="search" value="<?php print (isset($_GET['search'])) ? $_GET['search'] : ""; ?>">
                       </div>
                <button class="flex items-center px-2 focus:outline-none bg-gray-200" type="submit"><ion-icon name="search-outline"></ion-icon></button>
            
        </form>

        <div class="items-center flex flex-row justify-end">
            <a href="/<?php print $GLOBALS['t']['navbar-language'] ?>">
                <div class="p-2 text-gray-200"><?php print $GLOBALS['t']['navbar-language-title'] ?></div>
            </a>

            <a href="/login">
                <div class="p-2 pr-4 text-gray-200"><?php print $GLOBALS['t']['navbar-log-in'] ?></div>
            </a>

            <a href="/cart">
                <div class="flex p-2 text-gray-200 rounded bg-gray-900 card" style="height: 44px; width: 44px;">
                    <ion-icon name="cart-outline" size="20px"></ion-icon>
                </div>
            </a>
        </div>
    </div>
</nav>

<style>
    .nav {
        background-color: #1E0253;
    }

    .card {
        background-color: #C637A0;
    }

    .categories {
        background-color: #023153;
    }
</style>