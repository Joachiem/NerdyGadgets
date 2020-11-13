<?php
class Lang
{
    /**
     * route class for translations
     */
    public static $lang = 'nl';

    /**
     * set lang for translations
     * @param string $lang
     */
    public static function set_lang($lang)
    {
        self::$lang = $lang;
    }

     /**
     * set lang for translations
     * @param string $lang
     */
    public static function get_lang()
    {
        return self::$lang;
    }
}
