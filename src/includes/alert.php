<div id="alert" class="opacity-0 transition ease-in-out duration-500 select-none right-0 bottom-0 fixed m-8">
    <div class="bg-white border-t-4 border-purple-600 rounded text-teal-darkest px-4 py-3 shadow-lg" role="alert">
        <div class="flex justify-between">
            <div class="mr-4">
                <p id="title" class="font-bold"></p>
                <p id="message" class="text-sm"></p>
            </div>
            <button id="alert-btn" class="self-center w-10 h-10 ml-4 mr-1 flex justify-between items-center bg-transparent focus:outline-none hover:bg-red-700 text-red-700 hover:text-white p-2 border border-red-600 hover:border-transparent rounded rounded-full">
                <ion-icon size="" name="close-outline"></ion-icon>
            </button>
        </div>
    </div>
</div>

<script>
    class Alert {
        constructor(ctx) {
            this.alertPromise = '';

            this.alertContainer = document.querySelector('#alert')
            this.alertBtn = document.querySelector('#alert-btn')

            this.show(ctx)

            return new Promise(resolve => (this.alertPromise = resolve));
        }

        show({
            title,
            message,
            time = false
        }) {
            document.querySelector('#title').innerHTML = title
            document.querySelector('#message').innerHTML = message

            this.alertBtn.classList.remove('hidden')

            if (time) {
                setTimeout(() => this.resolve(), time);
                this.alertBtn.classList.add('hidden')
            }

            this.alertContainer.classList.remove('opacity-0')
            this.alertContainer.classList.add('opacity-1')

            this.alertBtn.addEventListener('click', () => this.resolve())
        }

        resolve() {
            this.alertContainer.classList.remove('opacity-1')
            this.alertContainer.classList.add('opacity-0')
            this.alertPromise()
        }
    }
</script>