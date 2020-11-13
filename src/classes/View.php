<?php

class View
{
    public static function show($file)
    {
        include "src/functions/connect.php";

        print '<!DOCTYPE html>';
        print '<html lang="en">';

        include "partials/header.php";

        print '<body>';

        print '<div class="min-h-screen relative pb-56">';

        include "partials/navbar.php";

        print '<div class="pt-32 container mx-auto">';

        if ($file === '') {
            include "pages/index.php";
        } elseif (file_exists("pages/$file.php")) {
            include "pages/$file.php";
        } else {
            include "src/error/404.php";
        }


        print '</div>';

        include "partials/footer.php";
        print '</div>';

        print '</body>';
        print '</html>';
    }
}
