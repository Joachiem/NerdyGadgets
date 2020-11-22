<?php

class View
{
    public static function show($file, $arg = [])
    {
        include "src/functions/connect.php";

        print '<!DOCTYPE html>';
        print '<html lang="en">';

        include "partials/header.php";

        print '<body>';
        print '<div class="min-h-screen relative bg-gray-200">';

        include "partials/navbar.php";

        print '<div class="pt-20 pb-56 container mx-auto">';

        if (file_exists("pages/$file.php")) {
            include "pages/$file.php";
        }

        print '</div>';

        include "partials/footer.php";

        print '</div>';

        include "src/includes/alert.php";
        include "src/includes/cookie.php";
        include "src/includes/cartCounter.php";
        include "src/includes/request.php";

        print '</body>';

        print '</html>';
    }
}
