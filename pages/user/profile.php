<article class="overflow-hidden rounded-lg shadow-lg bg-white md:col-span-1 col-span-1 lg:col-span-2">
    <div class="flex items-center justify-between leading-tight p-2 md:p-4">
        <h1 class="text-lg">Welcome <?php print ucwords($_SESSION['user']->FullName) ?></h1>
    </div>

    <div class="flex items-center justify-between leading-tight p-2 md:p-4">
        <h2 class="text-md">Your email is: <?php print $_SESSION['user']->EmailAddress ?></h2>
        <div class="flex gap-4">
            <a href="/user/history" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">History</a>

            <form action="/logout" method="POST">
                <input class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="logout">
            </form>
        </div>
    </div>

</article>