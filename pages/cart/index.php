<div class="flex justify-center my-6">
    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5 rounded">
        <div class="flex-1">
            <table class="w-full text-sm lg:text-base" cellspacing="0">
                <thead>
                    <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell"></th>
                        <th class="text-left">Product</th>
                        <th class="lg:text-right text-left pl-5 lg:pl-0">
                            <span class="lg:hidden" title="Quantity">Ant.</span>
                            <span class="hidden lg:inline">Aantal</span>
                        </th>
                        <th class="hidden text-right md:table-cell">Prijs per stuk</th>
                        <th class="text-right">Totaal prijs</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($arg as $product) { ?>

                        <tr class="cart-items" id="row-<?php print $product->StockItemID ?>">
                            <td class="hidden pb-4 md:table-cell">
                                <a href="/products/view?id=<?php print $product->StockItemID ?>">

                                    <?php if (isset($product->ImagePath) and !empty($product->ImagePath)) { ?>

                                        <img class="w-20 rounded" src="/public/StockItemIMG/<?php print $product->ImagePath ?>">

                                    <?php } elseif (isset($product->StockGroupImagePath) and !empty($product->StockGroupImagePath)) { ?>

                                        <img class="w-20 rounded" src="/public/StockGroupIMG/<?php print $product->StockGroupImagePath ?>">

                                    <?php } else { ?>

                                        <img class="w-20 rounded" src="/public/StockGroupIMG/<?php print $product->BackupImagePath ?>">

                                    <?php } ?>

                                </a>
                            </td>
                            <td>
                                <a>
                                    <a href="/products/view?id=<?php print $product->StockItemID ?>">
                                        <p class="mb-2 md:ml-4"><?php print $product->StockItemName ?></p>
                                    </a>
                                    <button onclick="remove(<?php print($product->StockItemID) ?>)" class="text-gray-700 md:ml-4">
                                        <small>(Verwijder product)</small>
                                    </button>
                                </a>
                            </td>

                            <td class="justify-center md:justify-end md:flex mt-6">
                                <div class="w-32">
                                    <div class="flex justify-center flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                        <button data-action="decrement" value="<?php print $product->StockItemID ?>" id="decrement-btn" class="focus:outline-none bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                            <span class="flex justify-center pb-1 m-auto text-2xl font-thin">−</span>
                                        </button>
                                        <input id="qty-<?php print $product->StockItemID ?>" value="<?php print $product->qty ?>" min="0" type="number" class="focus:outline-none z-10 select-none w-12 outline-none focus:outline-none text-center bg-gray-300 font-semibold text-md hover:text-black focus:text-black md:text-basecursor-default flex items-center text-gray-700 outline-none" name="custom-input-number"></input>
                                        <button data-action="increment" value="<?php print $product->StockItemID ?>" id="increment-btn" class="focus:outline-none bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer outline-none">
                                            <span class="flex justify-center pb-1 m-auto text-2xl font-thin">+</span>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="hidden text-right md:table-cell">
                                <span class="text-sm lg:text-base font-medium"> €
                                    <span id="price-<?php print $product->StockItemID ?>">
                                        <?php print sprintf("%.2f", $product->SellPrice) ?>
                                    </span>
                                </span>
                            </td>
                            <td class="text-right">
                                <span id="total-price-<?php print $product->StockItemID ?>" class="text-sm lg:text-base font-medium"></span>
                            </td>
                        </tr>

                    <?php } ?>
                    <?php if (empty($arg)) { ?>

                        <div class="flex p-2 mb-2 justify-center text-center bg-yellow-300">
                            <ion-icon name="information-circle-outline"></ion-icon>
                            <h2>Er staan nog geen artikelen in je winkelmandje :(</h2>
                        </div>

                    <?php } ?>

                </tbody>
            </table>
            <hr class="pb-6 mt-6">
            <div class="my-4 mt-6 -mx-2 lg:flex">
                <div class="lg:px-2 lg:w-1/2">
                    <div class="p-2">
                        <h1 class="ml-2 font-bold uppercase">Kortings code</h1>
                    </div>
                    <div class="p-4">
                        <input class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 focus:border-gray-600" id="tel" type="text">
                        <a href="/cart" class="shadow bg-teal-400 hover:bg-teal-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">code toevoegen</a>
                    </div>
                    <div class="p-4">
                        <p class="mb-4 italic"></p>
                    </div>
                </div>
                <div class="lg:px-2 lg:w-1/2">
                    <div class="p-2">
                        <h1 class="ml-2 font-bold uppercase">Bestelgegevens</h1>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between pt-4 border-b">
                            <div class="lg:px-4 lg:py-2 m-2 text-md lg:text-s font-bold text-center text-gray-800">
                                Verzendkosten
                            </div>
                            <div class="lg:px-4 lg:py-2 m-2 lg:text-s font-bold text-center text-gray-900">
                                € 6.75
                            </div>
                        </div>
                        <div class="flex justify-between pt-4 border-b">
                            <div class="lg:px-4 lg:py-2 m-2 text-md lg:text-s font-bold text-center text-gray-800">
                                Totaalprijs
                            </div>
                            <div id="total-price" class="lg:px-4 lg:py-2 m-2 lg:text-s font-bold text-center text-gray-900">
                            </div>
                        </div>
                        <a href="/checkout/loginorguest">
                            <button class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-green-400 rounded-full shadow item-center hover:bg-green-500 focus:shadow-outline focus:outline-none">
                                <span class="ml-2 mt-5px">Afrekenen</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    input[type=number] {
        -moz-appearance: textfield
    }

    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none margin: 0
    }
</style>




<script>
    calculatePrice()

    function calculatePrice() {
        const items = document.querySelectorAll('.cart-items')
        let totalPrice = 0
        totalPrice += 6.75

        items.forEach(item => {
            const id = item.id.split('-')[1]
            const qty = document.querySelector(`#qty-${id}`).value
            const price = document.querySelector(`#price-${id}`).innerHTML
            totalPrice += price * qty

            document.querySelector(`#total-price-${id}`).innerHTML = `€ ${(price * qty).toFixed(2)}`
        })

        document.querySelector('#total-price').innerHTML = `€ ${totalPrice.toFixed(2)}`
    }

    const decrementButtons = document.querySelectorAll('button[data-action="decrement"]')
    const incrementButtons = document.querySelectorAll('button[data-action="increment"]')

    decrementButtons.forEach(btn => btn.addEventListener('click', (e) => change(e, -1)))
    incrementButtons.forEach(btn => btn.addEventListener('click', (e) => change(e, +1)))

    function change(e, change) {
        const b = e.target.parentNode.parentElement.querySelector('button[data-action="decrement"]')
        const t = b.nextElementSibling
        let val = Number(t.value)

        if (val <= 0 && change <= 0) return

        t.value = val += change
        calculatePrice()
        request('/cart/change-product-amount', 'PUT', {
            'id': b.value,
            'amount': t.value,
        })
    }

    function remove(id) {
        request('/cart/remove', 'DELETE', {
            'id': id,
        })

        document.querySelector(`#row-${id}`).remove()
        calculatePrice()
    }
</script>