<?php
session_start();
include __DIR__ . "/src/functions/connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php

include __DIR__ . "/partials/header.php";

?>
<body>
<?php
$query = $_GET['q'];


include __DIR__ . "/partials/navbar.php";

if ($query === '') {
    include __DIR__ . "/pages/index.php";
} elseif (file_exists(__DIR__ . "/pages/$query.php")) {
    include __DIR__ . "/pages/$query.php";
} else{
    include __DIR__ . "/src/error/404.php";
}

include __DIR__ . "/partials/footer.php";

?>
</body>
</html>