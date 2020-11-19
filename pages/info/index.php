<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact form</title>
    <link rel="stylesheet" href="style.css"
</head>
<body>
<main>
    <p>E-mail versturen</p>
    <form class="contact-form" action="contactform.php" method="post">
        <input type="text" name="name" placeholder="Volledige naam">
        <input type="text" name="mail" placeholder="Jouw E-mail">
        <input type="text" name="subject" placeholder="Onderwerp">
        <textarea name="message" placeholder="Bericht"></textarea>
        <button type="submit" name="submit">Versturen</button>
</main>
</body>
</html>