<?php if ($arg) { ?>


    <div class="grid grid-cols-2 gap-8">

        <div class="overflow-hidden rounded-lg shadow-lg">

            <a href="#">
                <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/600/400/?random">
            </a>

        </div>
        <div class="overflow-hidden rounded-lg shadow-lg p-2 md:p-4">



            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl"> <?php print $arg["StockItemName"]; ?> </h1>
            </div>

            <div class="flex flex-col mb-4">
                <p class="text-grey-darker text-xl font-bold"><?php printf("€ %.2f", $arg['SellPrice']) ?></p>
            </div>

            <div class="flex flex-col mb-6">
                <button id="add-to-cart-btn" class="text-xl shadow bg-green-500 hover:bg-green-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">In mijn winkelmandje</button>
            </div>

            <div class="flex flex-col mb-2">
                <h2 class="text-2xl font-bold">Productinformatie</h2>
            </div>

            <div class="flex flex-col">
                <p><?php print $arg['SearchDetails']; ?></p>

            </div>

        </div>
    </div>



<?php } ?>

<script>
    (() => {
        const addToCartBtn = document.querySelector('#add-to-cart-btn')

        addToCartBtn.addEventListener("click", () => {
            let request = new XMLHttpRequest()
            request.open('POST', '/cart/add?id=<?php print($_GET['id']) ?>')
            request.send()
        })
    })()
</script>