<?php
class Lang
{
    public static function getLang(){
        if(!isset($_SESSION['lang'])) $_SESSION['lang'] = 'nl';

        require_once 'src/includes/lang/' . $_SESSION['lang'] . '.php';
    }

    public static function eng(){
        $_SESSION['lang'] = 'eng';
    }

    public static function nl(){
        $_SESSION['lang'] = 'nl';
    }
}
