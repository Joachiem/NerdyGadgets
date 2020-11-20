<script>
    document.addEventListener('DOMContentLoaded', () => update());

    function update(ammout = <?php print array_sum($_SESSION['cart']) ?>) {
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
        
        update(currentNumber + i)
    }
</script>