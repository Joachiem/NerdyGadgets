<?php
spl_autoload_register(function ($class_name) {
    $filename = 'src/classes/' . $class_name . '.php';
    if (file_exists($filename)) {
        require_once 'src/classes/' . $class_name . '.php';
    }

    $filename = 'src/controllers/' . $class_name . '.php';
    if (file_exists($filename)) {
        require_once 'src/controllers/' . $class_name . '.php';
    }
});
