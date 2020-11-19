<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact form</title>
</head>
<body>
    <p>E-mail versturen</p>
    <div>
        <form action="contactform.php" method="post">
            <input class="mb-4" type="text" name="name" placeholder="Volledige naam"> <br><br>
            <input class="mb-4" type="text" name="mail" placeholder="Jouw E-mail"> <br><br>
            <input class="mb-4" type="text" name="subject" placeholder="Onderwerp"> <br><br>
            <textarea name="message" placeholder="Bericht"></textarea> <br>
            <button class="bg-red-500 hover:bg-red-700 p-2 rounded" type="submit" name="submit">Versturen</button>
        </form>
    </div>
</body>
</html>