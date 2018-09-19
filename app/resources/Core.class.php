<?php
/**
 * Created by PhpStorm.
 * User: arthirajeev
 * Date: 8/24/2018
 * Time: 1:45 AM
 */

class Core
{
    private $controllerFactory ;

    public function __construct($factory) {
        $this->controllerFactory = $factory;
    }

    private function getUrl() {
        $url = [];
        if (!empty($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url , FILTER_SANITIZE_URL);
            $url = explode('/',$url);
        }
        return $url;
    }

     private function getController($headerFunc, $footerFunc,$url, &$method, &$params) {
         $controllerName = 'Index';
         $method     = 'init';
         $params     = [];

         if (!empty($url[0])) {
             $controllerName = ucfirst($url[0]);
             unset($url[0]);
         }

         if (!empty($url[1])) {
             $method = $url[1];
             unset($url[1]);
         }

         $params = array_values($url);

         $controller = $this->controllerFactory->createController($controllerName,$headerFunc, $footerFunc);

         if (empty($controller) || !method_exists($controller,$method)) {
            throw new Exception('Invalid Resource');
         }
         return $controller;
     }

     public function  handleRequest($headerFunc, $footerFunc) {
        $url = $this->getUrl();

        $method = '';
        $params = [];
        $controllerInstance = $this->getController($headerFunc, $footerFunc,$url,  $method,$params);

        call_user_func_array([$controllerInstance, $method], $params);
    }
}