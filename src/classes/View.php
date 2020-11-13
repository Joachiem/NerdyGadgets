<?php

class View
{
    public static function show($file)
    {
        include "pages/$file.php";


        // include "src/functions/connect.php";

        // print '<!DOCTYPE html>';
        // print '<html lang="en">';

        // include "partials/header.php";

        // print '<body>';

        // include "partials/navbar.php";

        // print '<div class="pt-32 container mx-auto">';

        // if ($file === '') {
        //     include "pages/index.php";
        // } elseif (file_exists("pages/$file.php")) {
        //     include "pages/$file.php";
        // } else {
        //     include "src/error/404.php";
        // }

        // include "partials/footer.php";

        // print '</div>';
        // print '</body>';
        // print '</html>';
    }
}
