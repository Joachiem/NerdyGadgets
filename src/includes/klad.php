// $handle = $Connection->prepare('SELECT * FROM stockitems');

// $handle->bindValue(1, 100);
// $handle->bindValue(2, 'Bilbo Baggins');
// $handle->bindValue(3, 5);

// $handle->execute();

// $result = $handle->fetchAll(PDO::FETCH_OBJ);

// foreach ($result as $row) {
// print_r($row->StockItemName);
// }




<!-- <div class="w-32">
    <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">Counter Input
    </label>
    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
        <button data-action="decrement" class="focus:outline-none bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
            <span class="flex justify-center pb-1 m-auto text-2xl font-thin">−</span>
        </button>
        <input min="0" type="number" class="focus:outline-none z-10 select-none w-12 outline-none focus:outline-none text-center  bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="0"></input>
        <button data-action="increment" class="focus:outline-none bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
            <span class="flex justify-center pb-1 m-auto text-2xl font-thin">+</span>
        </button>
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
</script> -->