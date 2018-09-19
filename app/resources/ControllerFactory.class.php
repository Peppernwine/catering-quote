<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 8/28/2018
 * Time: 9:52 AM
 */

class ControllerFactory
{
    public function createController($name,$headerFunc, $footerFunc) {
        $name =  $name . 'Controller';
        $controllerFileName = "../app/controllers/".$name.".class.php";

        if (file_exists($controllerFileName)) {
            require_once $controllerFileName;
            return new $name($headerFunc, $footerFunc);
        } else
            return null;
    }
}