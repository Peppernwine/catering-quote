<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 8/24/2018
 * Time: 1:46 AM
 */

abstract class BaseController
{
    private $headerFunc;
    private $footerFunc;

    public function __construct($headerFunc, $footerFunc){
        $this->headerFunc = $headerFunc;
        $this->footerFunc = $footerFunc;
    }

    public function displayHeader() {
        call_user_func($this->headerFunc);
    }

    public function displayFooter() {
        call_user_func($this->footerFunc);
    }

    public function getModel($modelName){
        $modelName =  ucfirst($modelName) .  'Model';
        $modelFileName = "../app/models/".$modelName.".class.php";

        if (file_exists($modelFileName)) {
            require_once $modelFileName;
            return new $modelName();
        } else
            throw new Exception('Model not found - ' . $modelName);
    }

    public function getView($viewName,$data = []){
        $viewName =  ucfirst($viewName) . 'View';
        $viewFileName = "../app/views/".$viewName.".class.php";

        if (file_exists($viewFileName)) {
            require_once $viewFileName;
            return new $viewName($data);
        } else
            throw new Exception('View not found - ' . $viewName);
    }

}