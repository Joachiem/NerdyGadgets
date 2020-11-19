<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact form</title>
</head>
<body>
<main>
    <p>E-mail versturen</p>
    <div class="p-4">
    <form class="contact-form" action="contactform.php" method="post">
        <input type="text" name="name" placeholder="Volledige naam"> <br>
        <input type="text" name="mail" placeholder="Jouw E-mail"> <br>
        <input type="text" name="subject" placeholder="Onderwerp"> <br>
        <textarea name="message" placeholder="Bericht"></textarea> <br>
        <button class="bg-red-500 hover:bg-red-700" type="submit" name="submit">Versturen</button>
</main>
</body>
</html>