<div id="cookie-alert" class="<?php isset($_COOKIE['cookie']) ? print 'opacity-0' : print 'opacity-1' ?> transition ease-in-out duration-500 select-none right-0 bottom-0 fixed m-8">
    <div class="bg-white border-t-4 border-purple-600 rounded text-teal-darkest px-4 py-3 shadow-lg" role="alert">
        <div class="flex justify-between">
            <div class="mr-4">
                <p class="font-bold">We use functional cookies</p>
                <p class="text-sm">Learn more about privacy on our privacy page</p>
            </div>
            <button id="cookie-alert-btn" class="self-center w-10 h-10 ml-4 mr-1 flex justify-between items-center bg-transparent focus:outline-none hover:bg-red-700 text-red-700 hover:text-white p-2 border border-red-600 hover:border-transparent rounded rounded-full">
                <ion-icon size="" name="close-outline"></ion-icon>
            </button>
        </div>
    </div>
</div>

<script>
    const cookieAlert = document.querySelector('#cookie-alert')
    const cookieAlertBtn = document.querySelector('#cookie-alert-btn')

    cookieAlertBtn.addEventListener("click", () => {
        cookieAlert.classList.add('opacity-0')

        let request = new XMLHttpRequest()
        request.open('PUT', '/cookie')
        request.send()
    })
</script>