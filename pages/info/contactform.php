<?php

if(isset($_post["submit"])) {
    $naam = $_post["naam"];
    $onderwerp = $_post["onderwerp"];
    $mailenvan = $_post["mailenvan"];
    $bericht = $_post["bericht"];

    $mailennaar="rached.bataineh@windesheim.nl";
    $headers = "Van: ".$mailenvan;
    $txt = "You have received an e-mail from ".$naam.".\n\n".$bericht;

 mail($mailennaar, $onderwerp, $txt, $headers);
header("Location: index.php?mailsend");
}
?>

