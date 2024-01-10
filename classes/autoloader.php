<?php

class autoloader {
    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($fqcn) {
        $path = str_replace('\\', '/', $fqcn);
        echo $fqcn.PHP_EOL;
        echo $path.PHP_EOL;
        require "classes/".$path.".php";
    }
}

?>