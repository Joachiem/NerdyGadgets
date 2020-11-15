<?php
foreach ($arg as $key => $value) {
    print $value . "<br>";
}
?>

<div class="flex justify-center my-6">
    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5 rounded">
        <div class="flex-1">
            <table class="w-full text-sm lg:text-base" cellspacing="0">
                <thead>
                    <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell"></th>
                        <th class="text-left">Product</th>
                        <th class="lg:text-right text-left pl-5 lg:pl-0">
                            <span class="lg:hidden" title="Quantity">Qtd</span>
                            <span class="hidden lg:inline">Aantal</span>
                        </th>
                        <th class="hidden text-right md:table-cell">Prijs per stuk</th>
                        <th class="text-right">Totaal prijs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="hidden pb-4 md:table-cell">
                            <a href="#">
                                <img src="https://limg.app/i/Calm-Cormorant-Catholic-Pinball-Blaster-yM4oub.jpeg" class="w-20 rounded" alt="Thumbnail">
                            </a>
                        </td>
                        <td>
                            <a href="#">
                                <p class="mb-2 md:ml-4">Earphone</p>
                                <form action="" method="POST">
                                    <button type="submit" class="text-gray-700 md:ml-4">
                                        <small>(Verwijder product)</small>
                                    </button>
                                </form>
                            </a>
                        </td>
                        <td class="justify-center md:justify-end md:flex mt-6">
                            <div class="w-32">
                                <div class="flex justify-center flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                    <button data-action="decrement" class="focus:outline-none bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                        <span class="flex justify-center pb-1 m-auto text-2xl font-thin">−</span>
                                    </button>
                                    <input min="0" type="number" class="focus:outline-none z-10 select-none w-12 outline-none focus:outline-none text-center  bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="0"></input>
                                    <button data-action="increment" class="focus:outline-none bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                        <span class="flex justify-center pb-1 m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="hidden text-right md:table-cell">
                            <span class="text-sm lg:text-base font-medium">
                                €10.00
                            </span>
                        </td>
                        <td class="text-right">
                            <span class="text-sm lg:text-base font-medium">
                                €20.00
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden pb-4 md:table-cell">
                            <a href="#">
                                <img src="https://limg.app/i/Cute-Constrictor-Super-Sexy-Military-Enforcer-W7mvBp.png" class="w-20 rounded" alt="Thumbnail">
                            </a>
                        </td>
                        <td>
                            <p class="mb-2 md:ml-4">Tesla Model 3</p>
                            <form action="" method="POST">
                                <button type="submit" class="text-gray-700 md:ml-4">
                                    <small>(Verwijder product)</small>
                                </button>
                            </form>
                        </td>
                        <td class="justify-center md:justify-end md:flex md:mt-4">
                            <div class="w-32">
                                <div class="flex justify-center flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                    <button data-action="decrement" class="focus:outline-none bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                        <span class="flex justify-center pb-1 m-auto text-2xl font-thin">−</span>
                                    </button>
                                    <input min="0" type="number" class="focus:outline-none z-10 select-none w-12 outline-none focus:outline-none text-center  bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="0"></input>
                                    <button data-action="increment" class="focus:outline-none bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                        <span class="flex justify-center pb-1 m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="hidden text-right md:table-cell">
                            <span class="text-sm lg:text-base font-medium">
                                €49,600.01
                            </span>
                        </td>
                        <td class="text-right">
                            <span class="text-sm lg:text-base font-medium">
                                €148,800.03
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="hidden pb-4 md:table-cell">
                            <a href="#">
                                <img src="https://limg.app/i/Successful-Spider-Biblical-Mutant---Total-War-lKoE7D.jpeg" class="w-20 rounded" alt="Thumbnail">
                            </a>
                        </td>
                        <td>
                            <p class="mb-2 md:ml-4">Bic 4 colour pen</p>
                            <form action="" method="POST">
                                <button type="submit" class="text-gray-700 md:ml-4">
                                    <small>(Verwijder product)</small>
                                </button>
                            </form>
                        </td>
                        <td class="justify-center md:justify-end md:flex md:mt-8">
                            <div class="w-32">
                                <div class="flex justify-center flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                    <button data-action="decrement" class="focus:outline-none bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                        <span class="flex justify-center pb-1 m-auto text-2xl font-thin">−</span>
                                    </button>
                                    <input min="0" type="number" class="focus:outline-none z-10 select-none w-12 outline-none focus:outline-none text-center  bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="0"></input>
                                    <button data-action="increment" class="focus:outline-none bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                        <span class="flex justify-center pb-1 m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </div>

                        </td>
                        <td class="hidden text-right md:table-cell">
                            <span class="text-sm lg:text-base font-medium">
                                €1.50
                            </span>
                        </td>
                        <td class="text-right">
                            <span class="text-sm lg:text-base font-medium">
                                €7.50
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr class="pb-6 mt-6">
            <div class="my-4 mt-6 -mx-2 lg:flex">
                <div class="lg:px-2 lg:w-1/2">
                    <div class="p-2 bg-gray-100 rounded-full">
                        <h1 class="ml-2 font-bold uppercase">Kortings code</h1>
                    </div>
                    <div class="p-4">
                        <p class="mb-4 italic">Vul hier je kortingscode in!</p>
                        <div class="justify-start md:flex">
                            <form action="" method="POST">
                                <div class="flex items-center w-full h-13 pl-3 bg-white bg-gray-100 border rounded-full">
                                    <input type="coupon" name="code" id="coupon" placeholder="Kortings code" value="" class="w-full flex items-center bg-gray-100 outline-none appearance-none focus:outline-none active:outline-none" />
                                    <button type="submit" class="text-sm flex items-center px-3 py-1 text-white bg-green-400 rounded-full outline-none md:px-4 hover:bg-green-500 focus:outline-none active:outline-none" <span class="font-medium flex items-center">Pas toe</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="p-4">
                        <p class="mb-4 italic"></p>

                    </div>
                </div>
                <div class="lg:px-2 lg:w-1/2">
                    <div class="p-4 bg-gray-100 rounded-full">
                        <h1 class="ml-2 font-bold uppercase">Bestelgegevens</h1>
                    </div>
                    <div class="p-4">
                        <p class="mb-6 italic">De prijs is inclusief verzendkosten</p>
                        <div class="flex justify-between border-b">
                            <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-s font-bold text-center text-gray-800">
                                Totaalprijs excl BTW
                            </div>
                            <div class="lg:px-4 lg:py-2 m-2 lg:text-s font-bold text-center text-gray-900">
                                148,827.53€
                            </div>
                        </div>
                        <div class="flex justify-between pt-4 border-b">
                            <div class="flex lg:px-4 lg:py-2 m-2 text-lg lg:text-s font-bold text-gray-800">
                                <form action="" method="POST">
                                    <button type="submit" class="mr-2 mt-1 lg:mt-2">
                                        <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt" class="w-4 text-red-600 hover:text-red-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z" /></svg>
                                    </button>
                                </form>
                                Korting
                            </div>
                            <div class="lg:px-4 lg:py-2 m-2 lg:text-s font-bold text-center text-green-700">
                                -133,944.77€
                            </div>
                        </div>

                        <div class="flex justify-between pt-4 border-b">
                            <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-s font-bold text-center text-gray-800">
                                BTW
                            </div>
                            <div class="lg:px-4 lg:py-2 m-2 lg:text-s font-bold text-center text-gray-900">
                                2,976.55€
                            </div>
                        </div>
                        <div class="flex justify-between pt-4 border-b">
                            <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-s font-bold text-center text-gray-800">
                                Totaalprijs incl BTW
                            </div>
                            <div class="lg:px-4 lg:py-2 m-2 lg:text-s font-bold text-center text-gray-900">
                                17,859.3€
                            </div>
                        </div>
                        <a href="/checkout/account">
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
        -moz-appearance: textfield;
    }

    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<script>
    function decrement(e) {
        change(e, -1)
    }

    function increment(e) {
        change(e, +1)
    }

    function change(e, val) {
        const btn = e.target.parentNode.parentElement.querySelector('button[data-action="decrement"]');
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        if (value > 0 || val === 1) value += val;
        target.value = value;
    }

    const decrementButtons = document.querySelectorAll(`button[data-action="decrement"]`);
    const incrementButtons = document.querySelectorAll(`button[data-action="increment"]`);

    decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
    });

    incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
    });
</script>