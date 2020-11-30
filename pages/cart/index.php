<div class="flex justify-center my-6">
    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5 rounded">
        <div class="flex-1">
            <table class="w-full text-sm lg:text-base" cellspacing="0">
                <thead>
                    <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell"></th>
                        <th class="text-left">Product</th>
                        <th class="lg:text-right text-left pl-5 lg:pl-0">
                            <span class="hidden lg:inline"><?php print $GLOBALS['t']['amount'] ?></span>
                        </th>
                        <th class="hidden text-right md:table-cell"><?php print $GLOBALS['t']['ppp'] ?></th>
                        <th class="text-right"><?php print $GLOBALS['t']['total-price'] ?></th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($arg as $product) { ?>

                        <tr class="cart-items" id="row-<?php print $product->StockItemID ?>">
                            <td class="hidden pb-4 md:table-cell">
                                <a href="/products/view?id=<?php print $product->StockItemID ?>">

                                    <?php if (isset($product->ImagePath) and !empty($product->ImagePath)) { ?>

                                        <img class="w-20 h-20 rounded object-contain" src="/public/StockItemIMG/<?php print $product->ImagePath ?>">

                                    <?php } elseif (isset($product->StockGroupImagePath) and !empty($product->StockGroupImagePath)) { ?>

                                        <img class="w-20 h-20 rounded object-contain" src="/public/StockGroupIMG/<?php print $product->StockGroupImagePath ?>">

                                    <?php } else { ?>

                                        <img class="w-20 h-20 rounded object-contain" src="/public/StockGroupIMG/<?php print $product->BackupImagePath ?>">

                                    <?php } ?>

                                </a>
                            </td>

                            <td>
                                <div class="flex flex-col items-start">
                                    <a class="mb-1 font-semibold md:ml-4 " href="/products/view?id=<?php print $product->StockItemID ?>"><?php print $product->StockItemName ?></a>
                                    <button class="text-red-400 text-sm md:ml-4" onclick="remove(<?php print($product->StockItemID) ?>)">Verwijder product
                                    </button>
                                    <span class="text-gray-600 text-xs md:ml-4"><?php print $GLOBALS['t']['quantity-on-hand'] . ': ' . $product->QuantityOnHand ?></span>
                                </div>
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
                            <h2><?php print $GLOBALS['t']['no-products'] ?></h2>
                        </div>

                    <?php } ?>

                </tbody>
            </table>
            <hr class="pb-6 mt-6">
            <div class="my-4 mt-6 -mx-2 lg:flex">
                <div class="lg:px-2 lg:w-1/2">
                    <div class="p-2">
                        <h1 class="ml-2 font-bold uppercase"><?php print $GLOBALS['t']['discount-code'] ?></h1>
                    </div>
                    <div id="discount-code-add-container" class="p-4 grid grid-cols-3 gap-4">
                        <input id="discount-input" class="col-span-2 appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-100 focus:border-gray-600" id="tel" type="text">
                        <a id="add-discount" class="flex justify-center items-center w-full shadow bg-teal-400 hover:bg-teal-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button"><?php print $GLOBALS['t']['add'] ?></a>
                    </div>
                    <div id="discount-add-container" class="p-4 grid grid-cols-3 gap-4 items-center hidden">
                        <span id="discount-code" class="col-span-2"></span>
                        <a id="remove-discount" class="flex justify-center items-center w-full shadow bg-red-400 hover:bg-red-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">Verwijderen</a>
                    </div>
                    <div class="lg:px-2 lg:w-1/2">
                        <div class="p-2">
                            <h1 class="ml-2 font-bold uppercase"><?php print $GLOBALS['t']['order-details'] ?></h1>
                        </div>
                        <div class="p-4">
                            <div id="discount-container" class="flex justify-between pt-4 border-b hidden">
                                <div class="lg:px-4 lg:py-2 m-2 text-md lg:text-s font-bold text-center text-gray-800">
                                    <?php print $GLOBALS['t']['discount'] ?>
                                </div>
                                <div id="discount-ammount" class="lg:px-4 lg:py-2 m-2 lg:text-s font-bold text-center text-gray-900"></div>
                            </div>
                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-md lg:text-s font-bold text-center text-gray-800">
                                    <?php print $GLOBALS['t']['shipping-cost'] ?>
                                </div>
                                <div id="shipping-cost" class="lg:px-4 lg:py-2 m-2 lg:text-s font-bold text-center text-gray-900">
                                    € 6.75
                                </div>
                            </div>
                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-md lg:text-s font-bold text-center text-gray-800">
                                    <?php print $GLOBALS['t']['total-price'] ?>
                                </div>
                                <div id="total-price" class="lg:px-4 lg:py-2 m-2 lg:text-s font-bold text-center text-gray-900">
                                </div>
                            </div>
                            <a href="/checkout/login">
                                <button class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-green-400 rounded-full shadow item-center hover:bg-green-500 focus:shadow-outline focus:outline-none font-bold">
                                    <span class="ml-2 mt-5px"><?php print $GLOBALS['t']['payment'] ?></span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => getDiscount());

        const freeText = <?php print($GLOBALS['t']['free']); ?>

        const addDiscountBtn = document.querySelector('#add-discount')
        const removeDiscountBtn = document.querySelector('#remove-discount')
        const discountAddContainer = document.querySelector('#discount-add-container')
        const discountCodeAddContainer = document.querySelector('#discount-code-add-container')

        const discountCode = document.querySelector('#discount-code')
        const discountInput = document.querySelector('#discount-input')

        const discountContainer = document.querySelector('#discount-container')
        const discountAmmount = document.querySelector('#discount-ammount')

        let discount = 0

        addDiscountBtn.addEventListener('click', addDiscount)
        removeDiscountBtn.addEventListener('click', removeDiscount)


        function getDiscount() {
            request('/cart/discount', 'POST', {}).then((result) => {
                if (result['discount']) {
                    discountCode.innerHTML = `${result['discount'].discount} %`
                    discountAddContainer.classList.remove('hidden')
                    discountCodeAddContainer.classList.add('hidden')
                    discount = result['discount'].discount * 0.01
                }

                calculatePrice()
            })
        }

        function addDiscount() {
            request('/cart/discount/add', 'POST', {
                'value': discountInput.value,
            }).then((result) => {
                if (result['discount']) {
                    discountCode.innerHTML = `${result['discount'].discount} %`
                    discountAddContainer.classList.remove('hidden')
                    discountCodeAddContainer.classList.add('hidden')
                    discount = result['discount'].discount * 0.01
                } else {
                    new Alert({
                        title: result.title,
                        message: result.message,
                        time: 2000
                    })
                }

                if (result.alert) {
                    new Alert({
                        title: result.alert.title,
                        message: result.alert.message,
                        time: 2000
                    })
                }

                calculatePrice()
            })
        }

        function removeDiscount(e) {
            request('/cart/discount/remove', 'DELETE', {}).then((result) => {
                discountAddContainer.classList.add('hidden')
                discountCodeAddContainer.classList.remove('hidden')
                discount = 0

                if (result.alert) {
                    new Alert({
                        title: result.alert.title,
                        message: result.alert.message,
                        time: 2000
                    })
                }
                calculatePrice()
            })
        }


        calculatePrice()

        function calculatePrice() {
            const items = document.querySelectorAll('.cart-items')
            const shippingCost = document.querySelector('#shipping-cost')

            let totalPrice = 0

            items.forEach(item => {
                const id = item.id.split('-')[1]
                const qty = document.querySelector(`#qty-${id}`).value
                const price = document.querySelector(`#price-${id}`).innerHTML
                totalPrice += price * qty

                document.querySelector(`#total-price-${id}`).innerHTML = `€ ${(price * qty).toFixed(2)}`
            })

            if (discount > 0) {
                discountContainer.classList.remove('hidden')

                discountAmmount.innerHTML = `€ ${(totalPrice * discount).toFixed(2)}`

                totalPrice -= totalPrice * discount
            } else {
                discountContainer.classList.add('hidden')
            }

            if (totalPrice === 0 || totalPrice >= 50) {
                shippingCost.innerHTML = freeText
            } else {
                totalPrice += 6.75
                shippingCost.innerHTML = '6.75'
            }

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
            }).then((result) => {
                setCounter(result.amount);
            })
        }

        function remove(id) {
            request('/cart/remove', 'DELETE', {
                'id': id,
            }).then((result) => {
                setCounter(result.amount);
            })

            document.querySelector(`#row-${id}`).remove()
            calculatePrice()
        }
    </script>