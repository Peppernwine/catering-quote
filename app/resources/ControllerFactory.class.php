<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 8/28/2018
 * Time: 9:52 AM
 */

class ControllerFactory
{
    public function createController($name) {
        $name =  $name . 'Controller';
        $controllerFileName = "../app/controllers/".$name.".class.php";

        echo $controllerFileName;
        if (file_exists($controllerFileName)) {
            require_once $controllerFileName;
            return new $name();
        } else
            return null;
    }
}