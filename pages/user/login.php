<section class="container py-8 flex justify-center">

<div class="flex justify-center">
    <div class="overflow-hidden rounded-lg shadow-lg mb-8 max-w-lg">
        <div class="leading-tight p-2 md:p-4 bg-white">
            <form action method="POST" class="w-full max-w-lg">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="<?php isset($_SESSION['login']["email"]) ? print($_SESSION['login']["email"]) : '' ?>" name="email" id="email" type="email" placeholder="email">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        name="password" id="password" type="password" placeholder="******************">
                    
                       <?php if(isset($_SESSION["loginfail"]) == TRUE) {?>
                        <p
                     class="text-red-500 text-xs italic">E-mail or password are wrong!</p>
                       <?php } print_r($_SESSION); ?>
                   
                </div>
                <div class="flex items-center justify-between">
                <input class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit" value="Sign in">
                    <div class="text-right">
                        <a class="w-full flex text-right inset-y-0 right-0 font-bold text-sm text-blue-500 hover:text-blue-800" href="forgot">
                            Forgot Password?
                        </a>
                        
                        <a class="w-full text-right flex inset-y-0 right-0 font-bold text-sm text-blue-500 hover:text-blue-800" href="register">
                           <p> Register?</p>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
