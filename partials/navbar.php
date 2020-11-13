<nav class="flex flex-col fixed w-full">

    <div class="nav flex flex-row p-2 justify-between lg:grid grid-cols-3">

        <a href="/" draggable="false">
            <img class="logo" id="logo" draggable="false" src="/public/img/logo.svg" />
        </a>

        <div class=" flex align-center bg-gray-100 rounded flex-grow lg:flex-grow-0 max-w-full mx-8 lg:mx-0">
            <input class="text-gray-800 border-transparent rounded p-2 min-w-full" type="text" placeholder="Zoeken!" id="zoek" type="text" name="zoek" value="">
        </div>

        <div class="items-center flex flex-row justify-end">
            <a href="/english">
                <div class="p-2 text-gray-200">English</div>
            </a>

            <a href="/login">
                <div class="p-2 pr-4 text-gray-200">Inloggen</div>
            </a>

            <a href="/cart">
                <div class="flex p-2 text-gray-200 rounded bg-gray-900 card">
                    <ion-icon name="cart-outline" size="20px"></ion-icon>
                </div>
            </a>
        </div>
    </div>

    <div class="categories">
        <div class="container mx-auto flex flex-row justify-between">
            <div class="text-gray-200 p-1 px-2">
                <a href="/products">Producten</a>
            </div>

            <div class="text-gray-200 p-1 px-2">
                <a>Eten</a>
            </div>

            <div class="text-gray-200 p-1 px-2">
                <a>Kleren</a>
            </div>

            <div class="text-gray-200 p-1 px-2">
                <a>Eten</a>
            </div>

            <div class="text-gray-200 p-1 px-2">
                <a>Kleren</a>
            </div>
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