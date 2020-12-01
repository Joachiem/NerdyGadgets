<?php
print("Welcome to your profile");
print('<pre>');
print_r($_SESSION['user']);

?>

<form action="/logout" method="POST">
    <input type="submit" value="logout">
</form>
