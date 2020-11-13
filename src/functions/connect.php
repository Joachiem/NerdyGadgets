<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Set MySQLi to throw exceptions
try {
    $Connection = mysqli_connect("localhost", "root", "", "nerdygadgets");
    mysqli_set_charset($Connection, 'latin1');
    $DatabaseAvailable = true;
} catch (mysqli_sql_exception $e) {
    $DatabaseAvailable = false;
}
if (!$DatabaseAvailable) {
    print '<h2>Website wordt op dit moment onderhouden.</h2>';
    die();
}

// try {
//     $Connection = new PDO(
//         'mysql:host=localhost;dbname=nerdygadgets;charset=utf8mb4',
//         'root',
//         '',
//         array(
//             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//             PDO::ATTR_PERSISTENT => false
//         )
//     );

//     $DatabaseAvailable = true;
// } catch (mysqli_sql_exception $e) {
//     $DatabaseAvailable = false;
// }
// if (!$DatabaseAvailable) {
//     print '<h2>Website wordt op dit moment onderhouden.</h2>';
//     die();
// }
