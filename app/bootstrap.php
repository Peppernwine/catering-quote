<?php
require_once realpath(dirname(__FILE__)) . "/paths.php";

spl_autoload_register(function ($classname) {
    require_once RESOURCE_PATH . "/" . $classname .".class.php";
});