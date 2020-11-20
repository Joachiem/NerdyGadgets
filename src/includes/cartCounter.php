<script>
    document.addEventListener('DOMContentLoaded', () => update());

    function update(ammout = <?php print array_sum($_SESSION['cart']) ?>) {
        let cartCounter = document.querySelector('#cart-counter')
        console.log(ammout)
        if (ammout > 0) {
            cartCounter.classList.remove('hidden')
            cartCounter.innerHTML = ammout
        } else {
            cartCounter.classList.add('hidden')
        }
    }

    function changeCounter(i) {
        let currentNumber = parseInt(document.querySelector('#cart-counter').innerHTML)
        update(currentNumber + i)
    }
</script>