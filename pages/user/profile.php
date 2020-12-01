<?php
print("Welcome to your profile ");
print('<pre>');
print_r($_SESSION['user']);

?>

<form action="/logout" method="POST">
    <input class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="logout">
</form>