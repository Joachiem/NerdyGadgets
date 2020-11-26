<?php

class Lang
{
    /**
     * get the correct language file for the translations
     * default to nl
     */
    public static function getLang()
    {
        if (!isset($_SESSION['lang'])) $_SESSION['lang'] = 'nl';

        require_once 'src/includes/lang/' . $_SESSION['lang'] . '.php';
    }


    /**
     * switch the language to eng
     */
    public static function eng()
    {
        $_SESSION['lang'] = 'eng';
    }


    /**
     * switch the language to nl
     */
    public static function nl()
    {
        $_SESSION['lang'] = 'nl';
    }
}
