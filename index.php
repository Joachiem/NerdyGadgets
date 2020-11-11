<?php
session_start();
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en" style="background-color: rgb(35, 35, 47);">

<?php
include __DIR__ . "/src/includes/header.php";

?><body><?php

include __DIR__ . "/partials/navbar.php";
include __DIR__ . "/pages/index.php";

include __DIR__ . "/src/includes/footer.php";
?>

