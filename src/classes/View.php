<?php

class View
{
    public static function show($file)
    {
        $args = func_get_args();
        if (isset($args[1])) {
            $args = $args[1];
        }


        include "src/functions/connect.php";

        print '<!DOCTYPE html>';
        print '<html lang="en">';

        include "partials/header.php";

        print '<body>';
        print '<div class="min-h-screen relative pb-56">';

        include "partials/navbar.php";

        print '<div class="pt-24 container mx-auto">';

        if (file_exists("pages/$file.php")) {
            include "pages/$file.php";
        }

        print '</div>';

        include "partials/footer.php";

        print '</div>';
        print '</body>';
        print '</html>';
    }
}
