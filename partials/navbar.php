<nav class="flex flex-col">

    <div class="nav flex flex-row p-2 justify-between lg:grid grid-cols-3">
        
        <div class="">
            <object class="logo" id="logo" type="image/svg+xml" data="public/img/logo.svg"></object>
        </div>

        <div class="bg-gray-100 p-2 rounded flex-grow lg:flex-grow-0 max-w-full mx-8 lg:mx-0">
            <input class="text-gray-800" type="text" placeholder="Zoeken!" id="zoek" type="text" name="zoek" value="">
        </div>
    
        <div class="items-center flex flex-row justify-end">
            <div class="p-2 text-gray-200">
                <a>English</a>
            </div>

            <div class="p-2 text-gray-200">
                <a>Inloggen</a>
            </div>

            <div class="px-2 pt-1 text-gray-200">
                <a><ion-icon name="cart-outline" size="large"></ion-icon></a>
            </div>
        </div>
    </div>

    <div class="categories">
        <div class="container mx-auto flex flex-row">
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
.nav{
    background-color: #1E0253;
}

.categories{
    background-color: #023153;
}
</style>