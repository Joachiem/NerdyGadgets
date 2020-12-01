<script>
    document.addEventListener('DOMContentLoaded', () => setCounter());

    function setCounter(ammout = <?php print isset($_SESSION['cart']['products']) ? array_sum($_SESSION['cart']['products']) : 0 ?>) {
        let cartCounter = document.querySelector('#cart-counter')

        if (ammout > 0) {
            cartCounter.classList.remove('hidden')
            cartCounter.innerHTML = ammout
        } else {
            cartCounter.classList.add('hidden')
        }
    }

    function changeCounter(i) {
        let html = document.querySelector('#cart-counter').innerHTML
        let currentNumber = html ? parseInt(html) : 0
        setCounter(currentNumber + i)
    }
</script>