<?php

class View
{
    public static function show($file)
    {
        $arg = [];
        $args = func_get_args();
        if (isset($args[1])) {
            $arg = $args[1];
        }


        include "src/functions/connect.php";

        print '<!DOCTYPE html>';
        print '<html lang="en">';

        include "partials/header.php";

        print '<body>';
        print '<div class="min-h-screen relative pb-56 bg-gray-200">';

        include "partials/navbar.php";

        print '<div class="pt-24 container mx-auto">';

        if (file_exists("pages/$file.php")) {
            include "pages/$file.php";
        }

        print '</div>';

        include "partials/footer.php";

        include "src/includes/cookie.php";

        print '</div>';
        print '</body>';
        print '</html>';
    }
}
